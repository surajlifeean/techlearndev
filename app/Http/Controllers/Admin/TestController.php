<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\TestQuestion;
use App\ExamList;
use Session;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test=Test::paginate(10);


        $test = Test::join('exam_lists', 'exam_lists.id', '=', 'tests.exam_lists_id')
            ->select('tests.*', 'exam_lists.title as category')
            ->paginate();
            

        return view('Admin.test.index')->withTest($test);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  $examList=ExamList::where('status','A')->orderBy('title')->pluck('title', 'id');
        
        // return view('Admin.question.test')->withExamList($examList);
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
        
        // $ids="1,2,4";
        $ids=$_REQUEST['IDs'];
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
        $test->exam_lists_id=$exam_list_id;
        $test->question_count=count($ids);
        $test->save();
        // $test=new Test;
        // $test->title="Abc";
        // $test->description="desc";
        // $test->total_marks=10;
        // $test->duration=10;
        // $test->exam_lists_id=1;
        // $test->question_count=count($ids);
        // $test->save();

        foreach ($ids as $id) {
         $tq=new TestQuestion;
         $tq->test_id=$test->id;
         $tq->question_id=$id;
         $tq->save();
        }

        // foreach ($ids as $id) {
        //  $tq=new TestQuestion;
        //  $tq->test_id=$test->id;
        //  $tq->question_id=$id;
        //  $tq->save();
        // }

        Session::flash('success', 'Test Added successfully!');
        echo "done";
    }


        public function delete($id,Request $request)
    {   //dd($id);
        $question =Test::find($id);
        //dd($examCategory);
         if($question->delete()){
            $request->session()->flash('success', 'Test deleted successfully.');
            return redirect('/admin/test');
        } else {
            $request->session()->flash('error', 'item not deleted.');
            return redirect('/admin/test');
        }
    }

        
        public function statuschange($id,Request $request)
    {   //dd($id);
        $question = Test::find($id);
        //dd($customer);
        if($question->status == 'A'){
    //dd($customer->status);
            $question->status = 'I';
            if($question->save()){
                $request->session()->flash('success', 'Test deactivated successfully.');
                return redirect('/admin/test');
            }
        } else {
            $question->status = 'A';
            if($question->save()){
                $request->session()->flash('success', 'Test activated successfully.');
                return redirect('/admin/test');
            }
        }
    }




}
