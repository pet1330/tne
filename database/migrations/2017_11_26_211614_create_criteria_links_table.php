<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriaLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_links', function (Blueprint $table) {
            $table->integer('original_id')->unsigned()->index();
            $table->integer('linked_id')->unsigned()->index();
            $table->foreign('original_id')->references('id')->on('criterias');
            $table->foreign('linked_id')->references('id')->on('criterias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteria_links');
    }
}
