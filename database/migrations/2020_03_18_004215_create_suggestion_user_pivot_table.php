<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuggestionUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestion_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('text')->nullable();
            $table->integer('status')->unsigned()->nullable()->default(0);
            $table->bigInteger('suggestion_id')->unsigned()->index();
            $table->foreign('suggestion_id')->references('id')->on('suggestions')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         /*    $table->primary(['suggestion_id', 'user_id']); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suggestion_user');
    }
}
