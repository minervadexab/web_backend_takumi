<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('article_table', function (Blueprint $table) {
            $table->id();
            $table->string('judul_article');
            $table->foreignId('prodi_table_id');
            $table->text('body');
            $table->string('image');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('prodi_table_id')->references('id')->on('prodi_table')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_table');
    }
};