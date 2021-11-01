<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Article;
use App\Models\User;

class CreateArticleUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('article_user', function (Blueprint $table) {
            $table->foreignIdFor(Article::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');

            $table->index(['article_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_user_pivot');
    }
}
