<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payer_group_id')->unsigned()->index();
            $table->integer('task_type_id')->unsigned()->index();
            $table->date('date_from');
            $table->date('date_to');
            $table->timestamps();

            $table->foreign('payer_group_id')->references('id')->on('payer_groups')->onDelete('cascade');
            $table->foreign('task_type_id')->references('id')->on('task_types')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }

}
