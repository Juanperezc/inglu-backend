<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteHWorkItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_h_work_items', function (Blueprint $table) {
            $table->id();
            $table->string('img', 255)->nullable()->default(null);
            $table->string('title', 255)->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->bigInteger('site_h_work_id')->unsigned()->nullable()->index();
            $table->foreign('site_h_work_id')->references('id')->on('site_h_works')->onDelete('cascade');
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
        Schema::dropIfExists('site_h_work_items');
    }
}
