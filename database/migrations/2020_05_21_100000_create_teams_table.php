<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('teams', function (Blueprint $table) {
      $table->id();
      $table->string('photo_path')->nullable();
      $table->foreignId('user_id')->index();
      $table->string('name', 80);
      $table->string('description')->nullable();
      $table->boolean('personal_team');
      $table->boolean('publication_team')->default(false);
      $table->integer('limit')->default(0);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('teams');
  }
}
