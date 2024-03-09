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
        Schema::create('card_exchanger_rates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('card_exchanger_id')->nullable();
            $table->integer('rate')->nullable();
            $table->string('card_provider')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_exchanger_rates');
    }
};
