<?php

namespace Database\Seeders;

use App\Models\Item\Detail;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Detail::factory(20)->create();
    }
}
