<?php
namespace App\Http\Traits;
use App\User;
use DB;


trait BrandsTrait {
     public function getleftchild($id){
      $lc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where([
            ['parent_id',$id]
        ])->first();

         return $lc;
    }

    public function getrightchild($id){
            $rc=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'contact_no','username','side')->where([
            ['parent_id',$id],
            ['side','=','right']
        ])->first();
        return $rc;
    }

}