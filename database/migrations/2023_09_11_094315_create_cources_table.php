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
        Schema::create('cources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('rp')->default('70000');
            $table->boolean('status')->default(true);
            $table->string('img')->nullable();
            $table->unsignedBigInteger('category_cource_id');
            $table->timestamps();

            $table->foreign('category_cource_id')->references('id')->on('category_cources');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cources');
    }
    
};
