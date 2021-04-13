<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('mail_host')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_ssl')->nullable();
            $table->string('mail_type')->default('IMAP');
            $table->string('mail_port')->nullable();
            $table->text('maps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('mail_host');
            $table->dropColumn('mail_username');
            $table->dropColumn('mail_password');
            $table->dropColumn('mail_ssl');
            $table->dropColumn('mail_type');
            $table->dropColumn('mail_port');
            $table->dropColumn('maps');
        });
    }
}
