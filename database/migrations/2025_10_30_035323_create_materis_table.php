<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id('id_materi');
            $table->string('judul_materi', 225);
            $table->text('deskripsi');
            $table->enum('tipe_materi', ['pdf', 'mp4', 'link', 'teks', 'gambar']);
            $table->string('file_path', 225)->nullable();
            $table->string('link_url', 225)->nullable();
            $table->date('tgl_up')->default(now());
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};
