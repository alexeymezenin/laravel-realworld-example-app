<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();

            $table->index(['username']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
