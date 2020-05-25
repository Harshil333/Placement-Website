<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOurFieldsToEmployers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_no');
            $table->string('email');
            $table->string('bio');
            $table->string('linkedin');
            $table->string('facebook');
            //location
            //image
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            //
            Schema::dropIfExists('employers');
        });
    }
}
