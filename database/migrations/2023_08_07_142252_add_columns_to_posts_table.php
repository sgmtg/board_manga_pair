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
        Schema::table('posts', function (Blueprint $table) {
            $table->char('sex', 1);
            $table->string('age', 2);
            $table->string('genre')->nullable();
            $table->string('favorite')->nullable();
            $table->string('image')->nullable();
            $table->string('twitter')->nullable();
            $table->string('url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('sex');
            $table->dropColumn('age');
            $table->dropColumn('genre');
            $table->dropColumn('favorite');
            $table->dropColumn('image');
            $table->dropColumn('twitter');    
            $table->dropColumn('url');    
        });
    }
};
