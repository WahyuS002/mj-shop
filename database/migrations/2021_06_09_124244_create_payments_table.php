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
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->double('total', 10, 2);

            $table->timestamps();

            $table->index('order_id');
            $table->index('payment_method_id');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('NO ACTION')->onUpdate('NO ACTION');
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
