@extends('adminmain')

@section('content')

{{dump($users)}}
<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">User Management</a></li>
                <li><a href="{{route('course-management.create')}}">Add User</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Edit Users</span>
                      </header>

                      
                 
                     
                      <!-- <header class="panel-heading">
                        <strong>Enter The Course Details</strong>
                      </header> -->
                      {{Form::model($users,['route' =>['users.update',$users->id],'method' =>'PUT', 'files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                        <div class="form-group">

                          <label class="col-sm-3 control-label">User Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="title" class="form-control"  data-required="true" placeholder="Course Title" value="{{$users->title}}" required>   
                          </div>
                        </div>
                         <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">User Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="user_" class="form-control"  data-required="true" placeholder="Course Caption" value="{!!$users->fname!!}&nbsp;{!!($users->lname)!!}" required>   
                          </div>
                        </div> -->
                         <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label">First Name</label>
                          <div class="col-sm-3">
                            <input type="text" name="price"  value="{{$users->price}}" class="form-control" placeholder="First Name" required>
                          </div>


                          <label class="col-sm-3 control-label">Last Name</label>
                          <div class="col-sm-3">
                            <input type="text" name="duration"  value="{{$users->duration}}" class="form-control" placeholder="Duration" required>
                          </div>
                          </div>

                        </div>

                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">Demo Video Link</label>
                          <div class="col-sm-9">
                            <input type="text" name="video_link" class="form-control"  data-required="true" value="{{$users->video_link}}" placeholder="Video Link" required>   
                          </div>
                        </div> -->

                        <div class="form-group">
                          <label class="col-sm-3 control-label">User Address</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea class="summernote" name="address" class="form-control" required>{!!$users->address!!}</textarea> 
                          </div>
                        </div>

                          <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Requirements</label>
                            <div class="col-sm-9">
                              <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea> 
                            </div>
                          </div> -->


                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">Description</label>
                          <div class="col-sm-9">
                            
                            <textarea class="summernote" name="description" class="form-control" required>{!!$users->description!!}</textarea> 
                          </div>
                        </div> -->

                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">Set Featured</label>
                          <div class="col-sm-9">
                          Yes:{{Form::radio('set_featured', 'Y')}}
                          No:{{Form::radio('set_featured', 'N')}}

                          </div>
                        </div> 
                        <div class="line line-dashed line-lg pull-in"></div> -->
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
                       <!--  <div class="form-group">
                          <label class="col-sm-3 control-label">Images(Min Dimension:1925x725)</label>
                          <div class="col-sm-9">

                            <div class="input_fields_wrap">
                              
                              
                                <div style="margin-bottom:10px;">
                                     <input type="file" name="image_name" class="GalleryImage" id="img0" /> &nbsp 
                                </div>

                            </div>      
                       </div>
                     </div> -->

                     <div class="line line-dashed line-lg pull-in"></div>
                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">Image List Thumbnail(Min Dimension:318x174)</label>
                          <div class="col-sm-9">

                            <div class="input_fields_wrap">
                                
                                
                                  <div style="margin-bottom:10px;">
                                       <input type="file" name="image_thumbnail" class="GalleryImage" id="img1" /> &nbsp 
                                  </div>

                           </div>      
                       </div>
                     </div> -->
                     
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