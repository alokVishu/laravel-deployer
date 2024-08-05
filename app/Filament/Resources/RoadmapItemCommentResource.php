<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoadmapItemCommentResource\Pages;
use App\Filament\Resources\RoadmapItemCommentResource\RelationManagers;
use App\Models\RoadmapItem;
use App\Models\RoadmapItemComment;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoadmapItemCommentResource extends Resource
{
  protected static ?string $model = RoadmapItemComment::class;

  protected static ?string $navigationIcon = 'tabler-layout-list';

  public static function getNavigationGroup(): ?string
  {
    return __('Roadmap');
  }

  public static function getNavigationLabel(): string
  {
    return __('Roadmap Comments');
  }

  protected static ?int $navigationSort = 2;

  protected static ?string $recordTitleAttribute = 'comment';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make()
          ->columns(2)
          ->schema([
            Select::make('user_id')
              ->relationship('user', 'name')
              ->required(),
            Select::make('roadmap_item_id')
              ->relationship('roadmap_item', 'title')
              ->required(),
            Textarea::make('comment')
              ->rows(3)
              ->required()
              ->columnSpan('full'),
            Toggle::make('approved')
              ->default(false),
          ]),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('user.name')
          ->label('User')
          ->searchable()
          ->sortable(),
        TextColumn::make('roadmap_item.title'),
        TextColumn::make('comment')
          ->searchable()
          ->sortable(),
        IconColumn::make('approved')
          ->icon(function ($record) {
            return $record->approved ? 'tabler-circle-check' : 'tabler-circle-x';
          })
          ->color(function ($record) {
            return $record->approved ? 'success' : 'danger';
          }),
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
      'index' => Pages\ListRoadmapItemComments::route('/'),
      'create' => Pages\CreateRoadmapItemComment::route('/create'),
      'edit' => Pages\EditRoadmapItemComment::route('/{record}/edit'),
    ];
  }
}
