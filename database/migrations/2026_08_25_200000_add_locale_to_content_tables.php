<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_contents', function (Blueprint $table) {
            $table->string('locale', 5)->default('fa')->after('section');
        });

        Schema::table('content_items', function (Blueprint $table) {
            $table->string('locale', 5)->default('fa')->after('section');
        });

        // Rebuild unique index with locale for MySQL
        Schema::table('site_contents', function (Blueprint $table) {
            $table->dropUnique(['section', 'field_key']);
            $table->unique(['section', 'field_key', 'locale']);
            $table->index(['section', 'locale']);
        });

        Schema::table('content_items', function (Blueprint $table) {
            $table->index(['section', 'locale', 'sort_order']);
        });

        DB::table('site_contents')->whereNull('locale')->orWhere('locale', '')->update(['locale' => 'fa']);
        DB::table('content_items')->whereNull('locale')->orWhere('locale', '')->update(['locale' => 'fa']);
    }

    public function down(): void
    {
        Schema::table('site_contents', function (Blueprint $table) {
            $table->dropUnique(['section', 'field_key', 'locale']);
            $table->dropIndex(['section', 'locale']);
            $table->dropColumn('locale');
            $table->unique(['section', 'field_key']);
        });

        Schema::table('content_items', function (Blueprint $table) {
            $table->dropIndex(['section', 'locale', 'sort_order']);
            $table->dropColumn('locale');
        });
    }
};
