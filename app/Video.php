<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
       public function getCourses(){

    	return $this->belongsToMany('App\Course');
    }

}
