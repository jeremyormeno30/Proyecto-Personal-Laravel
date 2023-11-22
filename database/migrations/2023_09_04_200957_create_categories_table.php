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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
    /**
     * LAS CATEGORIAS HASTA EL MOMENTO DEBEN SER
     * abarrotes
     * lacteos
     * congelados
     * panaderia y pasteleria
     * frutas y verduras
     * mascotas
     * bebidas y licores
     * fiambreria
     * higiene personal
     * aseo
     */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
