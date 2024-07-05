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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();

            $table->string('judul1')->nullable();
            $table->text('deskripsi1')->nullable();
            $table->string('gambar1')->nullable();

            $table->string('judul2')->nullable();
            $table->text('deskripsi2')->nullable();
            $table->string('gambar2')->nullable();

            $table->string('judul3')->nullable();
            $table->text('deskripsi3')->nullable();
            $table->string('gambar3')->nullable();

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
        Schema::dropIfExists('layanans');
    }
};
