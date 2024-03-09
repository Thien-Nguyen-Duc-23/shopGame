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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('library_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('value')->nullable();
            $table->text('user_ids')->nullable();
            $table->text('product_group_ids')->nullable();
            $table->text('product_ids')->nullable();
            $table->bigInteger('order_max_value')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
