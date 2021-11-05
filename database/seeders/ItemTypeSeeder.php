<?php

namespace Database\Seeders;

use App\Models\Item\ItemType;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ItemType::factory(5)->create();
    }
}
