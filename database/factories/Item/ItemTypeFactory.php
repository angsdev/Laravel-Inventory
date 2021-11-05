<?php

namespace Database\Factories\Item;

use App\Models\Item\ItemType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemTypeFactory extends Factory {

  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ItemType::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition(){

    return [
      'name' => $this->faker->name(),
      'created_at' => now(),
      'updated_at' => now()
    ];
  }
}
