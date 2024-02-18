<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJokesTable extends Migration
{
    public function up()
    {
        Schema::create('jokes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('setup');
            $table->string('punchline');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jokes');
    }
}
