<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail, HasAvatar
{
  use HasFactory, Notifiable, TwoFactorAuthenticatable, HasRoles, HasSuperAdmin;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'is_admin',
    'is_blocked',
    'email_verified_at',
    'avatar_url',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  public function canAccessPanel(Panel $panel): bool
  {
    if ($panel->getId() == 'admin' && !$this->is_admin) {
      return false;
    }

    return true;
  }

  public function isAdmin()
  {
    return $this->is_admin;
  }

  public function canComment(): bool
  {
    return Auth::check() && !$this->is_blocked;
  }

  public function getFilamentAvatarUrl(): ?string
  {

    return $this->avatar_url ? Storage::url($this->avatar_url) : null;
  }
}
