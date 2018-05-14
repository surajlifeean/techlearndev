<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use Session;

class VideoManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$video=Video::where('status','=','A')->Paginate(5);
        return view('Admin.video.index')->withVideos($video);*/
        $video=Video::Paginate(5);
        return view('Admin.video.index')->withVideos($video);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("hi");
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $video=new Video;
        
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token')
            $video->$key=$value;
        }
        $video->save();        

        session::flash('success', 'The Video Has Been Added Successfully!');
         //return redirect()->back();
         return redirect()->route('video-management.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $video=Video::find($id);
        return view('Admin.video.show')->withVideos($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $video=Video::find($id);
        return view('Admin.video.edit')->withVideos($video);
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
        $video=Video::find($id);
        $video->title=$request->title;
        $video->caption=$request->caption;
        $video->video_link=$request->video_link;
        $video->status=$request->status;
        $video->save();        

        session::flash('success', 'The Video Has Been Updated Successfully!');
         return redirect()->back();

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


    public function delete($id,Request $request)
    {   //dd($id);
        $customer =Video::find($id);
        //dd($customer);
         if(Video::find($id)->delete()){
            $request->session()->flash('success', 'Video deletded successfully.');
            return redirect('/admin/video-management');
        } else {
            $request->session()->flash('error', 'Video not deletded.');
            return redirect('/admin/video-management');
        }
    }

    public function statuschange($id,Request $request)
    {   //dd($id);
        $customer =Video::find($id);
        //dd($customer);
        if($customer->status == 'A'){
    //dd($customer->status);
            $customer->status = 'I';
            if($customer->save()){
                $request->session()->flash('success', 'Video deactivated successfully.');
                return redirect('/admin/video-management');
            }
        } else {
            $customer->status = 'A';
            if($customer->save()){
                $request->session()->flash('success', 'Video activated successfully.');
                return redirect('/admin/video-management');
            }
        }
    }

    public function bulkvideostatus(){


                $ids=$_REQUEST['IDs'];
       //echo $ids;
        $ids=explode(',',$ids);
        $status=$_REQUEST['status'];

        foreach ($ids as $id) {
         
        $var=Video::find($id);
            if($status=='A')
            $var->status='I';
            else
            $var->status='A';

        $var->save();
        }
        Session::flash('success', 'Video Status Changed!');
        echo "done";
    }



    public function videobulkdelete()
    {
        
        $ids=$_REQUEST['IDs'];
        //echo $ids;
        $ids=explode(',',$ids);
        
        foreach ($ids as $id) {
            if($id!=null){
            $dir=Video::find($id);
            //dd($dir);
            //unlink(public_path('/uploaded_images/banner/'.$dir->image_name));
            $dir->delete();
        }
    }
       
        Session::flash('success', 'Data Deleted Successfully!');
        echo "done";
    }

    public function videosearch()
    {
        if(isset($_REQUEST['search']))

         session(['search'=>$_REQUEST['search']]);
     $search=session('search');
       $search=strtolower($search);
        $video=Video::whereRaw('LOWER(title) like ?', ["%".$search."%"])->orwhereRaw('LOWER(caption) like ?', ["%".$search."%"])->paginate(5);
        
        return view('Admin.video.index')->withVideos($video);
    }



}
