<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsLetterResource\Pages;
use App\Filament\Resources\NewsLetterResource\RelationManagers;
use App\Models\NewsLetter;
use Filament\Forms;
use Filament\Forms\Components\Section;
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
use Illuminate\Support\Str;

class NewsLetterResource extends Resource
{
  protected static ?string $model = NewsLetter::class;

  protected static ?string $navigationIcon = 'tabler-news';

  public static function getNavigationGroup(): ?string
  {
    return __('Settings');
  }
  public static function getNavigationLabel(): string
  {
    return __('Newsletter Settings');
  }


  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make()->schema([
          TextInput::make('provider_name')
            ->label('Provider Name')
            ->required(),
          TextInput::make('slug')
            ->label('Slug')
            ->dehydrateStateUsing(function ($state, \Filament\Forms\Get $get) {
              if (empty($state)) {
                // add a random string if there is a roadmap item with the same slug
                return Str::slug($get('provider_name'));;
              }

              return Str::slug($state);
            })
            ->maxLength(255),
          Textarea::make('code')
            ->rows(5)
            ->columnSpanFull(),
          Toggle::make('active')
            ->afterStateUpdated(function ($state, $set, $get) {
              if ($state) {
                NewsLetter::where('id', '!=', $get('id'))->update(['active' => false]);
              }
            })
        ])->columns(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('provider_name')
          ->label('Provider Name')
          ->searchable()
          ->sortable(),
        TextColumn::make('slug'),
        IconColumn::make('active')
          ->icon(function ($record) {
            return $record->active ? 'tabler-circle-check' : 'tabler-circle-x';
          })
          ->color(function ($record) {
            return $record->active ? 'success' : 'danger';
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
      'index' => Pages\ListNewsLetters::route('/'),
      'create' => Pages\CreateNewsLetter::route('/create'),
      'edit' => Pages\EditNewsLetter::route('/{record}/edit'),
    ];
  }
}
