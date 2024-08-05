<?php

use Illuminate\Support\ServiceProvider;

return [

  /*
  /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

  'name' => env('APP_NAME', 'Laravel'),

  /*
  /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

  'env' => env('APP_ENV', 'production'),

  'description' => env('APP_DESCRIPTION', ''),

  /*
  /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

  'debug' => (bool) env('APP_DEBUG', false),

  /*
  /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

  'url' => env('APP_URL', 'http://localhost'),

  /*
  /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

  'timezone' => env('APP_TIMEZONE', 'UTC'),

  /*
  /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

  'locale' => env('APP_LOCALE', 'en'),

  'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

  'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

  /*
  /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

  'cipher' => 'AES-256-CBC',

  'key' => env('APP_KEY'),

  'previous_keys' => [
    ...array_filter(
      explode(',', env('APP_PREVIOUS_KEYS', ''))
    ),
  ],

  /*
  /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

  'maintenance' => [
    'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
    'store' => env('APP_MAINTENANCE_STORE', 'database'),
  ],

  'support_email' => 'hello@themeselection.com',

  'datetime_format' => 'd/m/Y H:i',
  'date_format' => 'd/m/Y',

  'analytics_providers' => json_encode([
    ["name" => "Google Analytics", "snippet" => ""],
    ["name" => "PostHog", "snippet" => ""],
  ]),

  'chatbot_code_snippet' => 'This is a test code snippet',

  // share this
  'share_this_property_id' => env('SHARE_THIS_PROPERTY_ID'),
  'share_this_enabled' => env('SHARE_THIS_ENABLED', false),


  'social_links' => json_encode([
    ["title" => 'facebook', "url" => env('SOCIAL_FACEBOOK_URL')],
    ["title" => 'x', "url" => env('SOCIAL_X_URL')],
    ["title" => 'linkedin', "url" => env('SOCIAL_LINKEDIN_URL')],
    ["title" => 'instagram', "url" => env('SOCIAL_INSTAGRAM_URL')],
    ["title" => 'youtube', "url" => env('SOCIAL_YOUTUBE_URL')],
    ["title" => 'github', "url" => env('SOCIAL_GITHUB_URL')],
  ]),

  'oauth_login_providers' => [
    'google' => true,
    'facebook' => false,
    'github' => false,
    'twitter' => false,
    'magic_link' => false,
  ],

  'payment_provider' => 'stripe', // stripe, lemonsqueezy
  'products' => '', // products data in json format

  'roadmap_enabled' => true,
  'blog_enabled' => true,
  'newsletter_enabled' => false,

  // this is the name of the logo file in the public directory
  'logo' => [
    'light' => 'images/svg/logo-light.svg',
    'dark' => 'images/svg/logo-dark.svg',
  ],

  // Recaptcha
  'recaptcha_enabled' => env('RECAPTCHA_ENABLED', false),

  /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

  'providers' => ServiceProvider::defaultProviders()->merge([
    App\Providers\ConfigProvider::class,

    /*
    * Application Service Providers...
    */
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    // App\Providers\BroadcastServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    App\Providers\Filament\DashboardPanelProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    App\Providers\NewsLetterServiceProvider::class,
  ])->toArray(),

  // stripe
  'stripe_publishable_key' => env('STRIPE_PUBLISHABLE_KEY'),
];
