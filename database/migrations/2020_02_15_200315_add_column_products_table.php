<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedTinyInteger('price')->after('content');
            $table->unsignedTinyInteger('currency_id')->after('price');
        });

        Schema::create('currencies',function (Blueprint $table){
           $table->increments('id');
           $table->string('name');
           $table->string('symbol');
           $table->unsignedTinyInteger('order')->default(0);
           $table->unsignedTinyInteger('status')->default(1);
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('currency_id');
        });

        Schema::dropIfExists('currencies');
    }
}
