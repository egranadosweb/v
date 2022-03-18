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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string("cedula",20)->unique();
            $table->string("nombre",100);
            $table->string("apellido",100);
            $table->string("wp",20)->unique();
            $table->string("telefono",20)->unique()->nullable();
            $table->string("direccion",100);
            $table->string("email",100)->unique();
    
            //CLAVE FORANEA
            $table->unsignedBigInteger("office_id");
            $table->foreign('office_id')->references('id')->on('offices');

            //FECHAS
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
        Schema::dropIfExists('customers');
    }
};
