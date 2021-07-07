<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_fee_id')->constrained('student_fee')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('discounted_percentage')->default(0);
            $table->float('discounted_cash')->default(0);
            $table->float('discounted_amount');
            $table->float('amount');
            $table->string('remarks');
            $table->foreignId('payment_mode_id')->constrained('payment_modes')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('transaction_no');
            $table->bigInteger('official_receipt');
            $table->string('payment_type');
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
        Schema::dropIfExists('payments');
    }
}
