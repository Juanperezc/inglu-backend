<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_team_members', function (Blueprint $table) {
            $table->id();
            $table->string('img', 255)->nullable()->default(null);
            $table->string('name', 255)->nullable()->default(null);
            $table->string('role', 255)->nullable()->default(null);
            $table->bigInteger('site_team_id')->unsigned()->nullable()->index();
            $table->foreign('site_team_id')->references('id')->on('site_teams')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('site_team_members');
    }
}
