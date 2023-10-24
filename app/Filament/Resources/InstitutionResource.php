<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstitutionResource\Pages;
use App\Filament\Resources\InstitutionResource\RelationManagers;
use App\Models\Institution;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstitutionResource extends Resource
{
	protected static ?string $model = Institution::class;

	protected static ?string $title = 'Instituciones';

	protected static ?string $navigationIcon = 'heroicon-o-building-library';

	protected static ?string $navigationLabel = 'Instituciones';

	protected static ?string $modelLabel = 'Institución';

	protected static ?string $pluralModelLabel = 'Instituciones';

	protected static ?string $heading = 'Instituciones';

	protected static ?string $navigationGroup = 'Administración';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('name')
					->label('Nombre')
					->required()
					->maxLength(255),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('name')
					->searchable()
					->label('Nombre'),
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
			'index' => Pages\ListInstitutions::route('/'),
			'create' => Pages\CreateInstitution::route('/create'),
			'edit' => Pages\EditInstitution::route('/{record}/edit'),
		];
	}
}
