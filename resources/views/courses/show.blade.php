@extends('main')
@section('stylesheets')


<link rel="stylesheet" type="text/css" href="{{asset('css/starrr.css')}}" />


@endsection

@section('content')
@php $img=asset('images/banne-inner.jpg');  @endphp
<section class="banner-sleek" style="background-image:url({{$img}}); background-size: cover;">
  <div class="banner-text text-center">
    <div class="banner-container">
      <h3>{{$course->title}}</h3>
      <p> {{$course->caption}} </p>
      <div class="button-set"> <a href="#" class="button-common-white button-common">Enroll Now</a> </div>
    </div>
  </div>
</section>

<section class="courses-sec cources-detail-section">
  <div class="container">
    <div class="row courese-details-top">
      <div class="col-md-8">
        <div class="card course-details-card ">
          <div class="card-body">
            <h3 class="mb-3">What Will I Learn?</h3>
            <ul>
              <li>120 detailed videos about ethical hacking & computer security</li>
              <li> Learn about the different fields of ethical hacking </li>
              <li> nstall Kali Linux - a penetration testing operating system </li>
              <li> Learn linux basics </li>
              <li> Learn Network Penetration Testing </li>
              <li>120 detailed videos about ethical hacking & computer security</li>
              <li> Learn about the different fields of ethical hacking </li>
              <li> nstall Kali Linux - a penetration testing operating system </li>
              <li> Learn linux basics </li>
              <li> Learn Network Penetration Testing </li>
			  <li> Learn about the different fields of ethical hacking </li>
              <li> nstall Kali Linux - a penetration testing operating system </li>	
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card course-proress">
          <canvas id="doughnut-chart"></canvas>
			
		  <div class="progress-label text-center">
				<p>Courses Complete</p>
			    <span style="color:#1040a3"><strong>70/100 (70%)</strong></span> <br> <br>	
			  
			    <a href="profile.html" class="button-common">My Account</a>
		  </div>	
        </div>
      </div>
    </div>
	  
	  
	<div class="course-description row mt-5">
	  	<div class="col-md-8">
			<h3>Requirements</h3>
			
			<ul class="arrow-list">
				<li>
					Basic IT Skills
				</li>
				
				<li>
					Wireless adapter (for the wifi cracking section ONLY) - like ALFA AWUS036NHA Or anything with an Atheros chipset (more info provided in the course).
				</li>
			</ul>
			
			
			<hr>
			
			
			<h3>Description</h3>
			
			<p>

				{{$course->description}}
			</p>
		
			
			<br>
			
			<hr>
			
			<h3> Course Overview</h3>
			
			<div class="courseoverview">
			 <div class="single-oevrview">
				<div class="overview-image">
				 	<img src="{{asset('images/img-circle.jpg')}}" alt="">
			    </div>
				 
				<div class="overview">
				    <div class="meta">
						<a href="#">LEVEL 1</a>   <span>2 Videos | 11 Challenges</span>
					</div> 
					
					<h5>Responding With Data</h5>
					
					<p>Discover how to respond to client requests with text and HTML rendered responses.</p>
				 
				</div>
				 
				 
				 
			 </div>
			
			 
			</div>
			
			<div class="courseoverview">
			 <div class="single-oevrview">
				<div class="overview-image">
				 	<img src="{{asset('images/img-circle.jpg')}}" alt="">
			    </div>
				 
				<div class="overview">
				    <div class="meta">
						<a href="#">LEVEL 1</a>   <span>2 Videos | 11 Challenges</span>
					</div> 
					
					<h5>Responding With Data</h5>
					
					<p>Discover how to respond to client requests with text and HTML rendered responses.</p>
				 
				</div>
				 
				 
				 
			 </div>
			
			 
			</div>
			
			<div class="courseoverview">
			 <div class="single-oevrview">
				<div class="overview-image">
				 	<img src="{{asset('images/img-circle.jpg')}}" alt="">
			    </div>
				 
				<div class="overview">
				    <div class="meta">
						<a href="#">LEVEL 1</a>   <span>2 Videos | 11 Challenges</span>
					</div> 
					
					<h5>Responding With Data</h5>
					
					<p>Discover how to respond to client requests with text and HTML rendered responses.</p>
				 
				</div>
				 
				 
				 
			 </div>
			
			 
			</div>
			
			<div class="courseoverview">
			 <div class="single-oevrview">
				<div class="overview-image">
				 	<img src="{{asset('images/img-circle.jpg')}}" alt="">
			    </div>
				 
				<div class="overview">
				    <div class="meta">
						<a href="#">LEVEL 1</a>   <span>2 Videos | 11 Challenges</span>
					</div> 
					
					<h5>Responding With Data</h5>
					
					<p>Discover how to respond to client requests with text and HTML rendered responses.</p>
				 
				</div>
				 
				 
				 
			 </div>
			
			 
			</div>
			
			<div class="courseoverview">
			 <div class="single-oevrview">
				<div class="overview-image">
				 	<img src="{{asset('images/img-circle.jpg')}}" alt="">
			    </div>
				 
				<div class="overview">
				    <div class="meta">
						<a href="#">LEVEL 1</a>   <span>2 Videos | 11 Challenges</span>
					</div> 
					
					<h5>Responding With Data</h5>
					
					<p>Discover how to respond to client requests with text and HTML rendered responses.</p>
				 
				</div>
				 
				 
				 
			 </div>
			
			 
			</div>
			
			<br>
			<hr>
			<div class="rating-sec">
			 <div class="score-rate clearfix">
				  <h3>Student Feedback</h3>
				 <div class="left-score">
					
					 
				 	<h2>4.6</h2>
					  <div class="starrr" id="total-star"></div>
					  <p>Average Rating </p>
					 
				   </div>
				 
				 <div class="right-score">
					<div class="rate-progtress clearfix"> 
						<div class="progress">
						  <div class="progress-bar" style="width:70%"></div>
						</div>
						<div class="starrr" id="59"></div>
						<span>59%</span>
				   </div>
					<div class="rate-progtress clearfix"> 
						<div class="progress">
						  <div class="progress-bar" style="width:30%"></div>
						</div>
						<div class="starrr" id="31"></div>
						<span>31%</span>
				   </div>
					 
					<div class="rate-progtress clearfix"> 
						<div class="progress">
						  <div class="progress-bar" style="width:15%"></div>
						</div>
						<div class="starrr" id="09"></div>
						<span>09%</span>
				   </div>
					<div class="rate-progtress clearfix"> 
						<div class="progress">
						  <div class="progress-bar" style="width:7%"></div>
						</div>
						<div class="starrr" id="01"></div>
						<span>01%</span>
				   </div>
				 <div class="rate-progtress clearfix"> 
						<div class="progress">
						  <div class="progress-bar" style="width:0%"></div>
						</div>
						<div class="starrr" id="0"></div>
						<span> <i class="fa fa-angle-left"></i> 0% </span>
				   </div>
					 
					 
					 
				 </div>	 
			   	
			 </div>
			
			
			</div>
			<div class="review-section">
			  	<h5>Reviews</h5>
			
				
				<ul class="review-list clearfix">
					<li>
						<div class="review-left">
							<figure>
								<img src="{{asset('images/review-img.jpg')}}" alt="">
							</figure>
							<div class="review-meta">
								<em>13 days ago</em>
								<a href="#">Vincent Casella</a>
							</div>
						</div>
						<div class="review-right">
							<div class="star" data-attr="5"></div>
							<p>This instructor clearly is passionate about what he does and it shows. The lectures are thorough and very well explained for my style of learning. I have a deeper understanding on all the subjects he covered and feel totally satisfied about taking this particular course. Great Job Zaid! I'll be recommending this course to anyone who's interested for sure...</p>
							
							<div class="review-meta">
								<span>Was this review helpful?</span>
								
									<a href="#" class="button">Yes</a>
									<a href="#" class="button">NO</a>
									<a href="#" class="no-border button"> Report</a>
								
							</div>
						</div>	
					</li>
					
					<li>
						<div class="review-left">
							<figure>
								<img src="{{asset('images/review-img.jpg')}}" alt="">
							</figure>
							<div class="review-meta">
								<em>13 days ago</em>
								<a href="#">Vincent Casella</a>
							</div>
						</div>
						<div class="review-right">
							<div class="star" data-attr="5"></div>
							<p>This instructor clearly is passionate about what he does and it shows. The lectures are thorough and very well explained for my style of learning. I have a deeper understanding on all the subjects he covered and feel totally satisfied about taking this particular course. Great Job Zaid! I'll be recommending this course to anyone who's interested for sure...</p>
							
							<div class="review-meta">
								<span>Was this review helpful?</span>
								
									<a href="#" class="button">Yes</a>
									<a href="#" class="button">NO</a>
									<a href="#" class="no-border button"> Report</a>
								
							</div>
						</div>	
					</li>
					
					<li>
						<div class="review-left">
							<figure>
								<img src="{{asset('images/review-img.jpg')}}" alt="">
							</figure>
							<div class="review-meta">
								<em>13 days ago</em>
								<a href="#">Vincent Casella</a>
							</div>
						</div>
						<div class="review-right">
							<div class="star" data-attr="5"></div>
							<p>This instructor clearly is passionate about what he does and it shows. The lectures are thorough and very well explained for my style of learning. I have a deeper understanding on all the subjects he covered and feel totally satisfied about taking this particular course. Great Job Zaid! I'll be recommending this course to anyone who's interested for sure...</p>
							
							<div class="review-meta">
								<span>Was this review helpful?</span>
								
									<a href="#" class="button">Yes</a>
									<a href="#" class="button">NO</a>
									<a href="#" class="no-border button"> Report</a>
								
							</div>
						</div>	
					</li>
					
					<div class="text-center"><a href="#" class="button-common">Load More</a></div>
				</ul>
			</div>
			
		</div>
	 	<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h3>FILTER COURSES BY:</h3>
					<ul class="courser-filter">
						<li><a href="#">HTML</a></li>
						<li><a href="#">CSS</a></li>
						<li><a href="#">HTML 5</a></li>
						<li><a href="#">CSS 3</a></li>
						<li><a href="#">Java</a></li>
						<li><a href="#">PHP</a></li>
						<li><a href="#">Python</a></li>
						<li><a href="#">.Net</a></li>
						<li><a href="#">IOS</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>  
  </div>
