<?php
namespace App\Http\Traits;
use App\User;
use App\CommissionedSale;
use DB;
use Redirect;

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
        // $user=User::select('id','side','status','created_at')->where('parent_id','=',$id)->get();

        $user=User::select('id',DB::raw('CONCAT(fname," ",lname) as full_name'),'status','created_at','side','username')->where('parent_id','=',$id)->get();

        //push empty value for the field absent
        foreach ($user as $key => $value) {
            
            if($value->side=='left')
                $l++;
            else 
                $r++;

        }

        $rs=$this->RandomString();

        if($l==0 && $r>0)
             array_push($larray,[(object)['v'=>$rs,'f'=>'Empty'],strval($id),'L']);
        if($r==0 && $l>0)
              array_push($rarray,[(object)['v'=>$rs,'f'=>'Empty'],strval($id),'R']);

          // asset('/images/user.jpg');
          $img=url('').'/public/images/user.jpg';

        foreach ($user as $key => $value) {
                
                 $url=route('my-geneology.show',$value->id);
                if($value->side=='left'){
                        array_push($larray,[(object)['v'=>strval($value->id),'f'=>'<img src="'.$img.'" style="border-radius: 50%; width:80px;height:auto;"><a href='.$url.'>'.strval($value->username).'</a>'],strval($id),'L']);
                    }

                if($value->side=='right'){
                        array_push($rarray,[(object)['v'=>strval($value->id),'f'=>'<img src="'.$img.'" style="border-radius: 50%; width:80px;height:auto;"><a href='.$url.'>'.strval($value->username).'</a>'],strval($id),'R']);
                }
                $this->getChildsArray($value->id);

        }

        $GLOBALS['larray']=$larray;
        $GLOBALS['rarray']=$rarray;

          // <a href={{route("my-geneology.show",1025)}}>  
    }

function RandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

}