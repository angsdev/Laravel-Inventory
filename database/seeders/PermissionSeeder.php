<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    Permission::factory()->createMany([
      // Users
      [
        'name' => 'view any user',
        'description' => 'Permission that allow see any user.'
      ],
      [
        'name' => 'view user',
        'description' => 'Permission that allow see own user.'
      ],
      [
        'name' => 'create user',
        'description' => 'Permission that allow create an user.'
      ],
      [
        'name' => 'update any user',
        'description' => 'Permission that allow update any user.'
      ],
      [
        'name' => 'update user',
        'description' => 'Permission that allow update own view.'
      ],
      [
        'name' => 'delete any user',
        'description' => 'Permission that allow delete any user.'
      ],
      [
        'name' => 'delete user',
        'description' => 'Permission that allow delete own user.'
      ],
      // Roles
      [
        'name' => 'view any role',
        'description' => 'Permission that allow see any role.'
      ],
      [
        'name' => 'view role',
        'description' => 'Permission that allow see own role.'
      ],
      [
        'name' => 'create role',
        'description' => 'Permission that allow create role.'
      ],
      [
        'name' => 'update role',
        'description' => 'Permission that allow update role.'
      ],
      [
        'name' => 'delete role',
        'description' => 'Permission that allow delete role.'
      ],
      // Permissions
      [
        'name' => 'view any permission',
        'description' => 'Permission that allow see any permission.'
      ],
      [
        'name' => 'view permission',
        'description' => 'Permission that allow see own permission.'
      ],
      [
        'name' => 'create permission',
        'description' => 'Permission that allow create permission.'
      ],
      [
        'name' => 'update permission',
        'description' => 'Permission that allow update permission.'
      ],
      [
        'name' => 'delete permission',
        'description' => 'Permission that allow delete permission.'
      ],
      // Items
      [
        'name' => 'view any item',
        'description' => 'Permission that allow any item.'
      ],
      [
        'name' => 'view item',
        'description' => 'Permission that allow see own item.'
      ],
      [
        'name' => 'create item',
        'description' => 'Permission that allow create item.'
      ],
      [
        'name' => 'update any item',
        'description' => 'Permission that allow update any item.'
      ],
      [
        'name' => 'update item',
        'description' => 'Permission that allow update own item.'
      ],
      [
        'name' => 'delete any item',
        'description' => 'Permission that allow delete any item.'
      ],
      [
        'name' => 'delete item',
        'description' => 'Permission that allow delete own item.'
      ],
      // Details
      [
        'name' => 'view detail',
        'description' => 'Permission that allow see item detail.'
      ],
      [
        'name' => 'create detail',
        'description' => 'Permission that allow create item detail.'
      ],
      [
        'name' => 'update detail',
        'description' => 'Permission that allow update item detail.'
      ],
      [
        'name' => 'delete detail',
        'description' => 'Permission that allow delete item detail.'
      ],
      // Brands
      [
        'name' => 'view brand',
        'description' => 'Permission that allow see item brand.'
      ],
      [
        'name' => 'create brand',
        'description' => 'Permission that allow create item brand.'
      ],
      [
        'name' => 'update brand',
        'description' => 'Permission that allow update item brand.'
      ],
      [
        'name' => 'delete brand',
        'description' => 'Permission that allow delete item brand.'
      ],
      // Item types
      [
        'name' => 'view item type',
        'description' => 'Permission that allow see item type.'
      ],
      [
        'name' => 'create item type',
        'description' => 'Permission that allow create item type.'
      ],
      [
        'name' => 'update item type',
        'description' => 'Permission that allow update item type.'
      ],
      [
        'name' => 'delete item type',
        'description' => 'Permission that allow delete item type.'
      ],
      // Detail types
      [
        'name' => 'view detail type',
        'description' => 'Permission that allow see detail type.'
      ],
      [
        'name' => 'create detail type',
        'description' => 'Permission that allow create detail type.'
      ],
      [
        'name' => 'update detail type',
        'description' => 'Permission that allow update detail type.'
      ],
      [
        'name' => 'delete detail type',
        'description' => 'Permission that allow delete detail type.'
      ]
    ]);
  }
}
