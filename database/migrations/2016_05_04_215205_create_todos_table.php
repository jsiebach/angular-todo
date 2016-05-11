<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('todo_list_id');
            $table->string('task');
            $table->dateTime('due_date');
            $table->string('priority');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::table('todos',  function (Blueprint $table) {
//            $table->foreign('todo_list_id')
//                ->references('id')
//                ->on('todo_lists')
//                ->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('todos');
    }
}
