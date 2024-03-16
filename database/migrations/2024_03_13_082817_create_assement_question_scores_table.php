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
        Schema::create('assement_question_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedBigInteger('assesment_id')->constrained('assesments')->cascadeOnDelete();
            $table->unsignedBigInteger('courses_id')->constrained('courses')->cascadeOnDelete();
            $table->boolean('correct')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assement_question_scores');
    }
};
