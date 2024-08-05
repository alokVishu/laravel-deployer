<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\HtmlString;

class Users extends BaseWidget
{
  protected static ?int $sort = 7;

  protected int | string | array $columnSpan = [
    'md' => 12,
    'xl' => 8,
  ];

  public static function resolveRole($state = null): string
  {
    // You can customize the chip design and logic here

    if ($state === '1')
      return '<span>Admin</span>';
    else
      return '<span>User</span>';
  }

  public function table(Table $table): Table
  {
    return $table
      ->query(\App\Models\User::query())
      ->defaultPaginationPageOption(5)
      ->defaultSort('created_at', 'desc')
      ->columns([
        TextColumn::make('id')
          ->label('ID')
          ->sortable(),
        TextColumn::make('name')
          ->label('User Name')
          ->sortable(),
        TextColumn::make('email')
          ->sortable(),
        TextColumn::make('is_admin')
          ->label('Role')
          ->formatStateUsing(fn (string $state): HtmlString => new HtmlString($this->resolveRole($state)))
          ->sortable()
          ->html(),
        TextColumn::make('is_blocked')
          ->label('Status')
          ->formatStateUsing(fn (string $state): HtmlString => new HtmlString($state === '1' ? '<span>Blocked</span>' : '<span>Active</span>'))
          ->sortable(),
      ])
      ->bulkActions([
        Tables\Actions\DeleteBulkAction::make(),
      ]);
  }
}
