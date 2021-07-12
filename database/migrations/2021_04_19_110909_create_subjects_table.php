<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
          //  $table->foreignId('grade_level_id')->constrained('grade_levels')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('name');
            $table->string('description');
            $table->bigInteger('grade_val');
            $table->bigInteger('is_imported');
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
        Schema::dropIfExists('subjects');
    }
}
