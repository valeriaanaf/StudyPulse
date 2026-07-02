<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TugasSeeder::class,
        ]);

        User::create([
            'name' => 'Mahasiswa Responsi',
            'email' => 'admin@studypulse.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
