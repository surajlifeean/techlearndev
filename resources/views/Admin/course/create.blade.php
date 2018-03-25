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
                      {{Form::open(['route' => 'course-management.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Course Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" class="form-control"  data-required="true" placeholder="Product Title" required>   
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Course Caption</label>
                          <div class="col-sm-9">
                            <input type="text" name="caption" class="form-control"  data-required="true" placeholder="Product Title" required>   
                          </div>
                        </div>
                         <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label"> Price</label>
                          <div class="col-sm-9">
                            <input type="text" name="price"  class="form-control" placeholder="Starting Price" required>
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
                            <select name="status" required>
                         <option value="">select</option>
                         <option value="A">Active</option>
                         <option value="I">Inactive</option>
                           </select>

                          </div>
                         </div>
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Images(Min Dimension:1925x725)</label>
                          <div class="col-sm-9">

            <div class="input_fields_wrap">
                  <button class="add_field_button glyphicon glyphicon-plus btn btn-primary" aria-hidden="true" style="margin-bottom:10px;">Add More Images</button><br>
                
                  <div style="margin-bottom:10px;">
                       <input type="file" name="image_name[]" class="GalleryImage" id="img0" required /> &nbsp 
                  </div>

           </div>      
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