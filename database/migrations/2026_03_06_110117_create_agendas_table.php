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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('no_agenda');
            $table->string('nama_agenda');
            $table->string('deskripsi_agenda');
            $table->dateTime('tanggal_agenda');
            $table->enum('lokasi', ['Online', 'Offline'])->default('Offline');
            $table->string('detail_lokasi');
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
