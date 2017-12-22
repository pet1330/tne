<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleProgrammePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_programme', function (Blueprint $table) {
            $table->integer('module_id')->unsigned()->index();
            $table->foreign('module_id')->references('id')->on('modules');
            
            $table->integer('programme_id')->unsigned()->index();
            $table->foreign('programme_id')->references('id')->on('programmes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('module_programme');
    }
}
