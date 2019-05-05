<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuestionType;
use App\Question;
use App\Solution;
use Session;
use App\ExamList;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $examList=ExamList::where('status','A')->orderBy('title')->pluck('title', 'id');
        

         $question = Question::join('question_types', 'question_types.id', '=', 'questions.question_types_id')
            ->select('questions.*', 'question_types.title as question_type')->orderBy('question_types.title')
            ->paginate(10);

        // dd($question);

        return view('Admin.question.index')->withQuestion($question)->withExamList($examList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
               $qtype=QuestionType::where('status','A')->orderBy('title')->pluck('title', 'id');

                return view('Admin.question.create')->withQtype($qtype);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question=new Question;
        $question->question=$request['question'];
        $question->question_types_id=$request['question_types_id'];
        $question->status=$request['status'];
        $question->solution_type=$request['solution_type'];
        $question->explanation=$request['explanation'];
        $question->save();        
foreach ($request['Option'] as $key => $value) {
    
        $solution=new Solution;
        $solution->option=$value;
        $solution->questions_id=$question->id;

        if($request['solution']==$key)
        $solution->correctness='Y';
        else
        $solution->correctness='N';
        
        $solution->save();
}

        session::flash('success', 'The Question Has Been Added Successfully!');
         return redirect()->route('question.index');

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
     public function statuschange($id,Request $request)
    {   //dd($id);
        $question =Question::find($id);
        //dd($customer);
        if($question->status == 'A'){
    //dd($customer->status);
            $question->status = 'I';
            if($question->save()){
                $request->session()->flash('success', 'Question deactivated successfully.');
                return redirect('/admin/question');
            }
        } else {
            $question->status = 'A';
            if($question->save()){
                $request->session()->flash('success', 'Question activated successfully.');
                return redirect('/admin/question');
            }
        }
    }

    public function delete($id,Request $request)
    {   //dd($id);
        $question =Question::find($id);
        //dd($examCategory);
         if($question->delete()){
            $request->session()->flash('success', 'Question deleted successfully.');
            return redirect('/admin/question');
        } else {
            $request->session()->flash('error', 'item not deleted.');
            return redirect('/admin/question');
        }
    }



}
