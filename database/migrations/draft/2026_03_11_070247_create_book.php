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
        Schema::create('book', function (Blueprint $table) {
            $table->string('isbn')->primary();
            $table->string('title')->nullable(false);
            $table->string('author')->nullable(false);
            $table->year('publish_year')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('cover')->nullable();
            $table->timestamps();
            $table->foreignId('category_id')->constrained('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
