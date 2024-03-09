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
        if (!Schema::hasColumn('products', 'email_order_id')) {
            Schema::table('products', function (Blueprint $table) {
                $table->bigInteger('email_order_id')->nullable();
            });
        }
        if (!Schema::hasColumn('products', 'email_finish_order_id')) {
            Schema::table('products', function (Blueprint $table) {
                $table->bigInteger('email_finish_order_id')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
