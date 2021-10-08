<?php

namespace Database\Factories;

use App\Models\Nft;
use Illuminate\Database\Eloquent\Factories\Factory;

class NftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nft::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'creator' => $this->faker->name(),
            'price' => $this->faker->numberBetween($min = 1, $max = 500),
            'blockchain' => $this->faker->word(),
            'media_url' => $this->faker->word(),
            'collection_id' => $this->faker->randomDigit()
        ];
    }
}
