@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">Course Management</a></li>
                <li><a href="{{route('course-management.index')}}">Course List</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Course Listing</span>
                      </header>

                       <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                      <!-- <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a> -->
                      <div class="btn-group">
                       <a href="{{route('course-management.index')}}"> <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button></a>
                        <button type="button" class="btn btn-sm btn-default delete-many" title="Remove"><i class="fa fa-trash-o"></i></button>

                          &nbsp;&nbsp;
                        <a href="" class="active-status" aria-label="Left Align" onclick="changebulkstatus('Y')"  title="Deactivate Newsletter Subscription">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </a>
                 
                  &nbsp;&nbsp;
                  <a href="" class="inactive-status" aria-label="Left Align" onclick="changebulkstatus('N')"  title="Activate Newsletter Subscription">
                       <i class="fa fa-unlock" aria-hidden="true"></i>
                      </a>
                      </div>
                      <a href="{{route('course-management.create')}}" class="btn btn-sm btn-default"><i class="fa fa-plus"></i>Add New Course</a>
                    </div>

                    <form action="" method="get">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                   
                      <input type="text" class="input-sm form-control" name="search" value=""  placeholder="Enter Course Title">
                        <span class="input-group-btn">
                            
                          <button class="btn btn-sm btn-default" type="submit">Go!</button>
   
                        </span>
                      
                      </div>
                    </div>
                    </form>
                  </div>
                </header>



                
                <section class="scrollable wrapper w-f">
                  <section class="panel panel-default">
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none">
                        <thead>
                          <tr>
                            <th width="20"><input type="checkbox" value="" class="checkAll"></th>
                            <!-- <th width="20"></th> -->
                            <th>Title</th>
                            <th class="th-sortable" data-toggle="class">Price
                            </th>
                            <th>Caption</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Video Link</th>
                            <th>Duration</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

				@foreach($courses as $value)

         @php

                    $url = $value->video_link;
                    $urlParts = explode("/", parse_url($url, PHP_URL_PATH));
                    $videoId = (int)$urlParts[count($urlParts)-1];
                    

            @endphp
                          <tr>

                            <td><input type="checkbox" name="del[]" value="{{$value->id}}" id="checked"></td>

                            <td>{{$value->title}}</td>
                            <td>{{$value->price}}</td>
                            <td>{{$value->caption}}
                            <td>{!!substr($value->description,0,300)!!}</td>
                            
                            <td><img src="{{asset('uploaded_images/courses/'.$value->image)}}" style="width: 200px;"></td>

                            <td>

            @php

                    $url = $value->video_link;
                    $urlParts = explode("/", parse_url($url, PHP_URL_PATH));
                    $videoId = (int)$urlParts[count($urlParts)-1];
                    

            @endphp
              <button type="button" class="button-common btn btn-primary video-btn" data-toggle="modal" data-src="https://player.vimeo.com/video/{{$videoId}}?title=0&byline=0&portrait=0&transparent=0" data-target="#myModal">
                         <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        

                            
                            

                            </td>

                            <td>{{$value->duration}}</td>
                           
                            <td>{{date('jS M, Y', strtotime($value->created_at))}}</td>
                            <td>
                                @if($value->status=='A')
           <a href="javascript:void(0)" class="active-status" aria-label="Left Align" onclick="changestatus('A',{{$value->id}})" data-toggle="tooltip" title="Deactivate Product">
                       <i class="fa fa-unlock" aria-hidden="true"></i>
                      </a>
                 
                  @else
                  <a href="javascript:void(0)" class="inactive-status" aria-label="Left Align" onclick="changestatus('I',{{$value->id}})" data-toggle="tooltip" title="Activate Product">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </a>
                   

                  @endif
<!-- 
                     {!! Html::LinkRoute('course-management.edit',null,array($value->id),array('class'=>"fa fa-pencil-square-o",'data-toggle'=>"tooltip",'title'=>"Edit Course"))!!} -->
                      <a href="{{route('course-management.edit',$value->id)}}" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i></a>

                        <a href="#" class="delete-icon" id="{{$value->id}}" aria-label="Left Align" data-toggle="tooltip" title="Delete Course">
                			 <i class="fa fa-trash-o" aria-hidden="true"></i>
             					</a>  <!-- delete icon that submits the form -->
                                             
             					 

                        <a href="{{route('course-management.show',$value->id)}}" data-toggle="tooltip" title="Course Details"><i class="fa fa-search-plus"></i></a>

                            </td>
                           
                          </tr>

                    {!! Form::open(['route'=>['course-management.destroy',$value->id], 'method'=>'DELETE','class'=>'delete-Course','id'=>'delete'.$value->id])!!}
                    {!!Form::close()!!}



                          @endforeach
                        
                        </tbody>
                      </table>
                    </div>
                  </section>
                </section>

{!!$courses->links()!!}


<div> Showing {!!$courses->count()!!}|{!!$courses->total()!!}</div>
    
                      
                 
                     


</section>
</section>
</section>

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




<script type="text/javascript">
  
  $('.delete-icon').click(function(e){
    alert();
    e.preventDefault();
    var id=$(this).attr('id');
   
    var r = confirm("Are You Sure You Wanna Delete The Course?");
    if (r == true) {
       $("#delete"+id).submit();
    } 
    
  });
  
</script>

<script>
var maxid=0;
$(document).ready(function(){
    
    $("input[type='checkbox']:not(.checkAll)").each(function(){
      maxid++;
    })
});
</script>




<script type="text/javascript">
var id;

$(".checkAll").change(function(){
  
  if($(this).is(':checked')){

    $("input[type='checkbox']").prop('checked', true);

  }else{
    $("input[type='checkbox']").prop('checked', false);
  }
  id = $("input[type='checkbox']:not(.checkAll):checked").map(function() {
                       return this.value;
                   }).get().join();

});

$("input[type='checkbox']:not(.checkAll)").change(function(){

  id = $("input[type='checkbox']:not(.checkAll):checked").map(function() {
                       return this.value;
                   }).get().join();
  if(!id)
    $(".checkAll").prop('checked', false);

  
   var arr=id.split(",");
    var mid=arr.length;
   

  if(maxid==mid)
   $(".checkAll").prop('checked', true);
  if(maxid>mid)
    $(".checkAll").prop('checked', false);

  
});

</script>
@endsection