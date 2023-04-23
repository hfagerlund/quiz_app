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
        Schema::create('hints', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->nullable();
            $table->text('hint');
            $table->timestamps();
            
            //set question_id as foreign key (ie. if question is deleted, its hints will also be deleted)
            $table->foreign('question_id')->references('id')->on('questions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hints');
    }
};
