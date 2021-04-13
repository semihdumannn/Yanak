<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('products', function (Blueprint $table) {
//            $table->dropColumn('color_id');
//            $table->dropColumn('thick');
//            $table->dropColumn('stock');
//            $table->dropColumn('currency_id');
//            $table->dropColumn('price');
//        });

        Schema::table('thicks',function (Blueprint $blueprint){
           $blueprint->unsignedTinyInteger('status')->default(1)->after('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('products', function (Blueprint $table) {
//            $table->unsignedInteger('color_id')->nullable();
//            $table->string('thick')->nullable();
//            $table->unsignedTinyInteger('stock');
//            $table->unsignedInteger('currency_id')->nullable();
//            $table->unsignedTinyInteger('price');
//        });

        Schema::table('thicks',function (Blueprint $blueprint){
            $blueprint->dropColumn('status');
        });
    }
}
