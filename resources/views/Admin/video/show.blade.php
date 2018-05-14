@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">Course Management</a></li>
               
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Show Video</span>
                      </header>

                      
                 
                     
                      <header class="panel-heading">
                        <strong>Show The Video Details</strong>
                      </header>
                      {{Form::open(['route' => 'video-management.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Video Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" value="{!!($videos->title)!!}"  data-required="true" placeholder="Video Title" required>   
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Video Caption</label>
                          <div class="col-sm-9">
                            <input type="text" name="caption" class="form-control" value="{!!($videos->caption)!!}" data-required="true" placeholder="Video Caption" required>   
                          </div>
                        </div>
                         <div class="line line-dashed line-lg pull-in"></div>
                        
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Video Link</label>
                          <div class="col-sm-9">
                            <input type="text" name="video_link" class="form-control" value="{!!($videos->video_link)!!}"  data-required="true" placeholder="Video Link" required>   
                          </div>
                        </div>
                      
                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-9">
                            <input type="text" name="video_link" class="form-control" value="@if(($videos->status)=='A') Active @else Inactive @endif"  data-required="true" placeholder="Video Link" >   

                          </div>
                         </div>

                  <!-- <footer class="panel-footer text-right bg-light lter">
                       
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                        <a href="{{url('/admin/course-management')}}" class="btn btn-danger">Cancel</a>
                      </footer> -->


                     </div>

                     {{Form::close()}}
                      
                      
          

</section>
</section>
</section>

@endsection


@section('scripts')

 <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
<script type="text/javascript">
  $(document).ready(function(){

    $('form input').attr('readonly', 'readonly');
    $('.course-form textarea').attr('readonly', 'readonly');


  });
  
</script>

@endsection