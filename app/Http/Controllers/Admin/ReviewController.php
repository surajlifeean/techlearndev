<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Review;
use DateTime;
use Session;
use Image;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review=Review::Paginate(5);
        return view('Admin.review.index')->withReviews($review);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course=Course::all();
        $review_on=array();
        $review_on[0]="General";
        foreach ($course as $key => $value) {
            # code...
            $review_on[$value->id]=$value->title;

        }
        return view('Admin.review.create')->withReviewon($review_on);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review=new Review;
        
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name')
            $review->$key=$value;
        }

        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='review'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/uploaded_images/reviewers/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(90,90)->save($location);
        $review->image=$filename;
        $review->save();        

        session::flash('success', 'The review Has Been Added Successfully!');
         return redirect()->route('review-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Course::all();
        $review_on=array();
        $review_on[0]="General";
        foreach ($course as $key => $value) {
            # code...
            $review_on[$value->id]=$value->title;

        }

        $review=Review::find($id);

        return view('Admin.review.show')->withReview($review)->withReviewon($review_on);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $course=Course::all();
        $review_on=array();
        $review_on[0]="General";
        foreach ($course as $key => $value) {
            # code...
            $review_on[$value->id]=$value->title;

        }

        $review=Review::find($id);

        return view('Admin.review.edit')->withReview($review)->withReviewon($review_on);
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
        $review=Review::find($id);
        
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' && $key!='image_name' && $key!='_method')
            $review->$key=$value;
        }

        if($request->hasFile('image_name')){

        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='review'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/uploaded_images/reviewers/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(90,90)->save($location);
        $review->image=$filename;

    }
        $review->save();        

        session::flash('success', 'The review Has Been Added Successfully!');
         return redirect()->route('review-management.index');

    }


    public function delete($id,Request $request)
    {   //dd($id);
        $customer =Review::find($id);
        //dd($customer);
         if(Review::find($id)->delete()){
            $request->session()->flash('success', 'Review deletded successfully.');
            return redirect('/admin/review-management');
        } else {
            $request->session()->flash('error', 'Review not deletded.');
            return redirect('/admin/review-management');
        }
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
        $customer =Review::find($id);
        //dd($customer);
        if($customer->status == 'A'){
    //dd($customer->status);
            $customer->status = 'Y';
            if($customer->save()){
                $request->session()->flash('success', 'Review deactivated successfully.');
                return redirect('/admin/review-management');
            }
        } else {
            $customer->status = 'A';
            if($customer->save()){
                $request->session()->flash('success', 'Review activated successfully.');
                return redirect('/admin/review-management');
            }
        }
    }


    public function bulkreviewstatus(){


        $ids=$_REQUEST['IDs'];
       //echo $ids;
        $ids=explode(',',$ids);
        $status=$_REQUEST['status'];

        foreach ($ids as $id) {
         
        $var=Review::find($id);
            if($status=='A')
            $var->status='Y';
            else
            $var->status='A';

        $var->save();
        }
        Session::flash('success', 'Review Status Changed!');
        echo "done";
    }

    public function reviewdeletebulk(){


        $ids=$_REQUEST['IDs'];
        //echo $ids;
        $ids=explode(',',$ids);
        
        foreach ($ids as $id) {
            if($id!=null){
            $dir=Review::find($id);
            //dd($dir);
            //unlink(public_path('/uploaded_images/banner/'.$dir->image_name));
            $dir->delete();
        }
    }
       
        Session::flash('success', 'Data Deleted Successfully!');
        echo "done";
    }


    public function reviewsearch(){

     if(isset($_REQUEST['search']))

         session(['search'=>$_REQUEST['search']]);
     $search=session('search');
       $search=strtolower($search);
        $review=Review::whereRaw('LOWER(review_by) like ?', ["%".$search."%"])->orwhereRaw('LOWER(comment) like ?', ["%".$search."%"])->paginate(5);
        
        return view('Admin.review.index')->withReviews($review);
    }


    



}
