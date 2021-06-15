<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ay_id')->constrained('academic_years')->onDelete('cascade')->onUpdate('cascade');
            $table->string('grades')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
