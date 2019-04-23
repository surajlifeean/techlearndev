<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {

        $logedInUserId                      = Auth::user()->id;
        $UserDetails                        = User::find($logedInUserId);
        $BankAccountDetails                 = DB::table('bank_informations')->where('user_id','=',$logedInUserId)->first();
        
        
        return view('account.index')->with('userDetails',$UserDetails)->with('bankAccountDetails',$BankAccountDetails);
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
        
       //dd($request['BankName']);
        
        
        
        $logedInUserId      = Auth::user()->id;
        $UserDetails        = User::find($logedInUserId);
        if(!empty($UserDetails)){
            
            
            
            $UserDetails->fname                 = $request['fname'];
            $UserDetails->lname                 = $request['lname'];
            $UserDetails->nominee               = $request['nominee'];
            $UserDetails->relation_with_nominee = $request['relation_with_nominee'];
            $UserDetails->contact_no            = $request['contact_no'];
            $UserDetails->dob                   = $request['dob'];
            $UserDetails->correspondence        = $request['correspondence'];
            $UserDetails->guardian              = $request['guardian'];
            $UserDetails->address               = $request['address'];
            $UserDetails->landmark              = $request['landmark'];
            
            $UserDetails->save();
            
            $BankAccountDetails                 = DB::table('bank_informations')->where('user_id','=',$logedInUserId)->first();
            if(!empty($BankAccountDetails))
            {
                
                $data = array(
                        
                        'AccountName'  =>$request['AccountName'],
                        'AccountNumber'=>$request['AccountNumber'],
                        'BranchName'   =>$request['BranchName'],
                        'BankName'     =>$request['BankName'],
                        'IfscCode'     =>$request['IfscCode']
                        );
                DB::table('bank_informations')
                                   ->where('user_id','=',$logedInUserId)  // find your user by their email
                                   ->limit(1)  // optional - to ensure only one record is updated.
                                   ->update($data);
                
                
                
            }else{
                 
                
                $data = array(
                        'user_id'      =>$logedInUserId,
                        'AccountName'  =>$request['AccountName'],
                        'AccountNumber'=>$request['AccountNumber'],
                        'BranchName'   =>$request['BranchName'],
                        'BankName'     =>$request['BankName'],
                        'IfscCode'     =>$request['IfscCode']
                        );
                DB::table('bank_informations')->insert($data);
                
            }
            
        }    
        
        return redirect()->back()->with("success","Successfully Updated");
        
        
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
}
