<?php

namespace Database\Factories;

use App\Models\MovieTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieTicketFactory extends Factory
{
    protected $model = MovieTicket::class;

    public function definition()
    {
        return [
            'movie_title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'genre' => $this->faker->word,
            'poster' => $this->faker->imageUrl(),
            'release_date' => $this->faker->date,
            'show_time' => $this->faker->time,
            'price' => $this->faker->numberBetween(50000, 200000),
            'available_seats' => $this->faker->numberBetween(0, 100),
        ];
    }
}
