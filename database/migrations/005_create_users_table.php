<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password');
            $table->string('name')->index();
            $table->string('email')->unique()->index();
            $table->enum('role', ['user','admin', 'callcenter'])->default('user');
            $table->rememberToken();

            /*
            $table->unsignedBigInteger("office_id");
            $table->unsignedBigInteger("role_id");
            $table->foreign("office_id")->references("id")->on("offices");
            $table->foreign("role_id")->references("id")->on("roles");*/

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
};
