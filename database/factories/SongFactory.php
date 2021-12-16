<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'genre_id' => GenreSeeder::class,
            'genre_id' => Genre::factory(),
            'name' => $this->faker->sentence(),
            'artist' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(1,10)
        ];
    }
}
