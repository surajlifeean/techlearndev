<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use Image;
use Session;
use Auth;
use Illuminate\Support\Str;


class CourseManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course=Course::paginate(10);
        
        // dd(property_exists($course,'title'));
        //dd($course);
        return view('Admin.course.index')->withCourses($course);
       // return view('Admin.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $course=new Course;
        
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name' & $key!='image_thumbnail')
            $course->$key=$value;
        }

         $slug=strtolower($request['title']);
           // $slug=str_replace(" ","-",$slug);
            $slug = $this->getSlug($slug);
            $course->slug=$slug;

        $image=$request->file('image_name');

        $image_thumbnail=$request->file('image_thumbnail');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='course'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $filename_thumbnail='course_thumb'.'-'.rand().time().'.'.$image_thumbnail->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/uploaded_images/courses/'.$filename);
        $location_thumbnail=public_path('/uploaded_images/courses/'.$filename_thumbnail);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(600,400)->save($location);
        Image::make($image_thumbnail)->resize(318,174)->save($location_thumbnail);
        $course->image=$filename;
        $course->thumbnail=$filename_thumbnail;
        $course->save();        

        session::flash('success', 'The Course Has Been Added Successfully!');
         return redirect()->route('course-management.index');
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
        $course=Course::find($id);
        return view('Admin.course.edit')->withCourse($course);
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
        $course=Course::find($id);
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' && $key!='image_name' && $key!='_method' && $key!='image_thumbnail')
            $course->$key=$value;
        }

        if($request->hasFile('image_name')){
        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='course'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/uploaded_images/courses/'.$filename);
        // use $location='images/'.$filename; on a server
        Image::make($image)->resize(600,400)->save($location);
        $course->image=$filename;
    }
        if($request->hasFile('image_thumbnail')){
        $image_thumbnail=$request->file('image_thumbnail');
        $filename_thumbnail='course_thumb'.'-'.rand().time().'.'.$image_thumbnail->getClientOriginalExtension();//part of image intervention library
        $location_thumbnail=public_path('/uploaded_images/courses/'.$filename_thumbnail);
        Image::make($image_thumbnail)->resize(318,174)->save($location_thumbnail);
        $course->thumbnail=$filename_thumbnail;
        }
        $course->save();        

        session::flash('success', 'The Course Has Been Updated Successfully!');
         return redirect()->route('course-management.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::find($id);
        $course->delete();
        return redirect()->back()->with('success','Record has been successfully deleted');
    }
       public function getSlug($title) {
    $slug = Str::slug($title);
    $slugCount = count( Course::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
    $sl=($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    return $sl;
}


public function delete($id,Request $request)
    {   //dd($id);
        $Course =Course::find($id);
        //dd($customer);
         if(Course::find($id)->delete()){
            $request->session()->flash('success', 'Course deletded successfully.');
            return redirect('/admin/course-management');
        } else {
            $request->session()->flash('error', 'Course not deletded.');
            return redirect('/admin/course-management');
        }
    }


 public function statuschange($id,Request $request)
    {   //dd($id);
        $course =Course::find($id);
        //dd($customer);
        if($course->status == 'A'){
    //dd($customer->status);
            $course->status = 'I';
            if($course->save()){
                $request->session()->flash('success', 'course deactivated successfully.');
                return redirect('/admin/course-management');
            }
        } else {
            $course->status = 'A';
            if($course->save()){
                $request->session()->flash('success', 'course activated successfully.');
                return redirect('/admin/course-management');
            }
        }
    }




    public function bulkcoursestatus(){

        $ids=$_REQUEST['IDs'];
       //echo $ids;
        $ids=explode(',',$ids);
        $status=$_REQUEST['status'];

        foreach ($ids as $id) {
         
        $var=Course::find($id);
            if($status=='A')
            $var->status='I';
            else
            $var->status='A';

        $var->save();
        }
        Session::flash('success', 'Course Status Changed!');
        echo "done";
    }

    public function deletecourse()
    {
        
        $ids=$_REQUEST['IDs'];
        //echo $ids;
        $ids=explode(',',$ids);
        
        foreach ($ids as $id) {
            if($id!=null){
            $dir=Course::find($id);
            //dd($dir);
            //unlink(public_path('/uploaded_images/banner/'.$dir->image_name));
            $dir->delete();
        }
    }
       
        Session::flash('success', 'Data Deleted Successfully!');
        echo "done";
    }

    public function coursesearch()
    {
        if(isset($_REQUEST['search']))

         session(['search'=>$_REQUEST['search']]);
     $search=session('search');
       $search=strtolower($search);
        $course=Course::whereRaw('LOWER(title) like ?', ["%".$search."%"])->paginate(5);
        
       return view('Admin.course.index')->withCourses($course);
    }





}

