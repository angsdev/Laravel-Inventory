<?php

namespace App\Policies\Item;

use App\Models\User;
use App\Models\Item\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy {

  use HandlesAuthorization;

  /**
   * Determine whether the user can view any models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function viewAny(User $user){

    if($user->hasPermissionTo('view any item')) return true;
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Item\Item  $model
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, Item $model){

    if(($user->hasPermissionTo('view item') && $user->id == $model->user->id) ||
        $user->hasPermissionTo('view any item')) return true;
  }

  /**
   * Determine whether the user can create models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function create(User $user){

    if($user->hasPermissionTo('create item')) return true;
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Item\Item  $model
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function update(User $user, Item $model){

    if(($user->hasPermissionTo('update item') && $user->id == $model->user->id) ||
        $user->hasPermissionTo('update any item')) return true;
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Item\Item  $model
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function delete(User $user, Item $model){

    if(($user->hasPermissionTo('delete item') && $user->id == $model->user->id) ||
        $user->hasPermissionTo('delete any item')) return true;
  }
}
