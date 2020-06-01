<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPdfsToCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            //
            $table->string('qualification')->nullable();
            $table->string('qual_pdf')->nullable();
            $table->string('work_experience')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            //
            $table-dropColumn('qualification');
            $table->dropColumn('qual_pdf');
            $table->dropColumn('work_experience');
        });
    }
}
