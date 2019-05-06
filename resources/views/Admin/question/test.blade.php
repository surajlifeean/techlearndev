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

                      {{Form::open(['route' => 'add-question-to-test','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      

                      
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Enter Test Details </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

        <div class="md-form mb-5">
          <i class="fa fa-angle-double-down prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form3">Exam Category</label>
          
           {{Form::select('exam_lists_id',$examList,null,['id'=>'exam_lists_id'])}}  

        </div>

        <div class="md-form mb-5">
          <i class="fa fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form3">Test Title</label>
          <input type="text" id="title" class="form-control validate" required>

        </div>

        <div class="md-form mb-4">
          <i class="fa fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form2">Test Description</label>
          <input type="test" id="description" class="form-control validate" required>
        </div>

        <div class="md-form mb-4">
          <i class="fa fa-book prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form2">Total Marks</label>
          <input type="test" id="marks" class="form-control validate" required>
        </div>

        <div class="md-form mb-4">
          <i class="fa fa-clock-o prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form2">Duration</label>
          <input type="test" id="duration" class="form-control validate" required>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-indigo addQuestion">Submit</button>
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