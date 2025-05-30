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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->integer('sku')->unique(); // clave única
            $table->string('nombre'); // varchar
            $table->text('descripcion'); // texto largo
            $table->float('cantidad'); // puede usarse decimal si prefieres precisión
            $table->float('precio');
            $table->float('total');

            $table->timestamp('fecha_creacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
