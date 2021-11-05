<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {

  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    'App\Models\Item\Item' => 'App\Policies\Item\ItemPolicy',
    'App\Models\Item\Detail' => 'App\Policies\Item\DetailPolicy',
    'App\Models\Item\Brand' => 'App\Policies\Item\BrandPolicy',
    'App\Models\Item\ItemType' => 'App\Policies\Item\ItemTypePolicy',
    'App\Models\Item\DetailType' => 'App\Policies\Item\DetailTypePolicy',
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot(){

    $this->registerPolicies();
    Gate::before(fn($user) => $user->isAdmin() ?: null);
  }
}
