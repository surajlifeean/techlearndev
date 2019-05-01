@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('exam-list.index')}}">Exam List management</a></li>
                <li><a href="{{route('exam-list.create')}}">Add Exam Item</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Add Exam Item</span>
                      </header>

                      
                 
                     
                      <header class="panel-heading">
                        <strong>Enter The Exam Item Details</strong>
                      </header>
                      {{Form::open(['route' => 'exam-list.store','files' => true, 'class'=>'form-horizontal exam-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                        <div class="form-group">
                          <label class="col-sm-3 control-label">exam Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="title" class="form-control"  data-required="true" placeholder="exam Title" required>   
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">exam Category</label>
                          <div class="col-sm-9">
                              {{Form::select('exam_categories_id',$examCategory)}}  
                          </div>
                        </div>
                         <div class="line line-dashed line-lg pull-in"></div>
                       


   

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Description</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea class="summernote" name="description" class="form-control" required></textarea> 
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
                            <select name="status" required>
                         <option value="">select</option>
                         <option value="A">Active</option>
                         <option value="I">Inactive</option>
                           </select>

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