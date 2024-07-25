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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();

            $table->string('judul_galeri');
            // $table->string('image')->nullable();
            $table->string('status')->default('aktif');

            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id')->references('id')->on('website');

            $table->unsignedBigInteger('desa_Id');
            $table->foreign('desa_Id')->references('id')->on('desas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
