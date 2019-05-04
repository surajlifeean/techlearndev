<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExamCategory;
use App\ExamList;
use Session;


class ExamListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $examList=ExamList::paginate(10);

        $examList = ExamList::join('exam_categories', 'exam_categories.id', '=', 'exam_lists.exam_categories_id')
            ->select('exam_lists.*', 'exam_categories.title as category')
            ->paginate();

       // dd($examList);

        return view('Admin.examList.index')->withExamList($examList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examCategory=ExamCategory::where('status','A')->orderBy('title')->pluck('title', 'id');

        return view('Admin.examList.create')->withExamCategory($examCategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $examlist=new ExamList;
        $examlist->title=$request['title'];
        $examlist->exam_categories_id=$request['exam_categories_id'];
        $examlist->description=$request['description'];
        $examlist->status=$request['status'];
        $examlist->save();        

        session::flash('success', 'The Exam category Has Been Added Successfully!');
         return redirect()->route('exam-list.index');

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
        $examCategory=ExamList::find($id);
        $category=ExamCategory::where('status','A')->orderBy('title')->pluck('title', 'id');
        return view('Admin.examList.edit')->withExamCategory($examCategory)->withCategory($category);
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
        $examCategory=ExamList::find($id);
        $examCategory->title=$request['title'];
        $examCategory->exam_categories_id=$request['exam_categories_id'];
        $examCategory->description=$request['description'];
        $examCategory->status=$request['status'];
        $examCategory->save();        

        session::flash('success', 'The Exam List Has Been updated Successfully!');
         return redirect()->route('exam-list.index');
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
    {   
        $examCategory =ExamList::find($id);
        //dd($customer);
        if($examCategory->status == 'A'){
    //dd($customer->status);
            $examCategory->status = 'I';
            if($examCategory->save()){
                $request->session()->flash('success', 'Item deactivated successfully.');
                return redirect('/admin/exam-list');
            }
        } else {
            $examCategory->status = 'A';
            if($examCategory->save()){
                $request->session()->flash('success', 'Item activated successfully.');
                return redirect('/admin/exam-list');
            }
        }
    }

    public function delete($id,Request $request)
    {   //dd($id);
        $examCategory =ExamList::find($id);
        //dd($examCategory);
         if($examCategory->delete()){
            $request->session()->flash('success', 'Item deletded successfully.');
            return redirect('/admin/exam-list');
        } else {
            $request->session()->flash('error', 'item not deletded.');
            return redirect('/admin/exam-list');
        }
    }
}
