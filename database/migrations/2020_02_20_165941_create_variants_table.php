<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('thick_id');
            $table->unsignedInteger('stock');
            $table->decimal('price',10,2);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::table('order_items',function (Blueprint $table){
            $table->unsignedInteger('product_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');

        Schema::table('order_items',function (Blueprint $table){
           $table->dropColumn('product_id');
        });
    }
}
