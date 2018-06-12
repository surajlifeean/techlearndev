<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Course;
use session;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('created_at')->Paginate(5);
        return view('Admin.user.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //return view("Admin.user.user_registration");

        /*$userexists=User::where('student_id','=',$request->sponsor_id)->first();
            
            if($userexists){
                $course=Course::all();
                $coursearray=array();
                foreach ($course as $key => $value) {
                # code...
                        $coursearray[$value->id]=$value->title;

                }
            Session::flash('success','Fill in the form to complete registration!');
            return view('Admin.user.user_registration')->withSponsorid($userexists->id)->withCourse($coursearray);
        }
            else{

            Session::flash('error','No Student with the entered ID exists.');
            return redirect()->back();
            }*/
             $rootuser=User::where('side',NULL)->first();
             //dd($rootuser);
             $course=Course::all();
                $coursearray=array();
                foreach ($course as $key => $value) {
                # code...
                        $coursearray[$value->id]=$value->title;

                }

                return view('Admin.user.user_registration')->withCourse($coursearray)->withRootdetails($rootuser);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {         //dd($request);
                  $register= new User;
                  $register->title=$request->title;
                  $register->fname=$request->fname;
                  $register->lname=$request->lname;
                  $register->contact_no=$request->contact_no;
                  $register->email=$request->email;
                  $register->dob=$request->dob;
                  $register->address=$request->limitedtextarea;
                  $register->landmark=$request->landmark;
                  $register->username=$request->username;
                  $register->password=Hash::make($request->password);
                  $register->course=$request->course;
                  $register->student_id='B-'.strtotime((date('is'))).rand(10,99);
                  $register->business_id='S-'.strtotime((date('is'))).rand(10,99);
                  $register->save();
                  $request->session()->flash('success', 'The Registration Has Been  Successfully Done By You!');
            //session::flash('success', 'The Category Has Been Added Successfully!');
           return redirect('/admin/users');



/*"bank_branch" =>$data['sponsored_by']*/


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           $user=User::find($id);
        //dd($user);
        return view("admin.user.show")->withUsers($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        //dd($user);
        return view("admin.user.edit")->withUsers($user);
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
       // dd($request);
         $register= User::find($id);
                  $register->title=$request->title;
                  $register->fname=$request->fname;
                  $register->lname=$request->lname;
                  $register->contact_no=$request->contact_no;
                  $register->email=$request->email;
                  $register->dob=date('Y-m-d',strtotime($request->dob));
                  $register->address=$request->limitedtextarea;
                  $register->landmark=$request->landmark;
                  $register->username=$request->username;
                  //$register->password=Hash::make($request->password);
                  $register->course=$request->course;
                  //$register->student_id='B-'.strtotime((date('is'))).rand(10,99);
                  //$register->business_id='S-'.strtotime((date('is'))).rand(10,99);
                  $register->save();
                  $request->session()->flash('success', 'The Registration Has Been  Successfully Done By You!');
            //session::flash('success', 'The Category Has Been Added Successfully!');
           return redirect('/admin/users');


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
        $customer =User::find($id);
        //dd($customer);
        if($customer->status == 'A'){
    //dd($customer->status);
            $customer->status = 'I';
            if($customer->save()){
                $request->session()->flash('success', 'User deactivated successfully.');
                return redirect('/admin/users');
            }
        } else {
            $customer->status = 'A';
            if($customer->save()){
                $request->session()->flash('success', 'User activated successfully.');
                return redirect('/admin/users');
            }
        }
    }


   public function bulkuserstatus()
   {

    $ids=$_REQUEST['IDs'];
       //echo $ids;
        $ids=explode(',',$ids);
        $status=$_REQUEST['status'];

        foreach ($ids as $id) {
         
        $var=User::find($id);
            if($status=='A')
            $var->status='I';
            else
            $var->status='A';

        $var->save();
        }
        //Session::flash('success', 'User Status Changed!');
        echo "done";
   }

public function usersearch()
    {
        if(isset($_REQUEST['search']))

         session(['search'=>$_REQUEST['search']]);
     $search=session('search');
       $search=strtolower($search);
       $users=User::whereRaw('LOWER(fname) like ?', ["%".$search."%"])->orwhereRaw('LOWER(lname) like ?', ["%".$search."%"])->orwhereRaw('LOWER(title) like ?', ["%".$search."%"])->paginate(5);
        
        
        return view('Admin.user.index')->withUsers($users);
    }



}
