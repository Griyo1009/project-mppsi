<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengumumans', function (Blueprint $table) {
            $table->id('id_pengumuman');
            $table->string('judul', 225);
            $table->string('gambar', 225)->nullable();
            $table->text('isi');
            $table->date('tgl_pengumuman')->default(DB::raw('CURRENT_DATE'));
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');
            $table->date('tgl_pelaksanaan');
            $table->string('lokasi', 225);
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumumans');
    }
};
