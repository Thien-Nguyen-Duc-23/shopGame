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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('unit_price')->nullable();
            $table->bigInteger('total')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('discouted')->nullable();
            $table->integer('partner_rate')->nullable();
            $table->dateTime('received_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->bigInteger('processor_id')->nullable();
            $table->bigInteger('library_id')->nullable();
            $table->string('buyer_note')->nullable();
            $table->string('admin_note')->nullable();
            $table->string('banking_code')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
