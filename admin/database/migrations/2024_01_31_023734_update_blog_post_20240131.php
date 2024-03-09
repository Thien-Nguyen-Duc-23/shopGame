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
        if (!Schema::hasColumn('blog_posts', 'hidden')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->boolean('hidden')->default(0);
            });
        }
        if (!Schema::hasColumn('blog_posts', 'stt')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->bigInteger('stt')->default(20);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            //
        });
    }
};
