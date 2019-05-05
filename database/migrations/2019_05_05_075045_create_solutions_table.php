<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('option')->nullable();  $table->integer('questions_id')->unsigned();      
            $table->foreign('questions_id')->references('id')->on('questions')->onDelete('cascade');
            $table->enum('correctness', ['Y', 'N']);
            // $table->enum('solution_type', ['single', 'multiple']);
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
        Schema::dropIfExists('solutions');
    }
}
