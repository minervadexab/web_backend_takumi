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
            $table->string('judul acara');
            $table->string('sub judul');
            $table->string('image');
            $table->text('deskripsi');
            $table->datetime('tanggal');
            $table->timestamps();
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
