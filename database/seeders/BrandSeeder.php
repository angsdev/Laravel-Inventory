<?php

namespace Database\Seeders;

use App\Models\Item\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Brand::factory(5)->create();
    }
}
