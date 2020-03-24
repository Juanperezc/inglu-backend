<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalkthroughsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walkthroughs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->string('description', 100)->nullable();
            $table->enum('type', ['web', 'mobile'])->nullable()->default('web');
            $table->json('roles');
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
        Schema::dropIfExists('walkthroughs');
    }
}
