
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
  <section class="banner-sec">
        <div class="banner-txt">
            <h1>We are an awesome study guide...</h1>
            <p>The interactive learning destination for aspiring and experienced developers</p>
            <div class="button-wrap">
                <a class="button-common-white button-common" href="#">login</a>
                <a class="button-common" href="#">Enroll</a>
            </div>
        </div>
    </section>
    <section class="how-works">
        <div class="container">
            <div class="section-heading">
                <h3>How Techlearn Works</h3>
            </div>
            <ul class="how-works-list">
                <li class="left-style">
                    <div class="col-md-5">
                        <img src="{{asset('images/1.jpg')}}" />
                    </div>
                    <div class="col-md-7">
                        <h3>Learn</h3>
                        <p>Experienced, engaging instructors take you through course material,step by step, in our high-quality video lessons.</p>
                    </div>
                </li>
                <li class="right-style">
                    <div class="col-md-7">
                        <h3>Refer</h3>
                        <p>Rack up points in the challenges and earn badges as you complete each course level, leading up to the covetedcourse completion badge.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('images/3.jpg')}}" />
                    </div>
                </li>
                <li class="left-style">
                    <div class="col-md-5">
                        <img src="{{asset('images/2.jpg')}}" />
                    </div>
                    <div class="col-md-7">
                        <h3>Practice</h3>
                        <p>Code directly in the browser with our course challenges, bringing to life what you learned and receiving immediate, helpful feedback and code validation.</p>
                    </div>
                </li>
                <li class="right-style">
                    <div class="col-md-7">
                        <h3>Earn</h3>
                        <p>Keep track of all your activity — points and badges earned, courses completed, screencasts watched, and more — with your Report Card.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('images/4.jpg')}}" />
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="course">
        <div class="section-heading">
            <h3>Course Demo</h3>
        </div>

        <div class="flex-wrap">

            @foreach($courses as $key=>$value)

            @php

                    $url = $value->video_link;
                    $urlParts = explode("/", parse_url($url, PHP_URL_PATH));
                    $videoId = (int)$urlParts[count($urlParts)-1];
                    

            @endphp
            

           <div class="flex">
                @if($key%2==0)
                <div class="img-flex">
                    <img src="{{asset('uploaded_images/courses/'.$value->image)}}">
                </div>
                @endif

                <div class="txt-flex">
                    <h4>{!!$value->title!!}</h4>
                    <p>{!!substr($value->description,0,500)!!}</p>
                    <div class="botton-flex">
                      <!--   <a href="#" class="button-common"></a>
                        --> 
                        <button type="button" class="button-common btn btn-primary video-btn" data-toggle="modal" data-src="https://player.vimeo.com/video/{{$videoId}}?title=0&byline=0&portrait=0&transparent=0" data-target="#myModal">
                        Demo
                        </button>

                        <a href="#" class="button-common">Details</a>
                    </div>
                </div>
                @if($key%2!=0)
                 <div class="img-flex">
                    <img src="{{asset('uploaded_images/courses/'.$value->image)}}">
                </div>
                @endif
            </div>
                @endforeach
            <!-- <div class="flex">
                <div class="img-flex">
                    <img src="{{asset('images/a.png')}}">
                </div>
                <div class="txt-flex">
                    <h4>javascript</h4>
                    <p> JavaScript is object-oriented language to make HTML pages interactive..</p>
                    <div class="botton-flex">
                        <a href="#" class="button-common">Demo</a>
                        <a href="#" class="button-common">Try A Quiz</a>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="txt-flex">
                    <h4>jQuery</h4>
                    <p>jQuery is a library of JavaScript to enhance the performance and compatibility of JavaScript.</p>
                    <div class="botton-flex">
                        <a href="#" class="button-common">Demo</a>
                        <a href="#" class="button-common">Try A Quiz</a>
                    </div>
                </div>
                <div class="img-flex">
                    <img src="{{asset('images/b.png')}}">
                </div>
            </div>
            <div class="flex">
                <div class="img-flex">
                    <img src="{{asset('images/a.png')}}">
                </div>
                <div class="txt-flex">
                    <h4>AngularJS</h4>
                    <p>AngularJS is the most popular framework of JavaScript for SPA (Single Page Applications) online.</p>
                    <div class="botton-flex">
                        <a href="#" class="button-common">Demo</a>
                        <a href="#" class="button-common">Try A Quiz</a>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="txt-flex">
                    <h4>Angular 4</h4>
                    <p>Angular 4, or just Angular is the recent and done-from-scratch release of Angular by Google to create an extremely powerful MV* framework for web.</p>
                    <div class="botton-flex">
                        <a href="#" class="button-common">Demo</a>
                        <a href="#" class="button-common">Try A Quiz</a>
                    </div>
                </div>
                <div class="img-flex">
                    <img src="{{asset('images/b.png')}}">
                </div>
            </div>
            <div class="flex">
                <div class="img-flex">
                    <img src="{{asset('images/a.png')}}">
                </div>
                <div class="txt-flex">
                    <h4>+ More</h4>
                    <p>Well, that's not the end of the world! We've got more in store! Check All Playlists.</p>
                    <div class="botton-flex">
                        <a href="#" class="button-common">See All Courses</a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <section class="testimonial">
        <div class="container">
            <div class="section-heading">
                <h3>Student Reviews</h3>
                <p>Read how these students learn by doing with Code School courses and screencasts.</p>
            </div>
            <div class="slider-wrap">
                <ul id="lightSlider">

                    @foreach($review as $key=>$value)

                    <li>
                        <p>“ {!!$value->comment!!} ”</p>
                        <div class="clint">
                            <div class="img">
                                <img src="{{asset('uploaded_images/reviewers/'.$value->image)}}">
                            </div>
                            <p>{{$value->comment_by}}</p>
                        </div>
                    </li>


                    @endforeach
                   <!--  <li>
                        <p>“I had never tried to learn code before out of fear that I wasn’t ‘techy enough’ and probably not smart enough — I was a Mathlete, but I spent most of my time making doodles with the DRAW function of my TI89. Every time I finish a Code School lesson, I feel like I prove that fear wrong. I truly appreciate you making an accessible resource.”</p>
                        <div class="clint">
                            <div class="img">
                                <img src="{{asset('images/Clint.png')}}">
                            </div>
                            <p>Anne Bertucio</p>
                        </div>
                    </li>
                    <li>
                        <p>“I had never tried to learn code before out of fear that I wasn’t ‘techy enough’ and probably not smart enough — I was a Mathlete, but I spent most of my time making doodles with the DRAW function of my TI89. Every time I finish a Code School lesson, I feel like I prove that fear wrong. I truly appreciate you making an accessible resource.”</p>
                        <div class="clint">
                            <div class="img">
                                <img src="{{asset('images/Clint.png')}}">
                            </div>
                            <p>Anne Bertucio</p>
                        </div>
                    </li>
                    <li>
                        <p>“I had never tried to learn code before out of fear that I wasn’t ‘techy enough’ and probably not smart enough — I was a Mathlete, but I spent most of my time making doodles with the DRAW function of my TI89. Every time I finish a Code School lesson, I feel like I prove that fear wrong. I truly appreciate you making an accessible resource.”</p>
                        <div class="clint">
                            <div class="img">
                                <img src="{{asset('images/Clint.png')}}">
                            </div>
                            <p>Anne Bertucio</p>
                        </div>
                    </li>
                    <li>
                        <p>“I had never tried to learn code before out of fear that I wasn’t ‘techy enough’ and probably not smart enough — I was a Mathlete, but I spent most of my time making doodles with the DRAW function of my TI89. Every time I finish a Code School lesson, I feel like I prove that fear wrong. I truly appreciate you making an accessible resource.”</p>
                        <div class="clint">
                            <div class="img">
                                <img src="{{asset('images/Clint.png')}}">
                            </div>
                            <p>Anne Bertucio</p>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </section>


  
  
     <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://player.vimeo.com/video/58385453?badge=0" data-target="#myModal">
  Play Vimeo Video
</button> -->

<!-- Modal -->
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