<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStateToUsersEmploymentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users_employment_info')) {
            Schema::table('users_employment_info', function (Blueprint $table) {
                $table->integer('state_id')->unsigned();
                $table->foreign('state_id')->references('idstates')->on('states');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_employment_info', function (Blueprint $table) {
            //
        });
    }
}
