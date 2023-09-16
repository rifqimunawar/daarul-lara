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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('wa');
        $table->string('alamat');
        $table->unsignedBigInteger('category_cource_id')->nullable();
        $table->unsignedBigInteger('cource_id')->nullable();
        $table->unsignedBigInteger('cara_id')->nullable();
        $table->unsignedBigInteger('durasi_id')->nullable();
        $table->unsignedBigInteger('paket_id')->nullable();
        $table->unsignedBigInteger('peserta_id')->nullable();
        $table->unsignedBigInteger('teacher_id')->nullable();
        $table->string('harga')->nullable();
        $table->boolean('status')->default(false);
        $table->timestamps();

        // Menambahkan constraint foreign key
        $table->foreign('category_cource_id')->references('id')->on('category_cources');
        $table->foreign('cource_id')->references('id')->on('cources');
        $table->foreign('cara_id')->references('id')->on('harga_caras');
        $table->foreign('durasi_id')->references('id')->on('harga_durasis');
        $table->foreign('paket_id')->references('id')->on('harga_pakets');
        $table->foreign('peserta_id')->references('id')->on('harga_pesertas');
        $table->foreign('teacher_id')->references('id')->on('teachers');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
