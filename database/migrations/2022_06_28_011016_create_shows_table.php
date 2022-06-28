<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('ext_id');
            $table->string('title');
            $table->set('type', ['MOVIE', 'SHOW']);
            $table->text('description');
            $table->unsignedSmallInteger('release_year');
            $table->string('age_certification')->nullable();
            $table->unsignedSmallInteger('runtime');
            $table->string('genres');
            $table->string('production_countries');
            $table->unsignedTinyInteger('seasons')->nullable();
            $table->string('imdb_id')->nullable();
            $table->decimal('imdb_score', 2, 1, true)->nullable();
            $table->unsignedMediumInteger('imdb_votes')->nullable();
            $table->decimal('tmdb_popularity', 7, 3, true)->nullable();
            $table->decimal('tmdb_score', 2, 1, true)->nullable();
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
        Schema::dropIfExists('shows');
    }
};
