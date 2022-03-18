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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("license_type_id");
            $table->date("fecha_vencimiento");

            $table->foreign("customer_id")->references("id")->on("customers")->onDelete('cascade');
            $table->foreign("license_type_id")->references("id")->on("license_types");
    
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
        Schema::dropIfExists('licenses');
    }
};
