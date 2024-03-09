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
        if (!Schema::hasColumn('blog_categories', 'stt')) {
            Schema::table('blog_categories', function (Blueprint $table) {
                $table->integer('stt')->default(20);
            });
        }
        if (!Schema::hasColumn('blog_categories', 'hidden')) {
            Schema::table('blog_categories', function (Blueprint $table) {
                $table->boolean('hidden')->default(false);
            });
        }
        if (!Schema::hasColumn('blog_posts', 'stt')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->integer('stt')->default(20);
            });
        }
        if (!Schema::hasColumn('blog_posts', 'hidden')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->boolean('hidden')->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_categories', function (Blueprint $table) {
            //
        });
    }
};
