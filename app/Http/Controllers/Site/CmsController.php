<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function aboutus(){
    	return view('cms.aboutus');
    }
}
