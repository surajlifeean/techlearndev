<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\TestQuestion;

class TestController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function addQuestionToTest()
    {
        
        $ids=$_REQUEST['IDs'];
       //echo $ids;
        $ids=explode(',',$ids);
        $title=$_REQUEST['title'];
        $description=$_REQUEST['description'];
        $marks=$_REQUEST['marks'];
        $duration=$_REQUEST['duration'];
        $exam_list_id=$_REQUEST['exam_list_id'];


        $test=new Test;
        $test->title=$title;
        $test->description=$description;
        $test->total_marks=$marks;
        $test->duration=$duration;
        $test->exam_list_id=$exam_list_id;
        $test->question_count=count($ids);
        $test->save();

        foreach ($ids as $id) {
         $tq=new TestQuestion;
         $tq->test_id=$test->id;
         $tq->question_id=$id;
         $tq->save();
        }

        Session::flash('success', 'Test Added successfully!');
        echo "done";
    }

}
