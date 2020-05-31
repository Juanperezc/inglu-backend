<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteImageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_image_items', function (Blueprint $table) {
            $table->id();
            $table->string('img', 255)->nullable()->default(null);
            $table->string('description', 255)->nullable()->default(null);
            $table->bigInteger('site_image_id')->unsigned()->nullable()->index();
            $table->foreign('site_image_id')->references('id')->on('site_images')->onDelete('cascade');
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
        Schema::dropIfExists('site_image_items');
    }
}
