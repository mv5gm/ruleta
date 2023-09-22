<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apuestas', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto');
            $table->integer('ganador');
            $table->date('dia');
            $table->unsignedBigInteger('loteria_id');
            $table->unsignedBigInteger('sorteo_id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('animalito_id');

            $table->timestamps();

            $table->foreign('loteria_id')->references('id')->on('loterias')->onDelete("cascade");
            $table->foreign('sorteo_id')->references('id')->on('sorteos')->onDelete("cascade");
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete("cascade");
            $table->foreign('animalito_id')->references('id')->on('animalitos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('apuestas', function (Blueprint $table) {
            $table->dropForeign('apuestas_loteria_id_foreign');
        });
        
        Schema::table('apuestas', function (Blueprint $table) {
            $table->dropForeign('apuestas_sorteo_id_foreign');
        });

        Schema::table('apuestas', function (Blueprint $table) {
            $table->dropForeign('apuestas_ticket_id_foreign');
        });

        Schema::table('apuestas', function (Blueprint $table) {
            $table->dropForeign('apuestas_animalito_id_foreign');
        });
        
        Schema::dropIfExists('apuestas');
    }
}
