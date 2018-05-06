@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">Course Management</a></li>
                <li><a href="{{route('course-management.create')}}">Add Course</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Add Video</span>
                      </header>

                      
                 
                     
                      <header class="panel-heading">
                        <strong>Enter The Video Details</strong>
                      </header>
                      {{Form::open(['route' => 'video-management.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Video Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="title" class="form-control"  data-required="true" placeholder="Video Title" required>   
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Video Caption</label>
                          <div class="col-sm-9">
                            <input type="text" name="caption" class="form-control"  data-required="true" placeholder="Video Caption" required>   
                          </div>
                        </div>
                         <div class="line line-dashed line-lg pull-in"></div>
                        
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Video Link</label>
                          <div class="col-sm-9">
                            <input type="text" name="video_link" class="form-control"  data-required="true" placeholder="Video Link" required>   
                          </div>
                        </div>
                      
                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-9">
                            <select name="status" required>
                               <option value="">select</option>
                               <option value="A">Active</option>
                               <option value="I">Inactive</option>
                            </select>

                          </div>
                         </div>

                  <footer class="panel-footer text-right bg-light lter">
                       
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                        <a href="{{url('/admin/course-management')}}" class="btn btn-danger">Cancel</a>
                      </footer>


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


@endsection