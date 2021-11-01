<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Article;
use App\Models\Tag;

class CreateArticleTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->foreignIdFor(Article::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Tag::class)->constrained()->onDelete('cascade');

            $table->index(['article_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_tag_pivot');
    }
}
