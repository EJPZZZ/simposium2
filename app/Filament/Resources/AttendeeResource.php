<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendeeResource\Pages;
use App\Filament\Resources\AttendeeResource\RelationManagers;
use App\Mail\AttendeeCertificatesMail;
use App\Mail\AttendeeRegistrationDone;
use App\Models\Attendee;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
				TextInput::make('code')
					->required()
					->maxLength(6),
				Select::make('career_id')
					->relationship(name: 'career', titleAttribute: 'name')
					->required(),
				Select::make('workshop_id')
					->relationship(name: 'workshop', titleAttribute: 'name')
					->required(),
				TextInput::make('name')
					->required()
					->maxLength(255),
				TextInput::make('email')
					->email()
					->required()
					->maxLength(255),
				TextInput::make('phone_number')
					->maxLength(10),
				TextInput::make('semester')
					->numeric()
					->minValue(1)
					->maxValue(13),
			])
			->columns(3);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('code')
					->label('Matrícula')
					->searchable(),
				TextColumn::make('name')
					->label('Nombre')
					->searchable(),
				TextColumn::make('career.name')
					->label('Carrera')
					->sortable(),
				TextColumn::make('workshop.name')
					->label('Taller')
					->sortable(),
				TextColumn::make('email')
					->label('Correo Electrónico')
					->searchable(),
				TextColumn::make('created_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
			])
			->filters([
				//
			])
			->actions([
				EditAction::make(),
			])
			->bulkActions([
				BulkActionGroup::make([
					DeleteBulkAction::make(),
				])
					->label('Acciones'),
				BulkActionGroup::make([
					BulkAction::make('Enviar certificados')
						->icon('heroicon-m-paper-airplane')
						->requiresConfirmation()
						->action(function (Collection $records) {
							$records->each(function ($record) {
								$token = DB::table('attendee_certificate_tokens')
								->where('email', '=', $record->email)
								->select('token')
								->pluck('token')
								->toArray();

								Mail::to($record->email)->send(new AttendeeCertificatesMail($token[0]));
							});

							Notification::make()
								->title('Correos de certificados enviados')
								->success()
								->send();
						})
						->deselectRecordsAfterCompletion(),
				])
					->label('Certificados')
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
