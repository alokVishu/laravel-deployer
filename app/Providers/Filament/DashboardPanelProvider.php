<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;

class DashboardPanelProvider extends PanelProvider
{
  public function panel(Panel $panel): Panel
  {
    return $panel
      ->id('dashboard')
      ->path('dashboard')
      ->colors([
        'primary' => Color::Amber,
      ])
      ->userMenuItems([
        MenuItem::make()
          ->label(__('Admin Panel'))
          ->visible(
            fn () => auth()->user()->isAdmin()
          )
          ->url(fn () => route('filament.admin.pages.dashboard'))
          ->icon('tabler-settings'),
      ])
      ->discoverResources(in: app_path('Filament/Dashboard/Resources'), for: 'App\\Filament\\Dashboard\\Resources')
      ->discoverPages(in: app_path('Filament/Dashboard/Pages'), for: 'App\\Filament\\Dashboard\\Pages')
      ->pages([
        Pages\Dashboard::class,
      ])
      ->discoverWidgets(in: app_path('Filament/Dashboard/Widgets'), for: 'App\\Filament\\Dashboard\\Widgets')
      ->widgets([
        Widgets\AccountWidget::class,
        Widgets\FilamentInfoWidget::class,
      ])
      ->middleware([
        EncryptCookies::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        AuthenticateSession::class,
        ShareErrorsFromSession::class,
        VerifyCsrfToken::class,
        SubstituteBindings::class,
        DisableBladeIconComponents::class,
        DispatchServingFilamentEvent::class,
      ])
      ->authMiddleware([
        Authenticate::class,
      ])->plugins([
        BreezyCore::make()->enableTwoFactorAuthentication()
          ->myProfile(
            shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
            shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
            hasAvatars: true, // Enables the avatar upload form component (default = false)
            slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
          )
      ])
      ->brandLogo(fn () => view('components.layouts.partials.logo'))
      ->sidebarCollapsibleOnDesktop()
      ->favicon(asset('favicon.ico'))
      ->viteTheme('resources/scss/filament/dashboard/theme.scss')
      ->colors([
        'primary' => '#794DFF',
        'secondary' => '#76717F',
        'accent' => '#3B82F6',
        'info' => '#06B6D4',
        'success' => '#02CA4B',
        'warning' => '#FCAA1D',
        'danger' => '#FB4141',
        'error' => '#FB4141',
        'gray' => '#707387',
      ])
      ->navigationItems([
        NavigationItem::make('Profile')
          ->url(url('/dashboard/my-profile'))
          ->icon('tabler-user')
          ->isActiveWhen(fn () => request()->routeIs('filament.dashboard.pages.my-profile')),
      ]);
  }
}
