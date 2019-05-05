@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('question.index')}}">Question management</a></li>
                <li><a href="{{route('question.create')}}">Add Question</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Add Question</span>
                      </header>

                      
                 
                     
                      <header class="panel-heading">
                        <strong>Enter The Question</strong>
                      </header>
                      {{Form::open(['route' => 'question.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Question Type</label>
                            {{Form::select('question_types_id',$qtype)}} 
                        </div>
<!--                          <div class="form-group">
                          <label class="col-sm-3 control-label">Course Caption</label>
                          <div class="col-sm-9">
                            <input type="text" name="caption" class="form-control"  data-required="true" placeholder="Course Caption" required>   
                          </div>
                        </div> -->
                         <div class="line line-dashed line-lg pull-in"></div>
                       


   

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Question</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea class="summernote" name="question" class="form-control" required></textarea> 
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
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Option-1</label>
                          <div class="col-sm-9">
                            <textarea class="summernote" name="Option[]" class="form-control" required></textarea> 
                          </div>

                          <label class="col-sm-3 control-label">Check for correctness</label>
                          {{Form::checkbox('solution', '0', false,['required'=>'required'])}}
                        </div>

                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Option-2</label>
                          <div class="col-sm-9">
                            <textarea class="summernote" name="Option[]" class="form-control" required></textarea> 
                          </div>
                        <label class="col-sm-3 control-label">Check for correctness</label>
                      {{Form::checkbox('solution', '1', false,['required'=>'required'])}}
                        </div>

                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Option-3</label>
                          <div class="col-sm-9">
                            <textarea class="summernote" name="Option[]" class="form-control" required></textarea> 
                          </div>
                        <label class="col-sm-3 control-label">Check for correctness</label>
                        {{Form::checkbox('solution', '2', false,['required'=>'required'])}}  
                        </div>

                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Option-4</label>
                          <div class="col-sm-9">
                            <textarea class="summernote" name="Option[]" class="form-control" required></textarea> 
                          </div>
                        <label class="col-sm-3 control-label">Check for correctness</label>{{Form::checkbox('solution', '3', False,['required'=>'required'])}}  
                        </div>


                      <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Explanation</label>
                          <div class="col-sm-9">
                            <textarea class="summernote" name="explanation" class="form-control" required></textarea> 
                          </div>
                        </div>

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
                          <label class="col-sm-3 control-label">Single/Multiple</label>
                          <div class="col-sm-9">
                            <select name="solution_type" required>
                         <option value="">Type</option>
                         <option value="multiple">Multiple</option>
                         <option value="single">Single</option>
                           </select>

                          </div>
                         </div>

                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        

                     

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
        $('.summernote').summernote();
    });
  </script>


@endsection