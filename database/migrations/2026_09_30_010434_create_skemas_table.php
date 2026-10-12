<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skemas', function (Blueprint $table) {
            $table->id();
            $table->string('kd_skema')->unique();
            $table->string('nm_skema');
            $table->string('jenis');
            $table->integer('jml_unit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skemas');
    }
};