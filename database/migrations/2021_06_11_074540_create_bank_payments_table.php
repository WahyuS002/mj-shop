<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('sender_name');
            $table->string('bank_name');
            $table->string('account_number');
            $table->double('transfer_amount', 10, 2);

            $table->index('bank_id');

            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('SET NULL')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_payments');
    }
}
