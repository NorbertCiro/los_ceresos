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
        Schema::create('movimientos_insumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cultivo_fase_id');
            $table->foreign("cultivo_fase_id")->references('id')->on('cultivo_fase')->cascadeOnDelete();
            $table->foreignId("insumo_id")->constrained();
            $table->integer("cantidad");
            $table->boolean("tipo");
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
        Schema::dropIfExists('movimientos_insumos');
    }
};
