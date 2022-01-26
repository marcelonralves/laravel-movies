<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'content'=> $this->faker->sentences(100, true),
            'author_id' => 1,
            'slug' => $this->faker->slug
        ];
    }
}
