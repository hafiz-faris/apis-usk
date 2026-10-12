<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->unique(); // Tambahan kolom nomor pendaftaran
            $table->foreignId('skema_id')->constrained('skemas')->onDelete('cascade');
            $table->string('nama_peserta');
            $table->enum('jns_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};