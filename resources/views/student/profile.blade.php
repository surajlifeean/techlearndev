@extends('main')
@section('content')

	  <section class="profile-section clearfix">
			<div class="container">
                <div class="card profile-card">
                   <div class="d-md-flex mb-3 d-sm-flex align-items-center justify-content-between">
                     <div class="propic">
                       <img src="{{asset('images/user.jpg')}}" alt="">  
                     </div>
                     <div class="pro-details">
                       <ul>
                         <li><span>Student Id - </span>{{Auth::user()->id}}</li>
                         <li><span>Name  - </span>{{Auth::user()->fname.' '.Auth::user()->lname}}</li>
                         <li><span>Course  - </span>{{Auth::user()->userCourse->title}}</li>  

                         @php 
                         $date=Auth::user()->created_at;
                         $duration=Auth::user()->userCourse->duration;
                         $mod_date = strtotime($date."+".$duration." days") @endphp
                         <li><span>Duration - </span>{{date('d.m.Y',strtotime(Auth::user()->created_at))}} to {{date('d.m.Y',$mod_date)}}</li>
                       </ul>     
                     </div>      
                   </div>  
                    
                   <div class="button-set">
                       <a href="{{route('pdf',Auth::user()->id)}}"  class="button-small" target="_blank">Invoice</a>
                       <a href="{{route('education.index')}}"  class="button-small">Education</a>
                       <a href="{{route('my-geneology.show',Auth::user()->id)}}"  class="button-small">Business</a>
                   </div>     
                </div>       
            </div>
	  </section>

@endsection