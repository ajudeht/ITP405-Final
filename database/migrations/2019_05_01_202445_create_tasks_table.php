<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->bigInteger('board_id');
            $table->string('title');
            $table->longText('description');
            $table->string('uuid');
            $table->integer('task_status');
            $table->bigInteger('parent_id')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
        //no
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
