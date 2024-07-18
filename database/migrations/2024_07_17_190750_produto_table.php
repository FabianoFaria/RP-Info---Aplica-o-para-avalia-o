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
        //
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('valor', 10, 2)->nullable();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('categoria_id');
            $table->softDeletes();
            
            // Chaves estrangeiras
            $table->foreign('usuario_id')->references('id')->on('usuario');
            $table->foreign('categoria_id')->references('id')->on('categoria');

            // Índices
            $table->index('usuario_id');
            $table->index('categoria_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('produto');
    }
};
