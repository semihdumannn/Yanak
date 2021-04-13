<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('address');
            $table->double('totalPrice');
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::create('order_items',function (Blueprint $table){
           $table->increments('id');
           $table->unsignedInteger('order_id');
           $table->unsignedInteger('color_id');
           $table->string('thick');
           $table->string('quantity');
           $table->double('price');
           $table->timestamps();
        });

        Schema::create('order_products',function (Blueprint $table){
           $table->increments('id');
           $table->unsignedInteger('order_id');
           $table->unsignedInteger('product_id');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
    }
}
