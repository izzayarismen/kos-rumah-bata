<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel users (penghuni yang melapor)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Menghubungkan ke tabel kamars jika laporan spesifik per kamar
            $table->foreignId('kamar_id')->constrained('kamars')->onDelete('cascade');
            $table->string('title'); // Contoh: Perbaikan AC, Lampu Mati
            $table->text('description'); // Detail keluhan kerusakan
            $table->integer('cost')->default(0); // Estimasi / total biaya perbaikan
            $table->enum('status', ['waiting', 'process', 'done'])->default('waiting');
            $table->date('date'); // Tanggal pengajuan / pengerjaan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};