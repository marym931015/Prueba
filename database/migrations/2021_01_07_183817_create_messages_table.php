<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('user_id')->nullable();
            $table->enum('type', ['text', 'raw', 'image', 'file']);
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->binary('raw')->nullable();
            $table->string('media_id')->nullable();
            $table->integer('size')->default(0);
            $table->string('name')->nullable();
            $table->string('thumbnail')->nullable();
            $table->float('thumbnail_width', 5, 2)->nullable();
            $table->float('thumbnail_height', 5, 2)->nullable();
            $table->float('width', 5, 2)->nullable();
            $table->float('height', 5, 2)->nullable();
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
        Schema::dropIfExists('messages');
    }
}
