<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityIdToOrderShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_shipping_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->nullable()->after('order_id');
            
            $table->index('city_id');

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_shipping_addresses', function (Blueprint $table) {
            //
        });
    }
}