</section>



@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('js/starrr.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
	
        $(document).ready(function() {
			
			$('#total-star').starrr({
				   readOnly: true,
				   rating: 5
				});
			$('#59').starrr({
				   readOnly: true,
				   rating: 4
				});
			$('#09').starrr({
				   readOnly: true,
				   rating: 2
				});
			$('#31').starrr({
				   readOnly: true,
				   rating: 3
				});
			$('#01').starrr({
				   readOnly: true,
				   rating: 1
				});
			 $('#0').starrr({
				   readOnly: true,
				   rating: 0
				}); 
			
			 var score = $('.star').attr('data-attr');
			 $('.star').starrr({
				   readOnly: true,
				   rating: score
				   
				});
          new Chart(document.getElementById("doughnut-chart"), {
				type: 'doughnut',
			  
				data: {
				  labels: ["Comlpleted", "Yet to Learn"],
				  datasets: [
					{
					  label: "Course Preogress",
					  backgroundColor: ["#1040a3", "#ffffff"],
					  data: [70,30]
					}
				  ]
				},
				options: {
					
					layout:{
						padding:10
					  },
					
				legend:
					{
						display: false
					},
				  
				  maintainAspectRatio: false,
				  title: {
					display: true,
					position:'bottom',
					fontColor:'#000',
					display: false,
					text: 'Course Progress'
				  },
				   cutoutPercentage: 85,
                    outerRadius: 10,
				}
			});
			
        });

    </script>

@endsection