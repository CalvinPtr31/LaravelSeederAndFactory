<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MahasiswaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = [
            ['71230988', 'Calvin Putra S', 'Magelang'], ['71230999', 'Markonah', 'Magelang' ],
        ];

        foreach ($mahasiswa as $mhs) {
            DB::table('mahasiswas')->insert([
                'nim' => $mhs[0],
                'nama' => $mhs[1],
                'alamat' => $mhs[2], 
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            User::create([
                'nim' => $mhs[0],
                'name' => $mhs[1],
                'email' => $mhs[0].'@sia.ac.id',
                'password' => Hash::make($mhs[0]),
                'role' => 'mahasiswa',
            ]);
        }
    }
}
