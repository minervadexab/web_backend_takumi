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
        Schema::create('kkna_table', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kegiatan');
            $table->foreignId('prodi_table_id');
            $table->foreignId('jenis_akademik_id');
            $table->text('body');
            $table->string('image');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('prodi_table_id')->references('id')->on('prodi_table')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_akademik_id')->references('id')->on('jenis_akademik_table')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kkna_table');
    }
};