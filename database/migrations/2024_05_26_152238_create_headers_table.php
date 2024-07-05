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
        Schema::create('headers', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('nama_menu1')->nullable();
            $table->string('nama_menu2')->nullable();
            $table->string('nama_menu3')->nullable();
            $table->string('nama_menu4')->nullable();
            $table->string('nama_menu5')->nullable();
            $table->string('nama_menu6')->nullable();
            $table->string('image')->nullable();

            $table->string('navbar_color')->default('bg-blue-500');

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
        Schema::dropIfExists('headers');
    }
};
