<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Image;
use Session;
use Auth;

class BannerManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$banners=Banner::where('status','=','A')->Paginate(5);
        return view('Admin.banner.index')->withBanners($banners);*/
        $banners=Banner::Paginate(5);
        return view('Admin.banner.index')->withBanners($banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.banner.create');
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
        $banner=new Banner;
        
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name')
            $banner->$key=$value;
        }

        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='banner'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/uploaded_images/banner/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(1920,null)->save($location);
        //660
        $banner->image=$filename;
        $banner->save();        

        session::flash('success', 'The Banner Has Been Added Successfully!');
         return redirect()->route('banner-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $banner=Banner::find($id);
        return view("admin.banner.show")->withBanners($banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $banner=Banner::find($id);
        //dd($banner);
        return view("admin.banner.edit")->withBanners($banner);
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
      //dd($request);
      $banner=Banner::find($id);
        
       /* $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name')
            $banner->$key=$value;
        }*/

          //dd($request->banner_text);
        $banner->banner_text=$request->banner_text;
        $banner->status=$request->status;
        if(count($request->file('image_name'))){
        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='banner'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/uploaded_images/banner/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(1920,660)->save($location);
        $banner->image=$filename;

    }
        $banner->save();        

        session::flash('success', 'The Banner Has Been Updated Successfully!');
         return redirect()->route('banner-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
         $customer =Banner::find($id);
         //dd($request);
         //$customer =Banner::find($id);
         //dd($customer);
    
           // "sourav";
        // if($customer->delete()){
       if(Banner::find($id)->delete()){
            $request->session()->flash('success', 'Banner deletded successfully.');
            return redirect('/admin/banner-management');
        } else {
            $request->session()->flash('error', 'Banner not deletded.');
            return redirect('/admin/banner-management');
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

    public function bannersearch()
    {
        if(isset($_REQUEST['search']))

         session(['search'=>$_REQUEST['search']]);
     $search=session('search');
       $search=strtolower($search);
        $banner=Banner::whereRaw('LOWER(banner_text) like ?', ["%".$search."%"])->paginate(5);
        
        return view('Admin.banner.index')->withbanners($banner);
    }





}
