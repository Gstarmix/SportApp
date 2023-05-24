<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuscriptionTarifTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('suscription_tarif', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tarif_id');
            $table->unsignedBigInteger('suscription_id');
            $table->foreign('tarif_id')->references('id')->on('tarifs')->onDelete('cascade');
            $table->foreign('suscription_id')->references('id')->on('suscriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('suscription_tarif');
    }
}