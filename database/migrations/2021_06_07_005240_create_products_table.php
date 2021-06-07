<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name');
            $table->string('slug');
            // $table->string('sku')->nullable();
            $table->tinyInteger('stock')->default(0);
            $table->double('price', 10, 2);
            $table->double('discount', 20, 2)->nullable();
            $table->mediumText('description')->nullable();
            $table->boolean('is_available')->default(TRUE);
            $table->timestamps();
            $table->softDeletes();

            $table->index('brand_id');

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
