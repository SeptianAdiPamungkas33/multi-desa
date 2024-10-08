<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeri_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galeri_id');
            $table->unsignedBigInteger('media_id');
            $table->foreign('galeri_id')->references('id')->on('galeris')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri_media');
    }
};
