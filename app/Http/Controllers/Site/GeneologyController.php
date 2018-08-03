<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;

class GeneologyController extends Controller
{
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
        $lc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where([
            ['parent_id',$id],
            ['side','=','left']
        ])->first();
        $rc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where([
            ['parent_id',$id],
            ['side','=','right']
        ])->first();
        // dd($user);

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
        return view('geneology.show')->withUser($user)->withTeamsize($ts)->withLeftsize($lc)->withRightsize($rc);
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
}
