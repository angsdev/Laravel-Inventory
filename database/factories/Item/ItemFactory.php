<?php

namespace Database\Factories\Item;

use App\Models\User;
use App\Models\Item\Item;
use App\Models\Item\Brand;
use App\Models\Item\ItemType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory {

  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Item::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition(){

    return [
      'user_id' => User::all()->random()->id,
      'type_id' => ItemType::all()->random()->id,
      'brand_id' => Brand::all()->random()->id,
      'created_at' => now(),
      'updated_at' => now()
    ];
  }
}
