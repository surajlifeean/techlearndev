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
        // $lc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where([
        //     ['parent_id',$id],
        //     ['side','=','left']
        // ])->first();
        // $rc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where([
        //     ['parent_id',$id],
        //     ['side','=','right']
        // ])->first();
        // dd($user);

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
        // dd($ts);

        $this->getChildsArray($id);
        $larray=$GLOBALS['larray'];
        $rarray=$GLOBALS['rarray'];

        $teamarray=array_merge($larray,$rarray);

        $sortedarray=$this->bubble_Sort($teamarray);
        
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




}
