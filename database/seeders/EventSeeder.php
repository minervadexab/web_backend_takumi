<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_table')->insert([
            [
                'judul_event' => 'Workshop Teknologi Masa Depan',
                'prodi_table_id' => 2, // Pastikan user dengan ID 1 ada di tabel `users`
                'body' => 'Ini adalah workshop yang membahas tentang teknologi masa depan dan inovasi terbaru di bidang IT.',
                'image' => 'workshop-tech.jpg',
                'lokasi' => 'Jakarta Convention Center',
                'slug' => Str::slug('Workshop Teknologi Masa Depan'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_event' => 'Seminar Kesehatan 2025',
                'prodi_table_id' => 4, // Pastikan user dengan ID 2 ada di tabel `users`
                'body' => 'Seminar ini membahas tentang pentingnya menjaga kesehatan dan gaya hidup sehat.',
                'image' => 'health-seminar.jpg',
                'lokasi' => 'Hotel Santika Bandung',
                'slug' => Str::slug('Seminar Kesehatan 2025'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_event' => 'Festival Kuliner Nusantara',
                'prodi_table_id' => 5, // Pastikan user dengan ID 1 ada di tabel `users`
                'body' => 'Festival yang menampilkan beragam kuliner khas dari seluruh nusantara.',
                'image' => 'culinary-festival.jpg',
                'lokasi' => 'Lapangan Merdeka Yogyakarta',
                'slug' => Str::slug('Festival Kuliner Nusantara'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
