<?php

namespace App;
use App\CourseVideo;
use DB;
use App\User;

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

    public static function getChildren($uid)
    {

        $user=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side','parent_id')->where('parent_id','=',$uid)->get();
        return $user;
    }
}
?>