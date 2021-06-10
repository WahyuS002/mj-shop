<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('paypal_payment_id');
            $table->string('paypal_cart_id');
            $table->double('rate', 10, 2);
            $table->double('idr_price', 10, 2);
            $table->double('usd_price', 10, 2);
            $table->string('state');

            $table->index('payment_id');

            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('CASCADE')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypal_payments');
    }
}
