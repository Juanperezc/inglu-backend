<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClaimUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('text')->nullable();
            $table->integer('status')->unsigned()->nullable()->default(0);
            $table->bigInteger('claim_id')->unsigned()->index();
            $table->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim_user');
    }
}
