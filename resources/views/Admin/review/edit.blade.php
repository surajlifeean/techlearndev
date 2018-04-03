@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">Review Management</a></li>
                <li><a href="{{route('course-management.create')}}">Add Review</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Add Review</span>
                      </header>

                      
                 
                     
                      <header class="panel-heading">
                        <strong>Enter The Review Details</strong>
                      </header>
                      {{Form::model($review,['route' =>['review-management.update',$review->id],'method'=>'PUT','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Review On</label>
                          <div class="col-sm-9">
<!--                             <input type="text" name="title" class="form-control"  data-required="true" placeholder="Course Title" required> -->   

                          {!!Form::select('review_on',$reviewon,null,['class'=>'form-control'])!!}
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Reviewer's Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="review_by"  value="{{$review->review_by}}" class="form-control"  data-required="true" placeholder="Course Review" required>   
                          </div>
                        </div>
                         <div class="line line-dashed line-lg pull-in"></div>
                      <!--   <div class="form-group">
                          <label class="col-sm-3 control-label"> Price</label>
                          <div class="col-sm-9">
                            <input type="text" name="price"  class="form-control" placeholder="Starting Price" required>
                          </div>
                        </div> -->

                        

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Comments</label>
                          <div class="col-sm-9">
                          
                            <textarea id="summernote" name="comment" class="form-control" required>{!!$review->comment!!}</textarea> 
                          

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
                  
                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-9">
                         {!!Form::select('status',['A'=>'Active','I'=>'Inactive'],null,['placeholder'=>'select status'])!!}

                          </div>
                         </div>
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Reviewer's Images(Min Dimension:90x90)</label>
                          <div class="col-sm-9">

            <div class="input_fields_wrap">
                
                
                  <div style="margin-bottom:10px;">
                       <input type="file" name="image_name" class="GalleryImage" id="img0"/> &nbsp 
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


@section('scripts')

 <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>


@endsection