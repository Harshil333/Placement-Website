<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsOfJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('jobs', function (Blueprint $table) {
            //
            $table->dropColumn('company_id');
            $table->dropColumn('category_id');
            $table->string('company_name');
            $table->string('category_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('jobs', function (Blueprint $table) {
            //
            $table->dropColumn('company_name');
            $table->dropColumn('category_name');
        });
    }
}
