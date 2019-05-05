<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('question')->nullable();  
            $table->string('question_img')->nullable();
            $table->integer('question_types_id')->unsigned();      
            $table->foreign('question_types_id')->references('id')->on('question_types')->onDelete('cascade');
            $table->enum('status', ['A', 'I']);
            $table->enum('solution_type', ['single', 'multiple']);
            $table->mediumText('explanation')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
