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
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();

            $table->string('judul');
            $table->text('isi');
            $table->string('gambar');
            $table->string('status')->default('aktif');

            $table->unsignedBigInteger('desa_id');
            $table->foreign('desa_id')->references('id')->on('desas');

            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris');

            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id')->references('id')->on('website');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postingans');
    }
};
