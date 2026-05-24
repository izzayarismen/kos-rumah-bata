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
        Schema::create('pengajuan_sewas', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kamar_id')->constrained('kamars')->onDelete('cascade');

            $table->string('nama');
            $table->string('ktp_dokumen')->nullable();
            $table->string('no_hp', 20);
            $table->string('kontak_darurat', 20);
            $table->text('alamat');
            $table->string('surat_komitmen')->nullable();

            $table->date('tanggal_mulai');
            $table->integer('durasi_sewa');
            $table->text('catatan')->nullable();

            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');

            // 2 Field Baru Tambahan
            $table->boolean('sudah_bayar')->default(false);
            $table->string('bukti_transfer')->nullable();
            $table->enum('tipe_pembayaran', ['lunas', 'dp'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_sewas');
    }
};
