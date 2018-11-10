<?php
namespace App\Http\Traits;
use App\User;
use App\CommissionedSale;
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

     public function getCommissionRatio($id){

            //$tag=CommissionedSale::where('receiver_id',$id)->get();
        $tag=DB::table('commissioned_sales')
        ->select('tag',DB::raw('count(*) as cnt'))
        ->where('receiver_id','=',$id)
        ->groupBy('tag')
        ->get();

        // dd($tag);


    }
    public function getChildsArray($id){
        Static $larray=array();
        Static $rarray=array();

        $l=0;
        $r=0;
        // $now = date("Y-m-d H:i:s");
        // $commission_duration = env('COMMISSION_DURATION','');
        $user=User::select('id','side','status','created_at')->where('parent_id','=',$id)->get();

        //push empty value for the field absent
        foreach ($user as $key => $value) {
            
            if($value->side=='left')
                $l++;
            else 
                $r++;

        }
        if($l==0 && $r>0)
             array_push($larray,['Empty',$id,'']);
        if($r==0 && $l>0)
              array_push($rarray,['Empty',$id,'']);

        foreach ($user as $key => $value) {
            
                if($value->side=='left')
                        array_push($larray,[$value->id,$id,'']);

                if($value->side=='right')
                        array_push($rarray,[$value->id,$id,'']);
                
                $this->getChildsArray($value->id);

        }
        $GLOBALS['larray']=$larray;
        $GLOBALS['rarray']=$rarray;

            
    }
}