<?php

namespace App\Policies;

use App\Models\NewsLetter;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NewsLetterPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): bool
  {
    return $user->hasPermissionTo('view news letters');
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, NewsLetter $newsLetter): bool
  {
    return $user->hasPermissionTo('view news letters');
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): bool
  {
    return $user->hasPermissionTo('create news letters');
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, NewsLetter $newsLetter): bool
  {
    return $user->hasPermissionTo('update news letters');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, NewsLetter $newsLetter): bool
  {
    return $user->hasPermissionTo('delete news letters');
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, NewsLetter $newsLetter): bool
  {
    return false;
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, NewsLetter $newsLetter): bool
  {
    return false;
  }
}
