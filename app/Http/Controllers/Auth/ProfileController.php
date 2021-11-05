<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProfileController extends ApiController {

  /**
   * Get user profile info.
   *
   * @param  \Illuminate\Http\Request $request
   * @return Illuminate\Http\Response
   */
  public function index(Request $request){

    $user = $request->user()->load('roles', 'roles.permissions', 'permissions');
    return $this->successResponse($user);
  }

  /**
   * Get user profile roles.
   *
   * @param  \Illuminate\Http\Request $request
   * @return Illuminate\Http\Response
   */
  public function roles(Request $request){

    $roles = $request->user()->roles->load('permissions');
    return $this->successResponse($roles);
  }

  /**
   * Get user profile permissions.
   *
   * @param  \Illuminate\Http\Request $request
   * @return Illuminate\Http\Response
   */
  public function permissions(Request $request){

    $permissions = $request->user()->permissions;
    return $this->successResponse($permissions);
  }
}
