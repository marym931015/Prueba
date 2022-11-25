<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('first_name', 45);
      $table->string('last_name', 45);
      $table->string('email', 80)->unique();
      $table->boolean('show_email')->default(true);
      $table->timestamp('email_verified_at')->nullable();
      $table->string('phone_number', 10);
      $table->boolean('show_phone_number')->default(true);
      $table->timestamp('phone_number_verified_at')->nullable();
      $table->string('fcm_token')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->foreignId('current_team_id')->nullable();
      $table->text('profile_photo_path')->nullable();
      $table->foreignId('general_category_id')->nullable();
      $table->boolean('edited_general_category')->default(false);
      $table->foreignId('current_category_id')->nullable();
      $table->boolean('edited_current_category')->default(false);
      $table->foreignId('primary_comercial_role_id')->nullable();
      $table->foreignId('secondary_comercial_role_id')->nullable();
      $table->timestamp('last_activity_at')->nullable();
      $table->boolean('active')->default(true);
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
    Schema::dropIfExists('users');
  }
}
