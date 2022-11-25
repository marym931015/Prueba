<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserAddressColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('country_state_id')->nullable()->after('country_id');
            $table->unsignedBigInteger('company_country_state_id')->nullable()->after('company_country_id');
            $table->string('company_city', 45)->nullable();
            $table->string('company_zip_code', 10)->nullable();
            $table->foreign('country_state_id')->references('id')->on('country_states');
            $table->foreign('company_country_state_id')->references('id')->on('country_states');
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
