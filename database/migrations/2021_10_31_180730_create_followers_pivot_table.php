<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowersPivotTable extends Migration
{
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('following_id')->constrained('users')->onDelete('cascade');

            $table->index(['follower_id', 'following_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
