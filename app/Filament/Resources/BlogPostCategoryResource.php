<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostCategoryResource\Pages;
use App\Filament\Resources\BlogPostCategoryResource\RelationManagers;
use App\Models\BlogPostCategory;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BlogPostCategoryResource extends Resource
{
  protected static ?string $model = BlogPostCategory::class;

  protected static ?string $navigationIcon = 'tabler-layout-grid-add';

  public static function getNavigationGroup(): ?string
  {
    return __('Blog');
  }
  public static function getNavigationLabel(): string
  {
    return __('Category');
  }

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Category Information')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->label('Name')
              ->required()
              ->placeholder('Enter the category name'),
            Forms\Components\TextInput::make('slug')
              ->dehydrateStateUsing(function ($state, \Filament\Forms\Get $get) {
                if (empty($state)) {
                  $name = $get('name');

                  return Str::slug($name);
                }

                return Str::slug($state);
              })
              ->helperText(__('Leave empty to generate slug automatically name.'))
              ->maxLength(255),
          ])->columns(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name')
          ->label('Name'),
        TextColumn::make('slug')
          ->label('Slug')
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
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
      'index' => Pages\ListBlogPostCategories::route('/'),
      'create' => Pages\CreateBlogPostCategory::route('/create'),
      'edit' => Pages\EditBlogPostCategory::route('/{record}/edit'),
    ];
  }
}
