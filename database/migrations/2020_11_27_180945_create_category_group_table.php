<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryGroupTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('category_group', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('group_id');
      $table->unsignedBigInteger('category_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    if (Schema::hasTable('category_group')) {
      Schema::table('category_group', function (Blueprint $table) {
        $table->dropForeign('category_group_group_id_foreign');
        $table->dropForeign('category_group_category_id_foreign');
      });

      Schema::drop('category_group');
    }
  }
}
