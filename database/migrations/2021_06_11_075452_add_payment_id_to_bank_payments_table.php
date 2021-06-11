<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentIdToBankPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->nullable()->after('id');

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
        Schema::table('bank_payments', function (Blueprint $table) {
            //
        });
    }
}
