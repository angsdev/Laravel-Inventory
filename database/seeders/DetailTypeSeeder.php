<?php

namespace Database\Seeders;

use App\Models\Item\DetailType;
use Illuminate\Database\Seeder;

class DetailTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DetailType::factory(5)->create();
    }
}
