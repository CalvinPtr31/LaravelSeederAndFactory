<?php

namespace Database\Factories;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Matakuliah>
 */
class MatakuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kodeMk' => strtoupper(fake()->unique()->bothify('MK###')), // 5-6 char
            'namaMk' => fake()->randomElement([
                'Pemrograman Web Lanjut',
                'Basis Data',
                'Struktur Data',
                'Algoritma dan Pemrograman',
                'Rekayasa Perangkat Lunak',
                'Jaringan Komputer',
                'Sistem Operasi',
                'Kecerdasan Buatan',
            ]),
            'sks' => fake()->randomElement([2, 3, 4]),
        ];
    }
}
