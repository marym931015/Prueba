<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('publication_id');
            $table->foreign('team_id')->references('id')->on('teams')->ondelete('cascade');
            $table->foreign('publication_id')->references('id')->on('publications')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication_team');
    }
}
