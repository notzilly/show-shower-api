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
        Schema::create('credits', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('title_id');
            $table->string('name');
            $table->string('character');
            $table->set('role', ['ACTOR', 'DIRECTOR']);
            $table->timestamps();

            $table->primary(['id', 'title_id']);
            $table->foreign('title_id')
                ->references('id')
                ->on('shows')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
};
