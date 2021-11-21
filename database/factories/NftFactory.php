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
        $images = ["QmaF6yQi3mZagNEAxb7DGvfcQLs1uQTNfZUnCNPeSq4yLs", "QmXh6SLu8Bbbn3jYkjrPAtiVhs4HwT3c1HM2UHgnTZBcRi", "QmTJERncT545utCGjq7QLJWRs1U3NXiqpWp1h4f3aTUdS2", "Qmcu5RE3xHQGkE37NtkmjSCnJcduUiFxQE38aFb2rzdWSc", "QmTqMFq5hnTuojkPKncqDhCr81VMoyCfhJ5JY2zdCBKKEB"];
        return [
            'title' => $this->faker->unique()->word(),
            'user_id' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(1, 500),
            'blockchain' => $this->faker->word(),
            'media_url' => $images[rand(0, 4)],
            'collection_id' => $this->faker->numberBetween(11, 15),
            'owners'=>[]
        ];
    }
}
