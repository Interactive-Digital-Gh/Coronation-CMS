<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * `about_us.bod_body` was created as VARCHAR(255). It is now edited with the
 * rich text editor, whose HTML easily passes 255 characters, so widen it to
 * TEXT like the other body fields (see 2026_09_16_140000_change_bod_body_to_text).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->text('bod_body')->change();
        });
    }

    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('bod_body')->default('lorem')->change();
        });
    }
};
