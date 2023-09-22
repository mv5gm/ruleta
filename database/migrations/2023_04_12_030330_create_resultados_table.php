<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->date('dia');
            $table->unsignedBigInteger('animalito_id');
            $table->unsignedBigInteger('loteria_id');
            $table->unsignedBigInteger('sorteo_id');
            $table->unique(['animalito_id','loteria_id','sorteo_id']);
            $table->timestamps();

            $table->foreign('animalito_id')->references('id')->on('animalitos')->onDelete("cascade");
            $table->foreign('loteria_id')->references('id')->on('loterias')->onDelete("cascade");
            $table->foreign('sorteo_id')->references('id')->on('sorteos')->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resultados', function (Blueprint $table) {
            $table->dropForeign('resultados_animalito_id_foreign');
        });
        Schema::table('resultados', function (Blueprint $table) {
            $table->dropForeign('resultados_loteria_id_foreign');
        });
        Schema::table('resultados', function (Blueprint $table) {
            $table->dropForeign('resultados_sorteo_id_foreign');
        });
        Schema::dropIfExists('resultados');
    }
}
