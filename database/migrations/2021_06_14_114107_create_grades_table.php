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
            $table->foreignId('student_grade_id')->nullable()->constrained('student_grade')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('subject_id')->nullable()->constrained('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subject_teacher_id')->nullable()->constrained('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('quarter_1')->nullable();
            $table->bigInteger('quarter_2')->nullable();
            $table->bigInteger('quarter_3')->nullable();
            $table->bigInteger('quarter_4')->nullable();
            $table->bigInteger('grade_level_val')->nullable();
            $table->string('is_approve')->default(0,0,0,0);
            
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
