<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAlumnusOccupationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnus_occupation', function (Blueprint $table) {
            $table
                ->foreign('occupation_id')
                ->references('id')
                ->on('occupations');
            $table
                ->foreign('alumnus_id')
                ->references('id')
                ->on('alumni');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnus_occupation', function (Blueprint $table) {
            $table->dropForeign(['occupation_id']);
            $table->dropForeign(['alumnus_id']);
        });
    }
}
