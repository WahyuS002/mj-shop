<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinceToOrderShippingCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_shipping_couriers', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id')->nullable()->after('courier_id');
            $table->unsignedBigInteger('city_id')->nullable()->after('province_id');

            $table->index('province_id');
            $table->index('city_id');

            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('SET NULL')->onUpdate('NO ACTION');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('SET NULL')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_shipping_couriers', function (Blueprint $table) {
            //
        });
    }
}
