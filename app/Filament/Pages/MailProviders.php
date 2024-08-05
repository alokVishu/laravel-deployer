<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MailProviders extends Page
{
  protected static ?string $navigationIcon = 'tabler-mail';

  protected static string $view = 'filament.pages.mail-providers';

  public static function getNavigationGroup(): ?string
  {
    return __('Settings');
  }
  public static function getNavigationLabel(): string
  {
    return __('Email Providers');
  }

  public static function canAccess(): bool
  {
    return auth()->user()->hasPermissionTo('update settings');
  }
}
