<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 190);
            $table->string('avatar_path');
            $table->string('facebook_link')->default('https://facebook.com');
            $table->string('twitter_link')->default('https://twitter.com');
            $table->string('instagram_link')->default('https://instagram.com');
            $table->string('youtube_link')->default('https://youtube.com');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
