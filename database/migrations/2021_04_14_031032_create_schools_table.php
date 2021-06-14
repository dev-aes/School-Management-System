<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('depEd_no');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('address'); 
            $table->string('contact');
            $table->string('email');     
            $table->string('website');     
            $table->string('facebook');
            $table->string('school_logo');
            $table->bigInteger('months_no');
            $table->date('date_started');
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
        Schema::dropIfExists('schools');
    }   
}
