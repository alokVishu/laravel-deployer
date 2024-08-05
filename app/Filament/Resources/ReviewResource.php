<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Mokhosh\FilamentRating\Components\Rating;

class ReviewResource extends Resource
{
  protected static ?string $model = Review::class;

  protected static ?string $navigationIcon = 'tabler-star';

  public static function getNavigationLabel(): string
  {
    return __('Reviews');
  }

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Review Details')
          ->schema([

            Group::make()
              ->schema([
                Forms\Components\TextInput::make('review_title')
                  ->label('Review Title')
                  ->placeholder('Enter review title'),
                Forms\Components\TextInput::make('review_platform')
                  ->label('Review Platform')
                  ->required()
                  ->placeholder('Enter review platform'),
                Forms\Components\TextInput::make('review_link')
                  ->label('Review Link')
                  ->required()
                  ->url()
                  ->placeholder('Enter review link'),
                Forms\Components\TextInput::make('review_video')
                  ->label('Review Video URL')
                  ->url()
                  ->placeholder('Enter video url'),
              ]),

            Group::make()
              ->schema([
                Rating::make('ratings')
                  ->label('Ratings')
                  ->default(5)
                  ->color('warning'),
                Forms\Components\Textarea::make('review_desc')
                  ->label('Review Text')
                  ->required()
                  ->rows(7)
                  ->placeholder('Enter review description'),
                Forms\Components\Toggle::make('is_featured')
                  ->label('Is Featured')
                  ->columnSpan('full'),
              ]),

          ])->columns(2)->columnSpan(2),


        Section::make('Reviewer details')
          ->schema([
            Group::make()
              ->schema([
                Forms\Components\TextInput::make('user_name')
                  ->label('Reviewer Name')
                  ->required()
                  ->placeholder('Enter user name'),
                Forms\Components\TextInput::make('user_designation')
                  ->label('Reviewer designation')
                  ->placeholder('Enter designation'),
                Forms\Components\TextInput::make('user_location')
                  ->label('Reviewer Location (Country Code)')
                  ->maxLength(2)
                  ->placeholder('IN, USA, UK, etc.'),
              ]),

            Group::make()
              ->schema([
                Forms\Components\FileUpload::make('user_image')
                  ->label('Reviewer Image')
                  ->avatar()
                  ->alignCenter(),
              ]),
          ])->columnSpan(1),
      ])->columns(3);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('user_name')
          ->searchable(),
        RatingColumn::make('ratings')
          ->color('warning')
          ->searchable(),
        TextColumn::make('review_platform')
          ->searchable(),
        ToggleColumn::make('is_featured')
          ->label('Is Featured'),
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
      'index' => Pages\ListReviews::route('/'),
      'create' => Pages\CreateReview::route('/create'),
      'edit' => Pages\EditReview::route('/{record}/edit'),
    ];
  }
}
