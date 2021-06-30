<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_year_id')->nullable()->constrained('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('adviser_id')->nullable()->constrained('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('description_values_id')->nullable()->constrained('description_values')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('values_rates');
    }
}
