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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('link')->unique();
            $table->text('content')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedTinyInteger('width')->nullable();
            $table->unsignedTinyInteger('height')->nullable();
            $table->string('thick')->nullable();
            $table->unsignedTinyInteger('stock');
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
        Schema::dropIfExists('products');
    }
}
