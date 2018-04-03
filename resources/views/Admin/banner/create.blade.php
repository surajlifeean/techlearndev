@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">Banner Management</a></li>
                <li><a href="{{route('course-management.create')}}">Add Banner</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Add Banner</span>
                      </header>

                      
                 
                     
                      {{Form::open(['route' => 'banner-management.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                    
                        

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Banner Text</label>
                          <div class="col-sm-9">  
                            <textarea id="summernote" name="banner_text" class="form-control" required></textarea> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-9">
                          Yes:{{Form::radio('status', 'A')}}
                          No:{{Form::radio('status', 'I')}}

                          </div>
                        </div>
                        <div class="line line-dashed line-lg pull-in"></div>
                       <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Banner Images(Min Dimension:1920x660)</label>
                          <div class="col-sm-9">

            <div class="input_fields_wrap">
                
                
                  <div style="margin-bottom:10px;">
                       <input type="file" name="image_name" class="GalleryImage" id="img0" required /> &nbsp 
                  </div>

           </div>      
                       </div>
                     </div>
                  <footer class="panel-footer text-right bg-light lter">
                       
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                        <a href="{{url('/admin/banner-management')}}" class="btn btn-danger">Cancel</a>
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