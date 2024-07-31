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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();

            $table->integer('laki')->default('0');
            $table->integer('perempuan')->default('0');
            $table->integer('total_penduduk')->default('0');
            $table->decimal('persen_laki', 5, 2)->default('0.00');
            $table->decimal('persen_perempuan', 5, 2)->default('0.00');

            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id')->references('id')->on('website')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
