<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('grade_level_id')->constrained('grade_levels')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('discount')->nullable();
            $table->float('total_fee');
            $table->bigInteger('months_no');
            $table->bigInteger('has_downpayment')->default(0);
            $table->float('downpayment')->default(0);
            $table->float('monthly_payment')->default(0);
            $table->date('date_started');
            $table->string('status')->default('active');
            $table->foreignId('academic_year_id')->constrained('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE student_fee AUTO_INCREMENT = 1000;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_fee');
    }
}
