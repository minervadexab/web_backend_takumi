<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KknaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kkna_table')->insert([
            [
                'judul_kegiatan' => 'Pelatihan Kepemimpinan Mahasiswa Tingkat Nasional',
                'prodi_table_id' => 6, // Pastikan user dengan ID 1 ada di tabel `users`
                'jenis_akademik_id' => 3, // Pastikan ID 1 ada di tabel `jenis_akademik_table`
                'body' => 'Pelatihan ini bertujuan untuk meningkatkan kemampuan kepemimpinan mahasiswa melalui berbagai sesi interaktif dan simulasi.',
                'image' => 'leadership-training.jpg',
                'slug' => Str::slug('Pelatihan Kepemimpinan Mahasiswa Tingkat Nasional'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_kegiatan' => 'Seminar Pengembangan Inovasi Teknologi',
                'prodi_table_id' => 3, // Pastikan user dengan ID 2 ada di tabel `users`
                'jenis_akademik_id' => 3, // Pastikan ID 2 ada di tabel `jenis_akademik_table`
                'body' => 'Seminar ini menghadirkan pembicara ahli untuk membahas perkembangan terbaru di bidang teknologi inovatif.',
                'image' => 'tech-innovation-seminar.jpg',
                'slug' => Str::slug('Seminar Pengembangan Inovasi Teknologi'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_kegiatan' => 'Workshop Karya Ilmiah Mahasiswa',
                'prodi_table_id' => 5, // Pastikan user dengan ID 3 ada di tabel `users`
                'jenis_akademik_id' => 3, // Pastikan ID 1 ada di tabel `jenis_akademik_table`
                'body' => 'Workshop ini memberikan panduan langkah demi langkah kepada mahasiswa untuk menyusun karya ilmiah yang berkualitas.',
                'image' => 'scientific-writing-workshop.jpg',
                'slug' => Str::slug('Workshop Karya Ilmiah Mahasiswa'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
