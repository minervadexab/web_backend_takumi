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
        Schema::create('potm_table', function (Blueprint $table) {
            $table->id();
            $table->string('Nama Potm');
            $table->text('deskripsi');
            $table->string('image');
            $table->text('gelar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potm_table');
    }
};
