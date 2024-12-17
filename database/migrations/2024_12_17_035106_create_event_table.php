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
        Schema::create('event_table', function (Blueprint $table) {
            $table->id();
            $table->string('judul_event');
            $table->foreignId('prodi_id');
            $table->text('body');
            $table->string('image');
            $table->string('lokasi');
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodi_table')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_table');
    }
};
