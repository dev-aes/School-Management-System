<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionAdviserAy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_adviser_ay', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adviser_id')->nullable()->constrained('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->constrained('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ay_id')->nullable()->constrained('academic_years')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('section_adviser_ay');
    }
}
