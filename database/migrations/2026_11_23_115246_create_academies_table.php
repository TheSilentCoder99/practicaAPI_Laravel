<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            // La descripción de qué hace la academia o al menos de qué trata no puede faltar, pienso que es un dato básico.
            $table->text('description');
            $table->string('address');
            $table->string('phone', 20);
            // el email de la academia no se puede repetir. Creo que, en algo real, aunque fuese una academia de cadena, tendrían un identificativo diferente en el email, como InglesAlmeria@algo.com | InglesMalaga@algo.com
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academies');
    }
};
