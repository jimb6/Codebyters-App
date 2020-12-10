<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('officials', function (Blueprint $table) {
            $table
                ->foreign('position_id')
                ->references('id')
                ->on('positions');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('officials', function (Blueprint $table) {
            $table->dropForeign(['position_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
