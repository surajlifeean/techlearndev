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
                        <span class="h4">Add Course</span>
                      </header>

                      
                 
                     
                      <header class="panel-heading">
                        <strong>Enter The Course Details</strong>
                      </header>
                      {{Form::model($course,['route' =>['course-management.update',$course->id],'method' =>'PUT', 'files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                        <div class="form-group">

                          <label class="col-sm-3 control-label">Course Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="title" class="form-control"  data-required="true" placeholder="Course Title" value="{{$course->title}}" required>   
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Course Caption</label>
                          <div class="col-sm-9">
                            <input type="text" name="caption" class="form-control"  data-required="true" placeholder="Course Caption" value="{{$course->caption}}" required>   
                          </div>
                        </div>
                         <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label"> Price</label>
                          <div class="col-sm-3">
                            <input type="text" name="price"  value="{{$course->price}}" class="form-control" placeholder="Starting Price" required>
                          </div>


                          <label class="col-sm-3 control-label">Duration</label>
                          <div class="col-sm-3">
                            <input type="text" name="duration"  value="{{$course->duration}}" class="form-control" placeholder="Duration" required>
                          </div>
                          </div>

                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Demo Video Link</label>
                          <div class="col-sm-9">
                            <input type="text" name="video_link" class="form-control"  data-required="true" value="{{$course->video_link}}" placeholder="Video Link" required>   
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">What will I learn?</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea class="summernote" name="whatwillilearn" class="form-control" required>{!!$course->whatwillilearn!!}</textarea> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Requirements</label>
                          <div class="col-sm-9">
                            <textarea class="summernote" name="requirement" class="form-control" required>{!!$course->requirement!!}</textarea> 
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-sm-3 control-label">Description</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea class="summernote" name="description" class="form-control" required>{!!$course->description!!}</textarea> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Set Featured</label>
                          <div class="col-sm-9">
                          Yes:{{Form::radio('set_featured', 'Y')}}
                          No:{{Form::radio('set_featured', 'N')}}

                          </div>
                        </div>
                        <div class="line line-dashed line-lg pull-in"></div>
                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">No of Bedroom</label>
                          <div class="col-sm-9">
                            <input type="number" min="1" step="1" name="no_of_bedroom" required />
                          </div>
                        </div> -->
                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-9">

                           {!!Form::select('status', ['A' => 'Active', 'I' => 'Inactive'],null, ['placeholder' => 'Select'])!!}

                          </div>
                         </div>
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Images(Min Dimension:1925x725)</label>
                          <div class="col-sm-9">

                            <div class="input_fields_wrap">
                              
                              
                                <div style="margin-bottom:10px;">
                                     <input type="file" name="image_name" class="GalleryImage" id="img0" /> &nbsp 
                                </div>

                            </div>      
                       </div>
                     </div>

                     <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Image List Thumbnail(Min Dimension:318x174)</label>
                          <div class="col-sm-9">

                            <div class="input_fields_wrap">
                                
                                
                                  <div style="margin-bottom:10px;">
                                       <input type="file" name="image_thumbnail" class="GalleryImage" id="img1" /> &nbsp 
                                  </div>

                           </div>      
                       </div>
                     </div>
                     
                  <footer class="panel-footer text-right bg-light lter">
                       
                  <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                 <!--  <a href="{{url('/admin/course-management')}}" class="btn btn-danger">Cancel</a>
 -->

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
        $('.summernote').summernote();
    });
  </script>


@endsection