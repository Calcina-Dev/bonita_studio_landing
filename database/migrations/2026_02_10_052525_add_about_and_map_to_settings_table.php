<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('about_title')->nullable()->after('primary_color');
            $table->text('about_description')->nullable()->after('about_title');
            $table->string('about_image')->nullable()->after('about_description');
            $table->text('map_embed_url')->nullable()->after('about_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
        //
        });
    }
};