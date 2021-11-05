<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run(){

    $this->call([
      PermissionSeeder::class,
      RoleSeeder::class,
      UserSeeder::class,
      ItemTypeSeeder::class,
      BrandSeeder::class,
      DetailTypeSeeder::class,
      ItemSeeder::class,
      DetailSeeder::class,
    ]);
  }
}
