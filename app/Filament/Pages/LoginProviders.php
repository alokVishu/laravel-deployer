<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class LoginProviders extends Page
{
  protected static ?string $navigationIcon = 'tabler-login';

  protected static string $view = 'filament.pages.login-providers';

  public static function getNavigationGroup(): ?string
  {
    return __('Settings');
  }
  public static function getNavigationLabel(): string
  {
    return __('Login Providers');
  }

  public static function canAccess(): bool
  {
    return auth()->user()->hasPermissionTo('update settings');
  }
}
