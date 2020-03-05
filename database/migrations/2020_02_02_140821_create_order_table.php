<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('order_product_name');
            $table->bigInteger('order_product_id');
            $table->bigInteger('order_product_cost');
            $table->bigInteger('order_product_quantity');
            $table->bigInteger('order_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
