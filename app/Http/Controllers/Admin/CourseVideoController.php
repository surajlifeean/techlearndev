<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\Course;
use App\CourseVideo;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $course=Course::find($id);
        $video=Video::where('status','=','A')->pluck('title','id');
       // dd($video);
                return view('Admin.course.addVideo')->withVideos($video)->withCourse($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic=$request['topic'];
        $level=$request['level'];
        $video_id=$request['video_id'];
        $description=$request['description'];
        $course_id=$request['course_id'];

        
            //dd($request);
        foreach ($topic as $key => $value) {
            # code...
            $video_ids=$video_id[$key];
            foreach ($video_ids as $k => $v) {
                $course_video=new CourseVideo;
                $course_video->topic_name=$value;
                $course_video->description=$description[$key];
                $course_video->level=$level[$key];
                $course_video->course_id=$course_id;
                $course_video->video_id=$v;
                $course_video->save();
                                    
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
