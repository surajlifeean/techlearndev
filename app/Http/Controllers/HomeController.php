<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Review;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //    $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $courses=Course::all();
       $review=Review::all();
        
        return view('home')->withCourses($courses)->withReview($review);

    }

    public function sendsms()
    {

    $Textlocal = new Textlocal(false, false,'0fCaaLSB9mU-EgX1Vx2JmiChxCm1xfgOLbEjuFzPWp');
 
    $numbers = array();
    $sender = 'TXTLCL';
    $message = 'Hello lady.. looking sweet today.';
 
    $response = $Textlocal->sendSms($numbers, $message, $sender);
    dd($response);

    }
}
