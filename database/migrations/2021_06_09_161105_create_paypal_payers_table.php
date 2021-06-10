<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalPayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_payers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paypal_payment_id')->nullable();
            $table->string('payer_id');
            $table->string('method', 32);
            $table->string('status', 32);
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');

            $table->index('paypal_payment_id');

            $table->foreign('paypal_payment_id')->references('id')->on('paypal_payments')->onDelete('CASCADE')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypal_payers');
    }
}
