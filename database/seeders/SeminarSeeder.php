<?php

namespace Database\Seeders;

use App\Models\Seminar;
use Illuminate\Database\Seeder;

class SeminarSeeder extends Seeder
{
    public function run()
    {
        Seminar::create([
            'title' => 'Workshop Laravel untuk Pemula',
            'description' => 'Pelajari dasar-dasar Laravel dari nol hingga membuat aplikasi web lengkap',
            'date' => now()->addDays(7),
            'time' => '09:00:00',
            'location' => 'Ruang A1, Gedung TI',
            'max_participants' => 30,
            'price' => 150000,
            'is_active' => true
        ]);

        Seminar::create([
            'title' => 'Pengenalan React.js',
            'description' => 'Memahami konsep dasar React.js untuk pengembangan frontend modern',
            'date' => now()->addDays(14),
            'time' => '13:00:00',
            'location' => 'Lab Komputer B2',
            'max_participants' => 25,
            'price' => 200000,
            'is_active' => true
        ]);
    }
}