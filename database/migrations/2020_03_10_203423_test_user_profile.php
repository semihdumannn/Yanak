<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TestUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function (Blueprint $t){
           $t->unsignedInteger('profile_id');
        });

        Schema::create('profiles',function (Blueprint $table){
           $table->increments('id');
           $table->json('bio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
        Schema::table('users',function (Blueprint $table){
           $table->dropIfExists('profile_id');
        });
    }
}
