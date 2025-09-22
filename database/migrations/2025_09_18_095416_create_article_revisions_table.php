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
        Schema::create('article_revisions', function (Blueprint $table) {
            $table->id();


            $table->foreignId('article_id')
                ->constrained('articles')
                ->cascadeOnDelete();


            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();


            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->longText('body')->nullable();

            
            $table->json('meta')->nullable();

            $table->timestamps();

            $table->index(['article_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_revisions');
    }
};
