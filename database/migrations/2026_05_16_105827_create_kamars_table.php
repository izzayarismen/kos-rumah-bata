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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar', 10);
            $table->string('tower', 50);
            $table->enum('tipe_kamar', ['ac', 'non-ac']);
            $table->bigInteger('harga');
            $table->string('luas', 30);
            $table->text('fasilitas');
            $table->text('deskripsi')->nullable(); // <-- TAMBAHKAN KOLOM INI
            $table->enum('status', ['tersedia', 'penuh'])->default('tersedia');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
