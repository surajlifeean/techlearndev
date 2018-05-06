<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level');
            $table->integer('video_id');
            $table->integer('course_id');  
            $table->string('description');   
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade'); 
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
        Schema::dropIfExists('course_videos');
    }
}
