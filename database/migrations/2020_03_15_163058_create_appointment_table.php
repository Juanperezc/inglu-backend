<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('condition', 255)->nullable()->default(null);
            $table->integer('qualification')->unsigned()->nullable()->default(0);
            $table->text('comment')->nullable();
            $table->integer('status')->unsigned()->nullable()->default(1);
            $table->bigInteger('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('medical_staff_id')->unsigned()->index();
            $table->foreign('medical_staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user_workspace_id')->unsigned()->nullable()->default(null)->index();
            $table->foreign('user_workspace_id')->references('id')->on('user_workspace')->onDelete('cascade');
            $table->timestamps();
            /* $table->primary(['patient_id', 'medical_staff_id', 'workspace_id']); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_user');
    }
}
