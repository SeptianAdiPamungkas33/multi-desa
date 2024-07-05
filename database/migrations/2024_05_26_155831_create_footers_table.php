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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();

            $table->string('alamat')->nullable();
            $table->string('sosmed')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telepon')->nullable();

            $table->text('jadwal1')->nullable();
            $table->text('jadwal2')->nullable();
            $table->text('jadwal3')->nullable();
            $table->string('link_terkait1')->nullable();
            $table->string('link_terkait2')->nullable();
            $table->string('link_terkait3')->nullable();

            $table->string('link_url1')->nullable();
            $table->string('link_url2')->nullable();
            $table->string('link_url3')->nullable();

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
        Schema::dropIfExists('footers');
    }
};
