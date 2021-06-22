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
            $table->foreignId('student_grade_id')->constrained('student_grade')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->string('grades')->default('0');
            $table->foreignId('subject_teacher_id')->constrained('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('quarter_id')->constrained('quarter')->onDelete('cascade')->onUpdate('cascade');
            
            
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
