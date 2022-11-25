<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('category_product', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('category_id');
      $table->unsignedBigInteger('product_id');
      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');;
      $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    if (Schema::hasTable('category_product')) {
      Schema::table('category_product', function (Blueprint $table) {
        $table->dropForeign('category_product_category_id_foreign');
        $table->dropForeign('category_product_product_id_foreign');
      });

      Schema::drop('category_product');
    }
  }
}
