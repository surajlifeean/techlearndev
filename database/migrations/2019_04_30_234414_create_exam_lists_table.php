<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('exam_categories_id')->unsigned();      
            $table->foreign('exam_categories_id')->references('id')->on('exam_categories')->onDelete('cascade');
            $table->string('description');   
            $table->enum('status', ['A', 'I']);
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
        Schema::dropIfExists('exam_lists');
    }
}
