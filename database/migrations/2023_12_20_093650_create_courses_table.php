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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_type');
            $table->bigInteger('tutor_id')->nullable();
            $table->bigInteger('students_enrolled')->nullable();
            $table->string('course_image')->nullable();
            $table->timestamps();
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
