<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\NewsLetter;
use Filament\Forms\Set;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */
  protected $policies = [
    Role::class => \App\Policies\RolePolicy::class,
    Permission::class => \App\Policies\PermissionPolicy::class,
    NewsLetter::class => \App\Policies\NewsLetterPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   */
  public function boot(): void
  {
    VerifyEmail::toMailUsing(function ($notifiable, $url) {
      return (new \App\Mail\User\VerifyEmail($url, $notifiable->name))
        ->to($notifiable->email);
    });

    ResetPassword::toMailUsing(function ($notifiable, $token) {
      $url = url(route('password.reset', [
        'token' => $token,
        'email' => $notifiable->getEmailForPasswordReset(),
      ], false));

      return (new \App\Mail\User\ResetPassword($url, $notifiable->name))
        ->to($notifiable->email);
    });
  }
}
