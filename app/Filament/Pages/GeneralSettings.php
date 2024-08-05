<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class GeneralSettings extends Page
{
  protected static string $view = 'filament.pages.general-settings';

  public static function getNavigationGroup(): ?string
  {
    return __('Settings');
  }
  public static function getNavigationLabel(): string
  {
    return __('General Settings');
  }

  protected static ?string $navigationIcon = 'tabler-settings';

  public static function canAccess(): bool
  {
    return auth()->user()->hasPermissionTo('update settings');
  }
}
