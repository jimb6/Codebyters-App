<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToActivityUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_user', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('activity_id')
                ->references('id')
                ->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['activity_id']);
        });
    }
}
