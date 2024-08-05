<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use STS\FilamentImpersonate\Tables\Actions\Impersonate;

class UserResource extends Resource
{
  protected static ?string $model = User::class;

  protected static ?string $navigationIcon = 'tabler-users';

  protected static ?string $recordTitleAttribute = 'name';

  public static function getNavigationGroup(): ?string
  {
    return __('Roles and Permissions');
  }
  public static function getNavigationLabel(): string
  {
    return __('Users');
  }

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make()->schema([
          TextInput::make('name')
            ->required()
            ->maxLength(255),
          TextInput::make('email')
            ->email()
            ->required()
            ->maxLength(255),
          TextInput::make('password')
            ->password()
            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
            ->dehydrated(fn ($state) => filled($state))
            ->required(fn (string $context): bool => $context === 'create')
            ->helperText(fn (string $context): string => ($context !== 'create') ? __('Leave blank to keep the current password.') : '')
            ->maxLength(255),
          Select::make('roles')
            ->multiple()
            ->relationship('roles', 'name')
            ->preload(),
          Checkbox::make('is_admin')
            ->label('Is Admin?')
            ->helperText('If checked, this user will be able to access the admin panel. There has to be at least 1 admin user, so if this field is disabled, you will have to create another admin user first before you can disable this one.')
            ->disabled(fn (User $user): bool => $user->is_admin && User::where('is_admin', true)->count() === 1)
            ->default(false)
            ->columnSpan(2),
        ])->columns(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('email')->searchable()->sortable(),
        TextColumn::make('created_at')->dateTime(config('app.datetime_format')),
        TextColumn::make('updated_at')->dateTime(config('app.datetime_format')),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Impersonate::make('impersonate'),
      ])
      ->bulkActions([
        // Tables\Actions\BulkActionGroup::make([
        //   Tables\Actions\DeleteBulkAction::make(),
        // ]),
      ])->defaultSort('created_at', 'desc');
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
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
  }
}
