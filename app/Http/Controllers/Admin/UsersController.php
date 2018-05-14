<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::Paginate(5);
        return view('Admin.user.index')->withUsers($users);
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
