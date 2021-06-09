<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCancellationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cancellations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->comment('User ID yang membatalkan');
            $table->mediumText('reason');
            $table->timestamps();

            $table->index('order_id');
            $table->index('user_id');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_cancellations');
    }
}
