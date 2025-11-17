<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'name' => 'C101',
                'capacity' => 25,
                'location' => 'Gedung D4 - Lantai 1',
                'description' => 'Ruang kelas dengan AC dan proyektor.',
                'status' => 'available',
            ],
            [
                'name' => 'C102',
                'capacity' => 30,
                'location' => 'Gedung D4 - Lantai 1',
                'description' => 'Lab Tugas Akhir.',
                'status' => 'available',
            ],
            [
                'name' => 'C103',
                'capacity' => 15,
                'location' => 'Gedung D4 - Lantai 1',
                'description' => 'Ruang meeting kecil, AC, TV display.',
                'status' => 'maintenance',
            ],
            [
                'name' => 'C104',
                'capacity' => 40,
                'location' => 'Gedung D4 - Lantai 1',
                'description' => 'Lab komputer lengkap dengan 40 PC, AC, dan projector.',
                'status' => 'available',
            ],
            [
                'name' => 'C105',
                'capacity' => 150,
                'location' => 'Gedung Utama - Lantai 1',
                'description' => 'Aula besar untuk seminar, kapasitas 150 orang, sound system, projector.',
                'status' => 'available',
            ],

            [
                'name' => 'B201',
                'capacity' => 20,
                'location' => 'Gedung B - Lantai 2',
                'description' => 'Ruang kelas standar dengan AC dan whiteboard.',
                'status' => 'available',
            ],
            [
                'name' => 'B202',
                'capacity' => 35,
                'location' => 'Gedung B - Lantai 3',
                'description' => 'Ruang kelas besar, dilengkapi proyektor.',
                'status' => 'available',
            ],
            [
                'name' => 'B203',
                'capacity' => 50,
                'location' => 'Gedung B - Lantai 1',
                'description' => 'Ruang auditorium kecil dengan kursi teater.',
                'status' => 'maintenance',
            ],
            [
                'name' => 'B204',
                'capacity' => 28,
                'location' => 'Gedung B - Lantai 2',
                'description' => 'Ruang rapat dengan meja bundar dan AC.',
                'status' => 'available',
            ],
            
            [
                'name' => 'B205',
                'capacity' => 28,
                'location' => 'Gedung B - Lantai 2',
                'description' => 'Ruang rapat dengan meja bundar dan AC.',
                'status' => 'available',
            ],

            [
                'name' => 'C301',
                'capacity' => 32,
                'location' => 'Gedung C - Lantai 3',
                'description' => 'Ruang seminar kecil dengan proyektor.',
                'status' => 'available',
            ],
            [
                'name' => 'C302',
                'capacity' => 35,
                'location' => 'Gedung C - Lantai 3',
                'description' => 'Lab komputer dengan 35 PC, cocok untuk praktikum.',
                'status' => 'available',
            ],
            [
                'name' => 'C303',
                'capacity' => 45,
                'location' => 'Gedung C - Lantai 3',
                'description' => 'Lab teknis untuk praktikum elektronika.',
                'status' => 'maintenance',
            ],
            [
                'name' => 'C304',
                'capacity' => 20,
                'location' => 'Gedung C - Lantai 3',
                'description' => 'Studio untuk produksi audio dan video.',
                'status' => 'available',
            ],
            [
                'name' => 'C305',
                'capacity' => 20,
                'location' => 'Gedung C - Lantai 3',
                'description' => 'Studio untuk produksi audio dan video.',
                'status' => 'available',
            ]
        ]);
    }
}
