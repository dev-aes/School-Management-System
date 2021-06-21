<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('birth_date');
            $table->string('gender');
            //$table->foreignId('grade_level_id')->constrained('grade_levels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nationality');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('address');
            $table->string('contact');
            $table->string('facebook');
            $table->string('email');
            $table->string('student_avatar');
            $table->string('guardian_name');
            $table->string('guardian_contact');
            $table->string('guardian_facebook');
            








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
        Schema::dropIfExists('students');
    }
}