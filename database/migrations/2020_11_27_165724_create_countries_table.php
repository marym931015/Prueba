<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('countries', function (Blueprint $table) {
      $table->id();
      $table->char('iso_code', 2)->unique();
      $table->string('name', 45)->unique();
      $table->string('phone_code', 4)->unique();
      $table->boolean('active')->default(true);
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
    if (Schema::hasTable('countries')) {
      Schema::table('countries', function (Blueprint $table) {
        $table->dropUnique('countries_iso_code_unique');
        $table->dropUnique('countries_name_unique');
        $table->dropUnique('countries_phone_code_unique');
      });

      Schema::drop('countries');
    }
  }
}
