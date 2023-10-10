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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img')->default('user.png');
            $table->string('bio')->nullable();
            $table->string('rp')->default('50000');
            $table->unsignedBigInteger('cource_id');
            $table->timestamps();

            $table->foreign('cource_id')->references('id')->on('cources');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
