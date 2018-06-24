<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Support;
use App\SupportSubject;
use Image;
use Session;
use Auth;

class SupportManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $support=Support::paginate(10);
         //dd($support);
         return view('Admin.support.index')->withSupports($support);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $support_subject=SupportSubject::get();

                $subject=array();
                foreach ($support_subject as $key => $value) {
                # code...
                        $subject[$value->id]=$value->subject;

                }

        return view('Admin.support.create')->withSubject($subject);
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
        $support=new Support;
        $support->subject_id=$request->subject_id;
       $support->details   =$request->limitedtextarea;
       $support->name      =$request->name;
       $support->email     =$request->email;
       // echo"<pre>";
       // print_r($support);
       // dd();
       $support->save();
        session::flash('success', 'The Section Has Been Added Successfully!');
         return redirect()->route('support-management.index');
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
         $support=Support::find($id);
        //dd($support);
        $support_subject=SupportSubject::get();

                $subject=array();
                foreach ($support_subject as $key => $value) {
                # code...
                        $subject[$value->id]=$value->subject;

                }
        return view('Admin.support.edit')->withSupports($support)->withSubject($subject);
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
       //dd($id);
       $support=Support::find($id);
       $support->subject_id=$request->subject_id;
       $support->details   =$request->limitedtextarea;
       $support->name      =$request->name;
       $support->email     =$request->email;
       // echo"<pre>";
       // print_r($support);
       // dd();
       $support->save();
        session::flash('success', 'The Section Has Been Added Successfully!');
         return redirect()->route('support-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd("here");
        $query = Support::find($id);
       
       if($query->delete()){
            return redirect()->back()->with('success', 'Query deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Query can not be deleted.');
                }
    }



    public function delete($id,Request $request)
    {   //dd($id);
        $customer =Banner::find($id);
        //dd($customer);
         if(Banner::find($id)->delete()){
            $request->session()->flash('success', 'Banner deletded successfully.');
            return redirect('/admin/banner-management');
        } else {
            $request->session()->flash('error', 'Banner not deletded.');
            return redirect('/admin/banner-management');
        }
    }

    public function statuschange($id,Request $request)
    {   //dd($id);
        $customer =Banner::find($id);
        //dd($customer);
        if($customer->status == 'A'){
    //dd($customer->status);
            $customer->status = 'Y';
            if($customer->save()){
                $request->session()->flash('success', 'Banner deactivated successfully.');
                return redirect('/admin/banner-management');
            }
        } else {
            $customer->status = 'A';
            if($customer->save()){
                $request->session()->flash('success', 'Banner activated successfully.');
                return redirect('/admin/banner-management');
            }
        }
    }

    public function bulkbannerstatus()
    {
        
        $ids=$_REQUEST['IDs'];
       //echo $ids;
        $ids=explode(',',$ids);
        $status=$_REQUEST['status'];

        foreach ($ids as $id) {
         
        $var=Banner::find($id);
            if($status=='A')
            $var->status='Y';
            else
            $var->status='A';

        $var->save();
        }
        Session::flash('success', 'Banner Status Changed!');
        echo "done";
    }


    public function bannerbulkdelete()
    {
        
        $ids=$_REQUEST['IDs'];
        //echo $ids;
        $ids=explode(',',$ids);
        
        foreach ($ids as $id) {
            if($id!=null){
            $dir=Banner::find($id);
            //dd($dir);
            //unlink(public_path('/uploaded_images/banner/'.$dir->image_name));
            $dir->delete();
        }
    }
       
        Session::flash('success', 'Data Deleted Successfully!');
        echo "done";
    }

    public function supportsearch()
    {
        if(isset($_REQUEST['search']))

         session(['search'=>$_REQUEST['search']]);
     $search=session('search');
       $search=strtolower($search);
        $banner=Support::whereRaw('LOWER(name) like ?', ["%".$search."%"])->orwhereRaw('LOWER(email) like ?', ["%".$search."%"])->paginate(5);
        
        return view('Admin.support.index')->withSupports($banner);
    }





}
