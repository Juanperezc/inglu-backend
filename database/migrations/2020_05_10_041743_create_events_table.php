<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('picture', 255)->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->dateTime('date');
            $table->integer('limit')->unsigned()->default(50);
            $table->string('type', 255);
            $table->string('location', 255);
            $table->bigInteger('doctor_id')->unsigned()->nullable()->index();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['enable', 'disabled'])->nullable()->default('enable');
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
        Schema::dropIfExists('events');
    }
}
