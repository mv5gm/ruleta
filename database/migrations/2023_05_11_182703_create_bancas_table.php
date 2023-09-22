<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('limite');
            $table->integer('capital');
            $table->integer('ilimitada');
            $table->unsignedBigInteger('user_id')->unique();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bancas', function (Blueprint $table) {
            $table->dropForeign('bancas_user_id_foreign');
        });

        Schema::dropIfExists('bancas');
    }
}
