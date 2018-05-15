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
      <!-- <div class="button-set"> <a href="#" class="button-common-white button-common">Enroll Now</a> </div> -->
    </div>
  </div>
</section>

<section class="courses-sec cources-detail-section">
  <div class="container">
    <div class="row courese-details-top">
      <div class="col-md-8">
        
      		<hr>
			
			<h3> Course Overview</h3>
			
			@foreach($video as $value)
			<div class="courseoverview">
			 <div class="single-oevrview">
				<div class="overview-image">
				 	<img src="{{asset('images/img-circle.jpg')}}" alt="">
			    </div>
				 
				<div class="overview">
				    <div class="meta">
						<a href="#">LEVEL {{$value->level}}</a>   <span>{{$value->vid}} Videos <!-- | 11 Challenges --></span>
					</div> 
					
					<h5>{{$value->topic_name}}</h5>
					
					<p>{{$value->description}}</p>
				 
				</div>
				 
				 
				 
			 </div>
			
			 
			</div>
			@endforeach
			
			
			<br>
			<hr>







      </div>
      <div class="col-md-4">
        <div class="card course-proress">
          <canvas id="doughnut-chart"></canvas>
			
		  <div class="progress-label text-center">
				<p>Courses Complete</p>
			    <span style="color:#1040a3"><strong>0/100 (0%)</strong></span> <br> <br>	
			  
			    <a href="javascript:void(0)" class="button-common">Rank 4</a>
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
				  labels: ["Completed", "Yet to Learn"],
				  datasets: [
					{
					  label: "Course Progress",
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