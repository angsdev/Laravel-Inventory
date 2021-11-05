<?php

namespace Database\Factories\Item;

use App\Models\Item\Item;
use App\Models\Item\Detail;
use App\Models\Item\DetailType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory {

  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Detail::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition(){

    return [
      'item_id' => Item::all()->random()->id,
      'type_id' => DetailType::all()->random()->id,
      'value' => $this->faker->name(),
      'created_at' => now(),
      'updated_at' => now()
    ];
  }
}
