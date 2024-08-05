<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class OpenGraphImageSettings extends Page
{
  protected static ?string $navigationIcon = 'tabler-photo';

  protected static string $view = 'filament.pages.open-graph-image-settings';


  public static function getNavigationGroup(): ?string
  {
    return __('Settings');
  }
  public static function getNavigationLabel(): string
  {
    return __('Open Graph Images');
  }

  protected static ?int $navigationSort = 3;

  public static function canAccess(): bool
  {
    return auth()->user()->hasPermissionTo('update settings');
  }
}
