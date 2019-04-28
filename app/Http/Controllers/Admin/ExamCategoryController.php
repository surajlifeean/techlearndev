<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\ExamCategory;
use Session;


class ExamCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("category-list");
                $examCategory=ExamCategory::paginate(10);
        
        // dd(property_exists($course,'title'));
        //dd($course);
        return view('Admin.exam.index')->withCourses($examCategory);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                return view('Admin.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $examCategory=new ExamCategory;
        $examCategory->title=$request['title'];
        $examCategory->description=$request['description'];
        $examCategory->status=$request['status'];
        $examCategory->save();        

        session::flash('success', 'The Exam category Has Been Added Successfully!');
         return redirect()->route('exam-category.index');


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
        $examCategory =ExamCategory::find($id);
        //dd($customer);
        if($examCategory->status == 'A'){
    //dd($customer->status);
            $examCategory->status = 'I';
            if($examCategory->save()){
                $request->session()->flash('success', 'course deactivated successfully.');
                return redirect('/admin/exam-category');
            }
        } else {
            $examCategory->status = 'A';
            if($examCategory->save()){
                $request->session()->flash('success', 'course activated successfully.');
                return redirect('/admin/exam-category');
            }
        }
    }

    public function delete($id,Request $request)
    {   //dd($id);
        $examCategory =ExamCategory::find($id);
        //dd($customer);
         if(ExamCategory::find($id)->delete()){
            $request->session()->flash('success', 'Category deletded successfully.');
            return redirect('/admin/exam-category');
        } else {
            $request->session()->flash('error', 'Course not deletded.');
            return redirect('/admin/exam-category');
        }
    }



}
