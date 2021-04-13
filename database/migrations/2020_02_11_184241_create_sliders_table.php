<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::table('contact_forms',function (Blueprint $table){
           $table->addColumn('boolean','type')->after('id');
           $table->addColumn('boolean','status')->after('message')->nullable();
           $table->addColumn('text','log')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');

        Schema::table('contact_forms',function (Blueprint $table){
           $table->dropColumn('type');
           $table->dropColumn('status');
           $table->dropColumn('text');
        });
    }
}
