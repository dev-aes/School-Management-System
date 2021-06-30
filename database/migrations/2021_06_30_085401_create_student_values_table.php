<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_year_id')->nullable()->constrained('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('adviser_id')->nullable()->constrained('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('description_id')->nullable()->constrained('descriptions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('q1')->default(' ');
            $table->string('q2')->default(' ');
            $table->string('q3')->default(' ');
            $table->string('q4')->default(' ');
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
        Schema::dropIfExists('student_values');
    }
}
