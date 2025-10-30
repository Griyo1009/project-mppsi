<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('NIK', 16)->unique();
            $table->string('nama_lengkap', 50);
            $table->string('username', 50);
            $table->string('password', 255); // pakai hash, jadi panjangin
            $table->enum('status_akun', ['0', '1', '2'])->default('0'); // 0 ilegal, 1 legal, 2 blokir
            $table->boolean('role')->default(0); // 0 warga, 1 admin/RT
            $table->string('foto_profil', 225)->nullable();
            $table->string('email', 50)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
