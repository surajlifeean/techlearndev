<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Jobs\SendVerificationEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Session;
use App\Course;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lname' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            "fname" => 'required|string',
            "nominee" => "required",
            "contact_no" => "required",
            "dob" => 'required',
            "correspondence" => "required",
            "guardian" => "required",
            "address" => "required",
            "landmark" => "required",
            "username" => "required",
            "side" => "required",
            "course" => "required",
            "ddno" => "required",
            "amount" => "required",
            "issuing_bank" => "required",
            "issuing_date" => "required",
            "bank_branch" => "required",
            "sponsored_by" => "required",
        
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            "fname" => $data['fname'],
            "nominee" => $data['nominee'],
            "contact_no" => $data['contact_no'],
            "dob" => $data['dob'],
            "correspondence" => 'Courier',
            "guardian" => $data['guardian'],
            "address" => $data['address'],
            "landmark" => $data['landmark'],
            "username" => $data['username'],
            "side" => $data['side'],
            "course" => $data['course'],
            "ddno" => $data['ddno'],
            "amount" => $data['amount'],
            "sponsor_id" => $data['sponsor_id'],
            "issuing_bank" => $data['issuing_bank'],
            "issuing_date" => $data['issuing_date'],
            "bank_branch" => $data['bank_branch'],
            "business_id"=> 'B-'.strtotime((date('Ymd His'))).rand(0,20),
            "student_id"=> 'S-'.strtotime((date('Ymd His'))).rand(0,20),
            'email_token' => base64_encode($data['email']),
            "bank_branch" =>$data['sponsored_by'],
        
        ]);

    }
                /**
        * Handle a registration request for the application.
        *
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */
        public function register(Request $request)
        {
            //dd($request);

        //$this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return redirect()->route('login')->with('success',"Your account has been created! You can now login.");
        }
        /**
        * Handle a registration request for the application.
        *
        * @param $token
        * @return \Illuminate\Http\Response
        */
        public function verify($token)
        {
        $user = User::where('email_token',$token)->first();
        $user->verified = 1;
        if($user->save()){
        return view('email.emailconfirm',['user'=>$user]);
        }
    }
        public function register2(Request $request)
        {
            //dd($request);

            $userexists=User::where('student_id','=',$request->sponsor_id)->first();
            
            if($userexists){
                $course=Course::all();
                $coursearray=array();
                foreach ($course as $key => $value) {
                # code...
                        $coursearray[$value->id]=$value->title;

                }
            Session::flash('success','Fill in the form to complete registration!');
            return view('auth.register2')->withSponsorid($userexists->id)->withCourse($coursearray);
        }
            else{

            Session::flash('error','No Student with the entered ID exists.');
            return redirect()->back();
            }
        }
        


}
