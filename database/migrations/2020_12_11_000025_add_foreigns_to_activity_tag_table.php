<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToActivityTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_tag', function (Blueprint $table) {
            $table
                ->foreign('activity_id')
                ->references('id')
                ->on('activities');
            $table
                ->foreign('tag_id')
                ->references('id')
                ->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_tag', function (Blueprint $table) {
            $table->dropForeign(['activity_id']);
            $table->dropForeign(['tag_id']);
        });
    }
}
