<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\Registrasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Registrasi>
 */
class RegistrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => fake()->date(),
            'nim' => Mahasiswa::factory(),
        ];
    }
}
