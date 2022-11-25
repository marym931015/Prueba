<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('groups', function (Blueprint $table) {
      $table->id();
      $table->string('name', 80)->unique();
      $table->boolean('active')->default(true);
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
    if (Schema::hasTable('groups')) {
      Schema::table('groups', function (Blueprint $table) {
        $table->dropUnique('groups_name_unique');
      });

      Schema::drop('categories');
    }
  }
}
