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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("insumo_id")->constrained();
            $table->string("insumo_nombre");
            $table->date("fecha");
            $table->integer("cantidad");
            $table->float("insumo_precio");
            $table->string("precio");
            $table->string("tipo");
            $table->foreignId("user_id")->constrained();
            $table->string("observacion");
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
        Schema::dropIfExists('movimientos');
    }
};
