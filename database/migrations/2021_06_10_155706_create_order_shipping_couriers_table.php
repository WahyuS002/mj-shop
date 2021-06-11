<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderShippingCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shipping_couriers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courier_id')->nullable();
            $table->string('service');
            $table->double('cost', 10, 2);
            $table->string('estimation_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_shipping_couriers');
    }
}
