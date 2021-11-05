<?php

namespace App\Policies\Item;

use App\Models\User;
use App\Models\Item\DetailType;
use Illuminate\Auth\Access\HandlesAuthorization;

class DetailTypePolicy {

  use HandlesAuthorization;

  /**
   * Determine whether the user can view any models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function viewAny(User $user){

    if($user->hasPermissionTo('view detail type')) return true;
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Item\DetailType  $model
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, DetailType $model){

    if($user->hasPermissionTo('view detail type')) return true;
  }

  /**
   * Determine whether the user can create models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function create(User $user){

    if($user->hasPermissionTo('create detail type')) return true;
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Item\DetailType  $model
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function update(User $user, DetailType $model){

    if($user->hasPermissionTo('update detail type')) return true;
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Item\DetailType  $model
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function delete(User $user, DetailType $model){

    if($user->hasPermissionTo('delete detail type')) return true;
  }
}
