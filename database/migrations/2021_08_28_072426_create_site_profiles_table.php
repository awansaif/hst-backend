<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_profiles', function (Blueprint $table) {
            $table->id();
            $table->string("name", 120);
            $table->string("city", 120);
            $table->string("state", 120);
            $table->string("country", 120);
            $table->string("address", 120);
            $table->string("facebook_link");
            $table->string("twitter_link");
            $table->string("instagram_link");
            $table->string("pinterest_link");
            $table->string("messenger_link");
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
        Schema::dropIfExists('site_profiles');
    }
}
