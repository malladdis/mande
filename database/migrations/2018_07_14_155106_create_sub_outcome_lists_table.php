<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubOutcomeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_outcome_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('outcome_list_id')->unsigned();
            $table->foreign('outcome_list_id')->references('id')->on('outcome_lists');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_outcome_lists');
    }
}
