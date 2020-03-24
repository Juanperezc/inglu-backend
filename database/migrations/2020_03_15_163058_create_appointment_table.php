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
            $table->date('date');
            $table->integer('qualification')->unsigned()->nullable()->default(0);
            $table->text('comment')->nullable();
            $table->integer('status')->unsigned()->nullable()->default(0);
            $table->bigInteger('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('medical_staff_id')->unsigned()->index();
            $table->foreign('medical_staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('workspace_id')->unsigned()->index();
            $table->foreign('workspace_id')->references('id')->on('workspaces')->onDelete('cascade');
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
