<?php

namespace App\Filament\Pages;

class Dashboard extends \Filament\Pages\Dashboard
{
  // ...

  public function getColumns(): int | string | array
  {
    return [
      'md' => 12,
      'xl' => 12,
    ];
  }
}
