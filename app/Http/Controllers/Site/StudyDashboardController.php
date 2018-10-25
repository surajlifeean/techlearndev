<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\User;
use PDF;
use Auth;
use DateTime;
use App\CommissionedSale;


class StudyDashboardController extends Controller
{

    use BrandsTrait;
  

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

        $id=Auth::user()->id;

        $this->getallchilds($id);
        $lids=$GLOBALS['lids'];
        $rids=$GLOBALS['rids'];


        //AN ASSOCIATE WILL BE ELIGIBLE FOR COMMISSION AFTER THIS MANY DAYS
        // DD($commission_duration);

        $CommissionedSale=CommissionedSale::where('receiver_id',$id)->get();



        $this->getCommissionRatio($id);
        
    
        $ds=count($this->direct_sales($id));
        $ts=$this->getteamsize($id);
        $lc=$this->getleftchild($id);
        $rc=$this->getrightchild($id);
        if(isset($lc))
            $ls=$this->getteamsize($lc->id)+1;
        else
            $ls=0;
        
        if(isset($rc)) 
            $rs=$this->getteamsize($rc->id)+1;
        else
            $rs=0;

        $ldor=$this->getDormantCount($lc->id);
        if($lc->status=='I')
            $ldor++;
        $rdor=$this->getDormantCount($rc->id);
        if($rc->status=='I')
            $rdor++;


        

        $sales_report=['ds'=>$ds,'ts'=>$ts,'ls'=>$ls,'rs'=>$rs,'ldor'=>$ldor,'rdor'=>$rdor];
        return view('dashboard.index')->withSalesreport($sales_report)->withCommissionedsales(count($CommissionedSale));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("create") ;
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

     public function downloadPDF($id){

   // dd($id)
        
      $user = User::find($id);
      // $pdf = PDF::loadView('invoice.create', compact('user'));
//      dd(compact('user'));
      return view('invoice.create')->withUser($user);

    }

      public function direct_sales($id){

   // dd($id)
        
      $directsales = User::where('sponsor_id',$id)->get();
      // $pdf = PDF::loadView('invoice.create', compact('user'));
//      dd(compact('user'));
     return $directsales;

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

   //get ids of all the children in the team
    public function getallchilds($id){
        Static $lids=array();
        Static $rids=array();

        
        $now = date("Y-m-d H:i:s");
        $commission_duration = env('COMMISSION_DURATION','');
        $user=User::select('id','side','status','created_at')->where('parent_id','=',$id)->whereRaw('DATEDIFF("'.$now.'",created_at) >'.$commission_duration)->get();

        foreach ($user as $key => $value) {
            
                if($value->side=='left')
                        array_push($lids,(object)['id'=>$value->id,'status'=>$value->status,'created_at'=>$value->created_at]);
                if($value->side=='right')
                        array_push($rids,(object)['id'=>$value->id,'status'=>$value->status,'created_at'=>$value->created_at]);
                
                $this->getallchilds($value->id);

        }
        $GLOBALS['lids']=$lids;
        $GLOBALS['rids']=$rids;

            
    }
}
