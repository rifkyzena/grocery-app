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
            $table->id('account_id');
            $table->unsignedBigInteger('role_id')->default(2);
            $table->unsignedBigInteger('gender_id');
            $table->string('first_name', 10);
            $table->string('last_name', 10);
            $table->string('email', 100);
            $table->string('display_picture_link', 100);
            $table->string('password');
            $table->rememberToken();
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
            $table->foreign('gender_id')->references('gender_id')->on('genders')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
