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
        Schema::table('promo_codes', function (Blueprint $table) {
            $table->dateTime('start_at')->nullable();
            $table->string('discount_code')->nullable();
            $table->tinyInteger('is_disposable')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promo_codes', function (Blueprint $table) {
            $table->dropColumn('start_at');
            $table->dropColumn('discount_code');
            $table->dropColumn('is_disposable');
        });
    }
};
