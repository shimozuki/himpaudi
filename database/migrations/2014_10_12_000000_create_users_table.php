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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('nik', 16)->unique();
            $table->string('name', 100);
            $table->string('no_hp', 15)->unique();
            $table->string('alamat', 100);
            $table->unsignedBigInteger('id_kecamatan')->nullable();
        
            $table->rememberToken();
            $table->timestamps();
        
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('cascade');
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
