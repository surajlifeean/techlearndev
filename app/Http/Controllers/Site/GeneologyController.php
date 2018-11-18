<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\User;
use Auth;
use DB;

class GeneologyController extends Controller
{

    use BrandsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //dd($id);
        // $uid=Auth::user()->id;
        $user=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where('id',$id)->get();
        $value=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'status','created_at','side','username')->where('id',$id)->get();
        

        $lc=$this->getleftchild($id);
        $rc=$this->getrightchild($id);
        $ts=$this->getteamsize($id);
        if(isset($lc))
            $lc=$this->getteamsize($lc->id)+1;
        else
            $lc=0;
        
        if(isset($rc)) 
            $rc=$this->getteamsize($rc->id)+1;
        else
            $rc=0;
        
         $val=$this->getActiveLevelCount($id);

        $this->getChildsArray($id);
        $larray=$GLOBALS['larray'];
        $rarray=$GLOBALS['rarray'];

        $teamarray=array_merge($larray,$rarray);

        // array_push($teamarray,$ch1);
         $img=url('').'/public/images/user.jpg';
         $url=route('my-geneology.show',$id);

         
         array_push($teamarray,[(object)['v'=>strval($id),'f'=>'<img src="'.$img.'" style="border-radius: 50%; width:80px;height:auto;"><a href='.$url.'>'.strval($value[0]->username).'</a>'],null,'L']);


        $sortedarray=$this->bubble_Sort($teamarray);
        

        $sortedarray=array_slice($sortedarray,0,$val+1);
        // foreach ($teamarray as $key => $value) {
                
        //         // $arr=(array)$value[0];
        //         echo($value[0]->v);
                
        // }


        return view('geneology.show')->withUser($user)->withTeamsize($ts)->withLeftsize($lc)->withRightsize($rc)->withTeamArray($sortedarray);
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

    function getteamsize($id)
    {
        $user=User::select('id','username','side','parent_id')->where('parent_id','=',$id)->get();
        $noofchild=count($user);

        if($noofchild==0){
            return 0;
        }
        else{
            if($noofchild==2)
            return $noofchild+$this->getteamsize($user[0]->id)+$this->getteamsize($user[1]->id);
            else
            return $noofchild+$this->getteamsize($user[0]->id);
        }
    }
    // function getleftchild($id){

    //      $lc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where([
    //         ['parent_id',$id],
    //         ['side','=','left']
    //     ])->first();

    //      return $lc;
    // }
    // function getrightchild($id){
    //         $rc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where([
    //         ['parent_id',$id],
    //         ['side','=','right']
    //     ])->first();
    //     return $rc;
    // }
    function bubble_Sort($my_array )
{
    do
    {
        $swapped = false;
        for( $i = 0, $c = count( $my_array ) - 1; $i < $c; $i++ )
        {
            // $value[0]->v
            $value=$my_array[$i];
            $nextvalue=$my_array[$i + 1];
            if( $value[1] > $nextvalue[1])
            {
                list( $my_array[$i + 1], $my_array[$i] ) =
                        array( $my_array[$i], $my_array[$i + 1] );
                $swapped = true;
            }
        }
    }
    while( $swapped );
return $my_array;
}

    // function getActiveLevelCount($id)
    // {
    //     Static $level=0;

    //     $user=User::select('id','username','side','parent_id')->where('parent_id','=',$id)->get();   

    //     $noofchild=count($user);
    //     if($level>15){
    //         return 0;
    //     }

    //     if($noofchild==0){
    //         return 0;
    //     }
    //     else{
    //         $level=$level+1;
    //         if($noofchild==2)
    //             return $noofchild+$this->getActiveLevelCount($user[0]->id)+$this->getActiveLevelCount($user[1]->id);
    //         else
    //         $level=$level+1;
    //         return $noofchild+$this->getActiveLevelCount($user[0]->id);

    //     }
    // }

    function getActiveLevelCount($id)
    {   
        $c=0;
        $child=array();
        $level_2_children=array();
        $level_3_children=array();

        $ch1=$this->getImmediateChild($id);
        
        array_push($child,$ch1);

        if(isset($ch1))
        foreach ($ch1 as $key => $value) {
         if($value!='Empty'){
         $ch1=$this->getImmediateChild($value);
         array_push($child,$ch1);
         array_push($level_2_children,$ch1);
            }
        }

        if(isset($ch1))
        foreach ($level_2_children as $key => $value) {
            foreach ($value as $k => $v) {
                if($value!='Empty'){
                $ch1=$this->getImmediateChild($v);
                array_push($child,$ch1);
                array_push($level_3_children,$ch1);
                }
            }

        }

        foreach($child as $key => $value) {
            if($value!=null)
            foreach ($value as $k => $v) {     
                    $c++ ;              
                }            
            }

        return $c;
    }

    function getImmediateChild($id)
    {
         $user_arr=array();
         $user=User::select('id')->where('parent_id','=',$id)->get();
         $noofchild=count($user);

        if($noofchild!=0)
        {
            foreach ($user as $key => $value) {
                array_push($user_arr,$value->id);
            }

            if($noofchild==2)
                return $user_arr;
            else{
                array_push($user_arr,'Empty');
                return $user_arr;
            }
        }
    }

}
