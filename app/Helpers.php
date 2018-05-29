<?php

namespace App;
use App\CourseVideo;

class Helpers {
   public static function getvideos($course_id,$level)
    {
    	$vid=CourseVideo::SELECT('video_id')
    	->where([
    		['course_id','=',$course_id],
    		['level','=',$level]
    	])->get();
    	$videos=Video::whereIn('id',$vid)->get();
    	//dd($videos);
    	return $videos;
    }
}
?>