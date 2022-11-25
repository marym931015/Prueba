<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyColumnsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('company_name', 45)->nullable()->after('current_team_id');
      $table->string('company_address', 100)->nullable();
      $table->foreignId('company_country_id')->nullable();
      $table->string('company_email', 80)->nullable();
      $table->string('company_phone_number', 10)->nullable();
      $table->boolean('show_company')->default(true);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
  }
}
