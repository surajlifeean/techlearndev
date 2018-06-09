@extends('main')

@section('stylesheets')

<style type="text/css">

.modal-dialog {
      max-width: 800px;
      margin: 30px auto;
  }



.modal-body {
  position:relative;
  padding:0px;
}
.close {
  position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;
}

</style>

@endsection

@section('content')

     <section class="banner-sleek" style="background-image:url({{asset('images/banner-inner.png')}}); background-size: cover;">
      
	    <div class="banner-text text-center">
		   <div class="banner-container">
			 <h3>Courses</h3>
			   
			  <p>
			   The interactive learning destination for aspiring and <br>
experienced developers 
			  </p> 
			   <div class="button-set">
			   	<a href="#" class="button-common-white button-common">Enroll Now</a>
			   </div>
		   </div> 
	    </div>
       </section>
   
	  <section class="courses-sec">
	     
		 <div class="container">
		 	<div class="row courses-row">

        @foreach($courses as $course)


            @php

                    $url = $course->video_link;
                    $urlParts = explode("/", parse_url($url, PHP_URL_PATH));
                    $videoId = (int)$urlParts[count($urlParts)-1];
                    

            @endphp

			 <div class="col-lg-6 col-md-12">
                 <div class="course-single-block">
                        <div class="row align-items-center">
                                <div class="col-md-5 col-sm-6 course-single-block-left">
                                   <img src="{{asset('/uploaded_images/courses/'.$course->thumbnail)}}" alt="">
                               </div>	
                               <div class="col-md-7 col-sm-6 course-single-block-right text-center">
                                   <h2>{{$course->title}}</h2>
                                  <p> 
                                    {!!substr($course->description,0,200)!!}{{strlen($course->description)>200?"...":''}}
                                                                       </p>
                                   <div class="buttonset flex justify-content-between">
                                       <!-- <a href="#" class="button-common">Demo</a
                                        > -->
                                      <button type="button" class="button-common btn btn-primary video-btn" data-toggle="modal" data-src="https://player.vimeo.com/video/{{$videoId}}?title=0&byline=0&portrait=0&transparent=0" data-target="#myModal">
                                      Demo
                                      </button>


                                       <a href="{{route('learn.show',$course->slug)}}" class="button-common">Details</a>
                                   </div>
                               </div>
                           </div>
                 </div>
                
          </div>
            @endforeach
             
            <!--  <div class="col-lg-6 col-md-12">
                 <div class="course-single-block">
                        <div class="row align-items-center">
                               <div class="col-md-5 col-sm-6 course-single-block-left">
                                   <img src="{{asset('images/course-7.jpg')}}" alt="">
                               </div>	
                           	    <div class="col-md-7 col-sm-6 course-single-block-right text-center">
                                   <h2>+ More</h2>
                                   <p>
                                       Explore the history of the classic Lorem Ipsum passage and
              generate your own text using any number of characters, words, sentences or paragraphs.
                                   </p>
                                   
                                   <div class="buttonset text-center">
                                       <a href="#" class="button-common">See All Courses</a>
                                       
                                   </div>
                               </div>
                        </div>
                 </div>
                
          </div> -->
			 
			</div>
			 
			 
		 </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-body">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="" id="video" frameborder="0" title="Funny Cat Videos For Kids" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" data-ready="true"></iframe>
        </div>
        
        
      </div>

    </div>
  </div>
</div> 

	
	  </section>



@endsection

@section('scripts')

   <script type="text/javascript">

    $(document).ready(function() {

    // Gets the video src from the data-src on each button

    var $videoSrc;  
    $('.video-btn').click(function() {
    $videoSrc = $(this).data( "src" );
    });
    console.log($videoSrc);



    // when the modal is opened autoplay it  
    $('#myModal').on('shown.bs.modal', function (e) {

    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#video").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1" ); 
    })


    // stop playing the youtube video when I close the modal
    $('#myModal').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src',$videoSrc); 
    }) 






    // document ready  
    });



    </script>



@endsection