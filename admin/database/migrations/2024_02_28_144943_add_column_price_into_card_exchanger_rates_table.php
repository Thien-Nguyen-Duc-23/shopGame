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
        Schema::table('card_exchanger_rates', function (Blueprint $table) {
            $table->integer('price')->nullable()->comment('mệnh giá, ví dụ: 10K, 20K, 30K,...');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('card_exchanger_rates', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
};
