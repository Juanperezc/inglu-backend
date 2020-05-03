<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorkspaceTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_workspace_times', function (Blueprint $table) {
            $table->id();
            $table->string('start_time', 255)->nullable()->default(null);
            $table->string('end_time', 255)->nullable()->default(null);
            $table->string('day', 255)->nullable()->default(null);
            $table->bigInteger('user_workspace_id')->unsigned()->index();
            $table->foreign('user_workspace_id')->references('id')->on('user_workspace')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_workspace_times');
    }
}
