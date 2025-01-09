<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [
            [
                'judul_berita' => 'Berita Teknologi Terbaru',
                'prodi_table_id' => 3, // Pastikan user dengan ID ini ada di tabel users
                'body' => 'Ini adalah konten berita tentang teknologi terbaru yang sangat menarik.',
                'image' => 'tech-news.jpg',
                'slug' => Str::slug('berita-teknologi-terbaru'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_berita' => 'Pembaruan Dunia Olahraga',
                'prodi_table_id' => 2, // Pastikan user dengan ID ini ada di tabel users
                'body' => 'Berita mengenai perkembangan terbaru di dunia olahraga.',
                'image' => 'sports-news.jpg',
                'slug' => Str::slug('pembaruan-dunia-olahraga'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_berita' => 'Ekonomi Dunia Meningkat',
                'prodi_table_id' => 5, // Pastikan user dengan ID ini ada di tabel users
                'body' => 'Artikel yang membahas tentang kenaikan ekonomi global.',
                'image' => 'economy-news.jpg',
                'slug' => Str::slug('ekonomi-dunia-meningkat'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('news_table')->insert($newsData);
    }
}

