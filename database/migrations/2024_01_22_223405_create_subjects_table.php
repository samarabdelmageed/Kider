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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('teacherId')->constrained('teachers');
            $table->string('className');
            $table->tinyInteger('ageStart');
            $table->tinyInteger('ageEnd');
            $table->time('timeStart');
            $table->time('timeEnd');
            $table->tinyInteger('capacity');
            $table->tinyInteger('price');
            $table->boolean('published');
            $table->string('image',100);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
