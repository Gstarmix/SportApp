<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suscription_tarifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarif_id')->constrained();
            $table->foreignId('suscription_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscriptions_tarifs');
    }
};
