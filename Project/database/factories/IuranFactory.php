<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Iuran;

class IuranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Iuran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $title = $this->faker->sentence(rand(3, 10));
        return [
            // 'title' => substr($title, 0, strlen($title) - 1),
            // 'author' => $this->faker->name,
            'bulan' => $this->faker->date,
            'jumlah_iuran' => $this->faker->number,
            'status' => $this
        ];
    }
}
