<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'nama'=> $this->faker->name,
            'nim' => 'L0122' . $this->faker->unique()->numerify('###'),
            'prodi'=> $this->faker->randomElement(['Informatika', 'Sains Data']),
            'kelas'=> $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
            'angkatan'=> $this->faker->randomElement(['2020', '2021', '2022', '2023', '2024']),
        ];
    }
}
