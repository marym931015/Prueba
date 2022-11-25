<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTeamTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('category_team', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('category_id');
      $table->unsignedBigInteger('team_id');
      $table->foreign('category_id')->references('id')->on('categories')->ondelete('cascade');
      $table->foreign('team_id')->references('id')->on('teams');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    if (Schema::hasTable('category_team')) {
      Schema::table('category_team', function (Blueprint $table) {
        $table->dropForeign('category_team_category_id_foreign');
        $table->dropForeign('category_team_team_id_foreign');
      });

      Schema::drop('category_team');
    }
  }
}
