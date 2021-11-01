<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->text('body');
            $table->timestamps();

            $table->index(['slug']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
