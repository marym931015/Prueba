<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('cover_path')->nullable();
            $table->string('header', 100);
            $table->text('text')->nullable();
            $table->foreignId('user_id');
            // $table->foreignId('team_id');
            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('in_main_slider')->default(false);
            $table->boolean('in_group_slider')->default(false);
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
        Schema::dropIfExists('publications');
    }
}
