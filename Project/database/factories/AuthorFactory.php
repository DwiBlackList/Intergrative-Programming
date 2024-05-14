<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $title = $this->faker->sentence(rand(3, 10));
        return [
            'name' => $this->faker->name,
            'biography' => join(" ", $this->faker->sentences(rand(3, 5))),
            'gender' => rand(1, 6) % 2 === 0 ? 'male' : 'female'
        ];
    }
}
