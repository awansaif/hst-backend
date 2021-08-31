<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('editor_id')->constrained('editors')->onDelete('Cascade');
            $table->string('avatar_path');
            $table->text('about_me');
            $table->string('website_link');
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
        Schema::dropIfExists('editor_profiles');
    }
}
