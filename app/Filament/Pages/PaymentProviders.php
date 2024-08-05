<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class PaymentProviders extends Page
{
  protected static ?string $navigationIcon = 'tabler-wallet';

  protected static string $view = 'filament.pages.payment-providers';

  public static function getNavigationGroup(): ?string
  {
    return __('Settings');
  }
  public static function getNavigationLabel(): string
  {
    return __('Payment Providers');
  }

  public static function canAccess(): bool
  {
    return auth()->user()->hasPermissionTo('update settings');
  }
}
