<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('permissions', function (Blueprint $table) {
      $table->id();
      $table->string('uri', 45)->unique();
      $table->string('description');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    if (Schema::hasTable('permissions')) {
      Schema::table('permissions', function (Blueprint $table) {
        $table->dropUnique('permissions_uri_name');
      });

      Schema::drop('permissions');
    }
  }
}
