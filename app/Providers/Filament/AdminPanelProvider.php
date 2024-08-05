<?php

namespace App\Providers\Filament;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Platform;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;
use pxlrbt\FilamentSpotlight\SpotlightPlugin;


class AdminPanelProvider extends PanelProvider
{
  public function panel(Panel $panel): Panel
  {
    return $panel
      ->default()
      ->id('admin')
      ->path('admin')
      ->login()
      ->colors([
        'primary' => Color::Amber,
      ])
      ->userMenuItems([
        MenuItem::make()
          ->label(__('User Dashboard'))
          ->visible(
            fn () => true
          )
          ->url(fn () => route('filament.dashboard.pages.dashboard'))
          ->icon('tabler-mood-smile'),
      ])
      ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
      ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
      ->pages([])
      ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
      ->widgets([])
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
      ])
      ->navigationGroups([
        NavigationGroup::make()
          ->label('Roles and Permissions'),
        NavigationGroup::make()
          ->label('Newsletter'),
        NavigationGroup::make()
          ->label('Roadmap'),
      ])
      ->globalSearch(false)
      ->globalSearchFieldSuffix(fn (): ?string => match (Platform::detect()) {
        Platform::Windows, Platform::Linux => 'CTRL+K',
        Platform::Mac => '⌘K',
        default => null,
      })
      ->navigationItems([
        NavigationItem::make('Profile')
          ->label(fn () => __('Profile'))
          ->url(url('/admin/my-profile'))
          ->icon('tabler-user')
          ->isActiveWhen(fn () => request()->routeIs('filament.admin.pages.my-profile')),

      ])
      ->plugins([
        BreezyCore::make()->enableTwoFactorAuthentication()
          ->myProfile(
            shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
            shouldRegisterNavigation: false,
            navigationGroup: 'Settings', // Adds a main navigation item for the My Profile page (default = false)
            hasAvatars: true, // Enables the avatar upload form component (default = false)
            slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
          ),
        SpotlightPlugin::make(),
        FilamentApexChartsPlugin::make(),
      ])
      ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
      ->brandLogo(fn () => view('components.layouts.partials.logo'))
      ->sidebarCollapsibleOnDesktop()
      ->viteTheme('resources/scss/filament/admin/theme.scss')
      ->favicon(asset('favicon.ico'))
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
      ]);
  }
}
