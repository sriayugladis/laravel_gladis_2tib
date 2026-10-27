<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Portofolio_1187', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jabatan', 100);
            $table->string('email', 100);
            $table->string('telepon', 30)->nullable();
            $table->string('alamat', 150)->nullable();
            $table->string('foto')->nullable();
            $table->text('objective')->nullable();
            $table->text('pengalaman')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('skill')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Portofolio_1187');
    }
};