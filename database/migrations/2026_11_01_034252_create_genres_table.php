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
    // 1. Create the new lookup table
    Schema::create('genres', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    // 2. Drop the old text column
    Schema::table('games', function (Blueprint $table) {
        $table->dropColumn('genre');
    });

    // 3. Add the foreign key
    Schema::table('games', function (Blueprint $table) {
        $table->foreignId('genre_id')->constrained();
    });
}

public function down(): void
{
    Schema::table('games', function (Blueprint $table) {
        $table->dropForeign(['genre_id']);
        $table->dropColumn('genre_id');
        $table->string('genre')->nullable();
    });
    Schema::dropIfExists('genres');
}
};
