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
        Schema::table('sliders', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->integer('sort_number')->nullable();
            $table->boolean('is_preview')->nullable();
            $table->integer('position')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('description', 500)->nullable()->change();
            $table->dropColumn('sort_number');
            $table->dropColumn('is_preview');
            $table->dropColumn('position');
        });
    }
};
