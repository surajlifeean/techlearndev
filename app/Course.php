<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function reviews(){

    	return $this->hasMany('App\Review','review_on');
    }
        public function getVideos(){

    	return $this->hasMany('App\Video');
    }
}
