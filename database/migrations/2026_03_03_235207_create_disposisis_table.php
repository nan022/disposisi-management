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
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            // Identitas
            $table->string('no_agenda');
            $table->date('tanggal_agenda');
            $table->string('jenis_agenda');
            $table->string('sifat');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('asal_surat');
            $table->string('tujuan_surat');
            $table->string('perihal');

            // Detail
            $table->text('lampiran')->nullable();
            $table->integer('jumlah_lembar')->default(1);
            $table->string('klasifikasi')->nullable();
            $table->string('retensi')->nullable();
            $table->string('attachment')->nullable(); // File path

            // Distribusi boolean flags
            $table->boolean('diketahui')->default(false);
            $table->boolean('ditindaklanjuti')->default(false);
            $table->boolean('jadwalkan_hadir')->default(false);

            // Log
            $table->text('catatan')->nullable();
            $table->date('tanggal_disposisi')->nullable();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisis');
    }
};
