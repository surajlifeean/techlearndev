@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('exam-list.index')}}">Exam management</a></li>
                <li><a href="{{route('exam-list.create')}}">Edit Exam Item</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Edit Exam Item</span>
                      </header>

                      
                 
                     
                      <header class="panel-heading">
                        <strong>Enter The Item</strong>
                      </header>

                       {{Form::model($examCategory,['route' =>['exam-list.update',$examCategory->id],'method' =>'PUT', 'files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}

                      <div class="panel-body">                   
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Item Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" value="{{$examCategory->title}}" data-required="true" placeholder="Exam Title" required>   
                          </div>
                        </div>
<!--                          <div class="form-group">
                          <label class="col-sm-3 control-label">Course Caption</label>
                          <div class="col-sm-9">
                            <input type="text" name="caption" class="form-control"  data-required="true" placeholder="Course Caption" required>   
                          </div>
                        </div> -->
                         <div class="line line-dashed line-lg pull-in"></div>
                             <div class="form-group">
                          <label class="col-sm-3 control-label">Exam Category</label>
                          <div class="col-sm-9">
                           <!--  <select name="status" required>
                         <option value="">select</option>
                         <option value="A">Active</option>
                         <option value="I">Inactive</option>
                           </select> -->
                             {!!Form::select('exam_categories_id',$category,$examCategory->exam_categories_id)!!}  

                          </div>
                         </div>
                    


<div class="line line-dashed line-lg pull-in"></div>

   

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Description</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea class="summernote" name="description" class="form-control" required>{!!$examCategory->description!!}</textarea> 
                          </div>
                        </div>


<!--                         <div class="form-group">
                          <label class="col-sm-3 control-label">Set Featured</label>
                          <div class="col-sm-9">
                          Yes:{{Form::radio('set_featured', 'Y')}}
                          No:{{Form::radio('set_featured', 'N')}}

                          </div>
                        </div> -->
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
                           <!--  <select name="status" required>
                         <option value="">select</option>
                         <option value="A">Active</option>
                         <option value="I">Inactive</option>
                           </select> -->
                             {!!Form::select('status', ['A' => 'Active', 'I' => 'Inactive'],null, ['placeholder' => 'Select'])!!}

                          </div>
                         </div>
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        

                     

                  <footer class="panel-footer text-right bg-light lter">
                       
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                        <a href="{{url('/admin/exam-list')}}" class="btn btn-danger">Cancel</a>
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