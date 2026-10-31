<?php

namespace Database\Factories;

use App\Models\Jadwal;
use App\Models\Krskhs;
use App\Models\Registrasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Krskhs>
 */
class KrskhsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'noReg' => Registrasi::factory(),
            'jadwalId' => Jadwal::factory(),
            'nilai' => fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
        ];
    }
}
