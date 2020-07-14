<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMedicalRecordColumnPathologies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('medical_records', function (Blueprint $table) {
            // change() tells the Schema builder that we are altering a table
            $table->json('pathologies')->nullable()->default(null)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_records', function (Blueprint $table) {
            // change() tells the Schema builder that we are altering a table
            $table->json('pathologies')->change();

        });
        //
    }
}
