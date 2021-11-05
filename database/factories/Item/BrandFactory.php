<?php

namespace Database\Factories\Item;

use App\Models\Item\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory {

  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Brand::class;

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
