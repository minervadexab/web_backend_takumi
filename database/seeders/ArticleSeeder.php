<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('article_table')->insert([
            [
                'judul_article' => 'Mengenal Teknologi Blockchain',
                'prodi_table_id' => 1, // Pastikan user dengan ID 1 ada di tabel `users`
                'body' => 'Artikel ini membahas tentang dasar-dasar teknologi blockchain, bagaimana cara kerjanya, dan potensinya di berbagai sektor.',
                'image' => 'blockchain-article.jpg',
                'slug' => Str::slug('Mengenal Teknologi Blockchain'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_article' => 'Tips Menjaga Kesehatan Mental',
                'prodi_table_id' => 2, // Pastikan user dengan ID 2 ada di tabel `users`
                'body' => 'Kesehatan mental adalah bagian penting dari kesejahteraan. Artikel ini memberikan tips untuk menjaga kesehatan mental.',
                'image' => 'mental-health-tips.jpg',
                'slug' => Str::slug('Tips Menjaga Kesehatan Mental'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_article' => 'Peran AI dalam Dunia Pendidikan',
                'prodi_table_id' => 3, // Pastikan user dengan ID 1 ada di tabel `users`
                'body' => 'Artificial Intelligence (AI) telah mengubah banyak sektor, termasuk pendidikan. Artikel ini menjelaskan bagaimana AI diterapkan dalam dunia pendidikan.',
                'image' => 'ai-in-education.jpg',
                'slug' => Str::slug('Peran AI dalam Dunia Pendidikan'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
