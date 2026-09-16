<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The `bod.body` column was created as VARCHAR(255). Board-member bios pasted
 * from Word generate HTML well beyond 255 characters, causing MySQL to reject
 * the write (SQLSTATE[22001] "Data too long for column 'body'") and the edit
 * page to 500. Every comparable body field elsewhere uses TEXT; align this one.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bod', function (Blueprint $table) {
            $table->text('body')->change();
        });
    }

    public function down(): void
    {
        Schema::table('bod', function (Blueprint $table) {
            $table->string('body')->change();
        });
    }
};
