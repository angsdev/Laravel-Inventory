<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Item\ItemController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Item\ItemTypeController;
use App\Http\Controllers\User\UserRoleController;
use App\Http\Controllers\Item\ItemBrandController;
use App\Http\Controllers\Item\Type\TypeController;
use App\Http\Controllers\User\Role\RoleController;
use App\Http\Controllers\Item\ItemDetailController;
use App\Http\Controllers\Item\Brand\BrandController;
use App\Http\Controllers\User\UserPermissionController;
use App\Http\Controllers\User\Role\RolePermissionController;
use App\Http\Controllers\User\Permission\PermissionController;
use App\Http\Controllers\Item\Detail\TypeController as DetailTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('guest')->group(function(){

  Route::post('register', [ UserController::class, 'store' ]);
  Route::post('login', [ LoginController::class, 'login' ]);
  Route::post('forgot-password', [ PasswordController::class, 'forgotPassword' ])->name('password.email');
  Route::post('reset-password', [ PasswordController::class, 'resetPassword' ])->name('password.reset');
});

Route::middleware('auth:sanctum')->group(function(){

  Route::get('email/verify/{id}/{hash}', [ EmailController::class, 'verifyEmail' ])->name('verification.verify');
  Route::post('email/verify-notification', [ EmailController::class, 'resendEmailVerification' ]);
  Route::middleware('verified')->group(function(){

    /** User Profile */
    Route::prefix('profile')->group(function(){

      Route::get('/', [ ProfileController::class, 'index' ]);
      Route::get('roles', [ ProfileController::class, 'roles' ]);
      Route::get('permissions', [ ProfileController::class, 'permissions' ]);
    });
    /** Resources endpoints */
    Route::apiResources([
      'users' => UserController::class,
      'roles' => RoleController::class,
      'permissions' => PermissionController::class,
      'items/types' => TypeController::class,
      'items/brands' => BrandController::class,
      'items/details/types' => DetailTypeController::class,
      'items' => ItemController::class,
      'items.details' => ItemDetailController::class
    ]);
    Route::apiResources([
      'users.roles' => UserRoleController::class,
      'users.permissions' => UserPermissionController::class,
      'roles.permissions' => RolePermissionController::class
    ], [ 'except' => 'update' ]);
    Route::match(['put', 'patch'], 'users/{user}/roles', [ UserRoleController::class, 'update' ])->name('users.roles.update');
    Route::match(['put', 'patch'], 'users/{user}/permissions', [ UserPermissionController::class, 'update' ])->name('users.permissions.update');
    Route::match(['put', 'patch'], 'roles/{role}/permissions', [ RolePermissionController::class, 'update' ])->name('roles.permissions.update');

    Route::prefix('items/{item}/type')->group(function(){
      Route::get('/', [ ItemTypeController::class, 'index' ])->name('items.type.index');
      Route::match(['post', 'put', 'patch'], '/', [ ItemTypeController::class, 'update' ])->name('items.type.update');
      Route::delete('/', [ ItemTypeController::class, 'destroy' ])->name('items.type.delete');
    });
    Route::prefix('items/{item}/brand')->group(function(){
      Route::get('/', [ ItemBrandController::class, 'index' ])->name('items.brand.index');
      Route::match(['post', 'put', 'patch'], '/', [ ItemBrandController::class, 'update' ])->name('items.brand.update');
      Route::delete('/', [ ItemBrandController::class, 'destroy' ])->name('items.brand.delete');
    });
  });
  Route::match(['post', 'get'], 'logout', [ LoginController::class, 'logout' ]);
});

Route::fallback(fn() => response()->json(['success' => false, 'message' => 'Resource not found.'], 404));
