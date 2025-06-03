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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rapat');
            $table->string('bidang_rapat');
            $table->date('tanggal_rapat');
            $table->string('pemimpin_rapat');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('ruangan_rapat');
            $table->string('pengelola_rapat');
            $table->integer('jumlah_peserta');
            $table->text('deskripsi_rapat');
            $table->timestamps();
        });

        Schema::create('notulen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_notulen');
            $table->foreignId('meeting_id')->constrained('meetings')->onDelete('cascade');
            $table->string('size_notulen');
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamps(); // menambah created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
        Schema::dropIfExists('notulen');
    }
};
