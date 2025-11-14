<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi_files', function (Blueprint $table) {
            $table->id('id_file'); // primary key
            $table->unsignedBigInteger('id_materi')->index();
            $table->enum('tipe_file', ['pdf','mp4','link','teks','gambar'])->default('pdf');
            $table->string('file_path')->nullable(); // penyimpanan di storage/app/public/...
            $table->string('link_url')->nullable();  // jika tipe_file == 'link'
            $table->timestamps();

            // foreign key ke tabel materi (sesuaikan nama PK di tabel materi)
            $table->foreign('id_materi')->references('id_materi')->on('materis')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi_files');
    }
};
