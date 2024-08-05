<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('urllink')->nullable();
            $table->string('email');
            $table->text('password');
            $table->string('nomor_telepon')->nullable();

            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->unsignedBigInteger('desa_id')->nullable();
            $table->string('nama_desa')->nullable();

            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->string('nama_kecamatan')->nullable();


            // $table->bigInteger('role_id')->unsigned();
            // $table->foreign('role_id')->references('role_id')->on('roles');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
