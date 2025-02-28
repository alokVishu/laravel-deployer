<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): bool
  {
    return $user->hasPermissionTo('view permission');
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, Permission $role): bool
  {
    return $user->hasPermissionTo('view permission');
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): bool
  {
    return $user->hasPermissionTo('create permission');
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Permission $role): bool
  {
    return $user->hasPermissionTo('update permission');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Permission $role): bool
  {
    return $user->hasPermissionTo('delete permission');
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Permission $role): bool
  {
    return false;
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Permission $role): bool
  {
    return false;
  }
}
