
 @extends('main')

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
            <div class="flex">
                <div class="img-flex">
                    <img src="{{asset('images/a.png')}}">
                </div>
                <div class="txt-flex">
                    <h4>HTML</h4>
                    <p>HTML is a standardized langauge to design beautiful websites and graphics on internet.</p>
                    <div class="botton-flex">
                        <a href="#" class="button-common">Demo</a>
                        <a href="#" class="button-common">Try A Quiz</a>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="txt-flex">
                    <h4>CSS</h4>
                    <p>CSS is a stylesheet language used to design look and give feel to markup languages.</p>
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
            </div>
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
                </ul>
            </div>
        </div>
    </section>

    @endsection