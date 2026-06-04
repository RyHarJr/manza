<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('KategoriProduk', 20);
            $table->string('NamaProduk', 100);
            $table->string('Deskripsi', 255);
            $table->decimal('Harga', 10, 2);
            $table->string('Satuan', 10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
