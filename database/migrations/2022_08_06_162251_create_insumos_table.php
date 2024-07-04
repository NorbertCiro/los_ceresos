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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->string("codigo");
            $table->string("nombre");
            $table->string("unidad");
            $table->double("cantidad")->default(0);
            $table->integer("precio");
            $table->enum("tipo", ["Fungicidas",
            "Insecticidas", "Herbicidas",
            "Fertilizantes"]);
            $table->date("fecha_vencimiento");
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
        Schema::dropIfExists('insumos');
    }
};
