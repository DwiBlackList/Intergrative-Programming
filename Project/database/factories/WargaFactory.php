<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Warga;

class WargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 10));
        return [
            // 'nama' => substr($title, 0, strlen($title) - 1),
            'nama' => $this->faker->name,
            'alamat' => $this->faker->text,
        ];
    }
}
