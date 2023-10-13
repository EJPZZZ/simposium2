<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendeeResource\Pages;
use App\Filament\Resources\AttendeeResource\RelationManagers;
use App\Mail\AttendeeCertificatesMail;
use App\Models\Attendee;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AttendeeResource extends Resource
{
	protected static ?string $model = Attendee::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	protected static ?string $navigationLabel = 'Asistentes';

	protected static ?string $modelLabel = 'Asistente';

	protected static ?string $pluralModelLabel = 'Asistentes';

	protected static ?string $heading = 'Asistentes';

	protected static ?string $navigationGroup = 'Simposium';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('curp')
					->required()
					->maxLength(18)
					->label('CURP'),
				TextInput::make('name')
					->required()
					->maxLength(255)
					->label('Nombre'),
				TextInput::make('email')
					->email()
					->required()
					->maxLength(255)
					->label('Correo electrónico'),
				Select::make('workshop_id')
					->relationship(name: 'workshop', titleAttribute: 'name')
					->required()
					->label('Taller'),
				TextInput::make('code')
					->maxLength(6)
					->label('Matrícula'),
				Select::make('career_id')
					->relationship(name: 'career', titleAttribute: 'name')
					->label('Carrera'),
				TextInput::make('semester')
					->numeric()
					->minValue(1)
					->maxValue(13)
					->label('Semestre'),
				TextInput::make('phone_number')
					->maxLength(10)
					->label('Número telefónico'),
				Select::make('gender')
					->options([
						'female' => 'Femenino',
						'male' => 'Masculino',
						'not_especified' => 'No especificado'
					])
					->label('Género'),
				DateTimePicker::make('created_at')
					->format('Y-m-d H:i')
					->seconds(false)
					->disabled()
					->label('Fecha de registro'),
			])
			->columns(3);
	}

	public static function table(Table $table): Table
	{
		return $table
			// ->headerActions([
			// 	BulkAction::make('Fecha de expiración')
			// 		->icon('heroicon-m-trash')
			// 		->color('danger')
			// 		->requiresConfirmation()
			// 		->action(function (Collection $records) {
			// 			$records->each(function ($record) {
			// 				Storage::delete($record->image->path);
			// 				$record->delete();
			// 			});
			// 		})
			// 		->deselectRecordsAfterCompletion(),
			// ])
			->columns([
				TextColumn::make('curp')
					->label('CURP')
					->searchable(),
				TextColumn::make('name')
					->label('Nombre')
					->searchable()
					->sortable(),
				TextColumn::make('email')
					->label('Correo Electrónico')
					->searchable(),
				TextColumn::make('workshop.name')
					->label('Taller')
					->sortable(),
				TextColumn::make('code')
					->label('Matrícula')
					->searchable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('career.name')
					->label('Carrera')
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('gender')
					->label('Género')
					->toggleable(isToggledHiddenByDefault: true),
				CheckboxColumn::make('validated')
					->label('Validado')
					->sortable(),
				TextColumn::make('validated_at')
					->label('Fecha validación')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('validated_by')
					->label('Validado por')
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('created_at')
					->label('Fecha registro')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('updated_at')
					->label('Fecha actualización')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
			])
			->filters([
				//
			])
			->actions([
				Action::make('Ver recibo')
					->icon('heroicon-m-photo')
					->modalContent(fn (Attendee $record): View => view('components.filament.image-modal', [
						'record' => $record
					]))
					->modalSubmitAction(false),
				// ->url(fn (Attendee $record): string => url($record->image->path))
				// ->openUrlInNewTab(),
				EditAction::make(),
			])
			->bulkActions([
				BulkActionGroup::make([
					BulkAction::make('Eliminar seleccionados')
						->icon('heroicon-m-trash')
						->color('danger')
						->requiresConfirmation()
						->action(function (Collection $records) {
							$records->each(function ($record) {
								Storage::delete($record->image->path);
								$record->delete();
							});
						})
						->deselectRecordsAfterCompletion(),
				])->label('Abrir acciones'),
				BulkActionGroup::make([
					BulkAction::make('Enviar certificados')
						->icon('heroicon-m-paper-airplane')
						->requiresConfirmation()
						->action(function (Collection $records) {
							$records->each(function ($record) {
								$token = $record->get_certificate_token();
								Mail::to($record->email)->send(new AttendeeCertificatesMail($token));
							});

							Notification::make()
								->title('Correos de certificados enviados')
								->success()
								->send();
						})
						->deselectRecordsAfterCompletion(),
					BulkAction::make('Fecha de expiración')
						->icon('heroicon-m-calendar')
						->form([
							DatePicker::make('expires_at')
								->label('Fecha de expiración de links')
								->required(),
						])
						->action(function (array $data, Collection $records) {
							foreach ($records as $record) {
								$record->set_token_expiration_date($data['expires_at']);
							}
						})
						->modalWidth('md')
						->deselectRecordsAfterCompletion(),
				])->label('Certificados')
			]);
	}

	public static function getRelations(): array
	{
		return [
			//
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListAttendees::route('/'),
			'create' => Pages\CreateAttendee::route('/create'),
			'edit' => Pages\EditAttendee::route('/{record}/edit'),
		];
	}
}
