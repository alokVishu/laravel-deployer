<?php

namespace App\Filament\Resources;

use App\Constants\RoadmapItemStatus;
use App\Constants\RoadmapItemType;
use App\Filament\Resources\RoadmapItemResource\Pages;
use App\Mapper\RoadmapMapper;
use App\Models\RoadmapItem;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class RoadmapItemResource extends Resource
{
  protected static ?string $model = RoadmapItem::class;


  public static function getNavigationGroup(): ?string
  {
    return __('Roadmap');
  }
  public static function getNavigationLabel(): string
  {
    return __('Roadmap Items');
  }

  protected static ?string $navigationIcon = 'tabler-list-check';

  protected static ?string $recordTitleAttribute = 'title';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make()->schema([
          TextInput::make('title')
            ->required()
            ->maxLength(255),
          TextInput::make('slug')
            ->label(__('Slug'))
            ->dehydrateStateUsing(function ($state, \Filament\Forms\Get $get) {
              if (empty($state)) {
                // add a random string if there is a roadmap item with the same slug
                $state = Str::slug($get('title'));
                if (RoadmapItem::where('slug', $state)->exists()) {
                  $state .= '-' . Str::random(5);
                }

                return Str::slug($state);
              }

              return $state;
            })
            ->maxLength(255),
          Textarea::make('description')
            ->rows(5)
            ->columnSpanFull(),
          Select::make('status')
            ->options(function () {
              return collect(RoadmapItemStatus::cases())->mapWithKeys(function ($status) {
                return [$status->value => RoadmapMapper::mapStatusForDisplay($status)];
              });
            })
            ->required()
            ->default(RoadmapItemStatus::PLANNED->value),
          Select::make('type')
            ->options(function () {
              return collect(RoadmapItemType::cases())->mapWithKeys(function ($type) {
                return [$type->value => RoadmapMapper::mapTypeForDisplay($type)];
              });
            })
            ->required()
            ->default(RoadmapItemType::FEATURE->value),
          TextInput::make('upvotes')
            ->label(__('Upvotes'))
            ->required()
            ->numeric()
            ->default(1),
          Select::make('user_id')
            ->label('User')
            ->lazy()
            ->searchable()
            ->options(User::all()->pluck('name', 'id'))
            ->default(fn () => auth()->user()->id)
            ->required(),
        ])->columns(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title')->searchable(),
        TextColumn::make('status')->formatStateUsing(fn ($state) => RoadmapMapper::mapStatusForDisplay($state)),
        TextColumn::make('type')->formatStateUsing(fn ($state) => RoadmapMapper::mapTypeForDisplay($state)),
        TextColumn::make('upvotes')->default(1)
          ->numeric()
          ->sortable(),
        TextColumn::make('user_id')
          ->label('User')
          ->formatStateUsing(function ($state) {
            return User::find($state)->name;
          }),
        Tables\Columns\TextColumn::make('updated_at')
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
      ])
      ->defaultSort('upvotes', 'desc');
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
      'index' => Pages\ListRoadmapItems::route('/'),
      'create' => Pages\CreateRoadmapItem::route('/create'),
      'edit' => Pages\EditRoadmapItem::route('/{record}/edit'),
    ];
  }

  public static function getNavigationBadge(): ?string
  {
    return static::getModel()::count();
  }
}
