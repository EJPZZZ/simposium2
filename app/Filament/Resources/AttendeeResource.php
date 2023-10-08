<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendeeResource\Pages;
use App\Filament\Resources\AttendeeResource\RelationManagers;
use App\Models\Attendee;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
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
