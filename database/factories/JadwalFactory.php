<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hari' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
            'waktu' => fake()->randomElement(['07:30-10:00', '10:15-12:45', '13:00-15:30', '15:45-18:15']),
            'kodeMk' => Matakuliah::factory(),
            'grup' => fake()->randomElement(['A', 'B', 'C', 'D']),
            'nik' => Dosen::factory(),
            'ruang' => 'R.' . fake()->numerify('###'),
        ];
    }
}
