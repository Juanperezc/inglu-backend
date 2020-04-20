<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_card')->unique();
            $table->string('name');
            $table->string('profile_pic')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password')->nullable()->default(null);
            $table->date('date_of_birth');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable()->default('male');
            $table->enum('type', ['patient', 'doctor', 'lead'])->default('patient');
            $table->integer('status')->unsigned()->nullable()->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
