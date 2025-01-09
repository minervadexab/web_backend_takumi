<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectAndResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projectandresearch_table')->insert([
            [
                'judul_project' => 'Pengembangan Sistem Smart Home Berbasis IoT',
                'prodi_table_id' => 3, // Pastikan user dengan ID 1 ada di tabel `users`
                'body' => 'Penelitian ini bertujuan untuk mengembangkan sistem smart home yang dapat dikontrol melalui aplikasi mobile.',
                'image' => 'smart-home-project.jpg',
                'slug' => Str::slug('Pengembangan Sistem Smart Home Berbasis IoT'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_project' => 'Analisis Dampak AI Terhadap Industri Manufaktur',
                'prodi_table_id' => 3, // Pastikan user dengan ID 2 ada di tabel `users`
                'body' => 'Studi ini menganalisis dampak implementasi Artificial Intelligence (AI) pada efisiensi proses produksi di industri manufaktur.',
                'image' => 'ai-manufacturing-research.jpg',
                'slug' => Str::slug('Analisis Dampak AI Terhadap Industri Manufaktur'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_project' => 'Prototipe Aplikasi Pengelolaan Sampah Berbasis Blockchain',
                'prodi_table_id' => 2, // Pastikan user dengan ID 1 ada di tabel `users`
                'body' => 'Proyek ini mengembangkan prototipe aplikasi berbasis blockchain untuk mendukung pengelolaan sampah secara transparan.',
                'image' => 'blockchain-waste-management.jpg',
                'slug' => Str::slug('Prototipe Aplikasi Pengelolaan Sampah Berbasis Blockchain'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
