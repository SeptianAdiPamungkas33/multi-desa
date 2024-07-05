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
        Schema::create('tentangkamis', function (Blueprint $table) {
            $table->id();

            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();

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
        Schema::dropIfExists('tentangkamis');
    }
};
