<?php
namespace App\Http\Traits;
use App\User;
use DB;


trait BrandsTrait {
     public function getleftchild($id){
      $lc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side','status')->where([
            ['parent_id',$id]
        ])->first();

         return $lc;
    }

    public function getrightchild($id){
            $rc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side','status')->where([
            ['parent_id',$id],
            ['side','=','right']
        ])->first();
        return $rc;
    }

     function getDormantCount($id){

        $dor=0;
      
        $user=User::select('id','username','side','parent_id','status')->where('parent_id','=',$id)->get();
        //dd($user);
        if(count($user)!=0){
        foreach ($user as $key => $value) {
            if($value->status=='I')
                $dor++;
        }
            if(count($user)==2)
                return $dor+$this->getDormantCount($user[0]->id)+$this->getDormantCount($user[1]->id);
            else
                return $dor+$this->getDormantCount($user[0]->id);

    }
        else
            return 0;

        return $dor;


    }
    // public function getallchilds($id){

    // }

}