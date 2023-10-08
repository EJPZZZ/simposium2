<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopResource\Pages;
use App\Filament\Resources\WorkshopResource\RelationManagers;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkshopResource extends Resource
{
	protected static ?string $model = Workshop::class;

	protected static ?string $title = 'Talleres';

	protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

	protected static ?string $navigationLabel = 'Talleres';

	protected static ?string $modelLabel = 'Taller';

	protected static ?string $pluralModelLabel = 'Talleres';

	protected static ?string $heading = 'Talleres';

	protected static ?string $navigationGroup = 'Administración';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('name')
					->required()
					->maxLength(255),
				TextInput::make('capacity')
					->numeric()
					->required()
					->minValue(1)
					->maxValue(50),
				TextInput::make('location')
					->required()
					->maxLength(255)
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('name')
					->searchable(),
				TextColumn::make('capacity'),
				TextColumn::make('location'),
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
			'index' => Pages\ListWorkshops::route('/'),
			'create' => Pages\CreateWorkshop::route('/create'),
			'edit' => Pages\EditWorkshop::route('/{record}/edit'),
		];
	}
}
