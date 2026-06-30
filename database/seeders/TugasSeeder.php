<?php

namespace Database\Seeders;

use App\Models\Tugas;
use Illuminate\Database\Seeder;

class TugasSeeder extends Seeder
{
    public function run(): void
    {
        Tugas::create([
            'nama_tugas' => 'Membuat Program REST API',
            'mata_kuliah' => 'Praktikum Rekayasa Web',
            'tenggat_waktu' => '2026-07-03 08:00:00',
            'status' => true
        ]);

        Tugas::create([
            'nama_tugas' => 'Membuat Program CRUD Laravel',
            'mata_kuliah' => 'Rekayasa Web',
            'tenggat_waktu' => '2026-06-25 10:00:00',
            'status' => true
        ]);

        Tugas::create([
            'nama_tugas' => 'Menjelaskan Git/Github',
            'mata_kuliah' => 'Komputasi Awan',
            'tenggat_waktu' => '2026-07-05 23:59:00',
            'status' => false
        ]);
        
        Tugas::create([
            'nama_tugas' => 'Menjelaskan konsep SaaS',
            'mata_kuliah' => 'Komputasi Awan',
            'tenggat_waktu' => '2026-07-05 23:59:00',
            'status' => true
        ]);

        Tugas::create([
            'nama_tugas' => 'Project Roboflow',
            'mata_kuliah' => 'Kecerdasan Artifisial',
            'tenggat_waktu' => '2026-07-05 23:59:00',
            'status' => true
        ]);

        Tugas::create([
            'nama_tugas' => 'Responsi Praktikum 3D',
            'mata_kuliah' => 'Praktikum Dasar Model 3D',
            'tenggat_waktu' => '2026-07-05 23:59:00',
            'status' => false
        ]);

        Tugas::create([
            'nama_tugas' => 'Menghitung luas pulau',
            'mata_kuliah' => 'Komputasi Numerik',
            'tenggat_waktu' => '2026-07-05 23:59:00',
            'status' => false
        ]);
        Tugas::create([
            'nama_tugas' => '',
            'mata_kuliah' => '',
            'tenggat_waktu' => '2026-07-05 23:59:00',
            'status' => false
        ]);
        Tugas::create([
            'nama_tugas' => '',
            'mata_kuliah' => '',
            'tenggat_waktu' => '2026-07-05 23:59:00',
            'status' => false
        ]);
        Tugas::create([
            'nama_tugas' => '',
            'mata_kuliah' => '',
            'tenggat_waktu' => '2026-07-05 23:59:00',
            'status' => false
        ]);

    }
}