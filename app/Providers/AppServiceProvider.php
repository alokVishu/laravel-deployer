<?php

namespace App\Providers;

use App\Models\User;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;



class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Gate::before(function (User $user, string $ability) {
      return $user->isSuperAdmin() ? true : null;
    });

    FilamentView::registerRenderHook(
      PanelsRenderHook::USER_MENU_BEFORE,
      fn (): View => view('livewire.search-btn'),
    );

    LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
      $switch
        ->locales(['ar', 'en', 'fr']) // also accepts a closure
        ->renderHook('panels::user-menu.before');
    });
  }
}
