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
        Schema::create('costo_adicionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultivo_fase_id');
            // $table->foreign("cultivo_fase_id")->references('id')->on('cultivo_fase')->cascadeOnDelete();
            //Se cambia la funcion foreignId por unsingedByig... para la eliminacion en cascada ... Norberto Salazar Brito
            //Se agrega el cascadeOnDelete para eliminar el cultivo y automaticamente tambien elmine la fase
            $table->date('fecha');
            $table->longText("descripcion");
            $table->integer("precio");
            $table->foreignId("user_id")->constrained();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costo_adicionals');
    }
};
