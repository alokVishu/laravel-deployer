<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;

class ReviewPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): bool
  {
    return $user->hasPermissionTo('view reviews');
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, Review $review): bool
  {
    return $user->hasPermissionTo('view reviews');
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): bool
  {
    return $user->hasPermissionTo('create reviews');
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Review $review): bool
  {
    return $user->hasPermissionTo('update reviews');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Review $review): bool
  {
    return $user->hasPermissionTo('delete reviews');
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Review $review): bool
  {
    return false;
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Review $review): bool
  {
    return false;
  }
}
