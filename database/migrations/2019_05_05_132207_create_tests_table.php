<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->String('title');
            $table->String('description');
            $table->integer('total_marks');
            $table->integer('duration');  
            $table->integer('exam_lists_id')->unsigned();
            $table->integer('question_count')->unsigned(); 
            $table->foreign('exam_lists_id')->references('id')->on('exam_lists')->onDelete('cascade');
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
        Schema::dropIfExists('tests');
    }
}
