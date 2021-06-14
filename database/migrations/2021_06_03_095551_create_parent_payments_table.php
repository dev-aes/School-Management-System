<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('parents')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('official_receipt');
            $table->float('amount');
            $table->string('receipt_type');
            $table->string('screenshot');
            $table->string('remark');
            $table->timestamps();
            $table->string('status')->default("pending");
            $table->bigInteger('seen')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_payments');
    }
}
