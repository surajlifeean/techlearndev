@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('question.index')}}">Question Management</a></li>
                <li><a href="{{route('question.index')}}">list</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Question Listing</span>
                      </header>

                       <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                      <!-- <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a> -->
                      <div class="btn-group">
                       <a href="{{route('question.index')}}"> <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button></a>
                        <button type="button" class="btn btn-sm btn-default delete-many" title="Remove"><i class="fa fa-trash-o"></i></button>

                          &nbsp;&nbsp;
                        <a href="javascript:void(0)" class="active-status" aria-label="Left Align" onclick="changebulkstatus('A')"  title="Deactivate course">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </a>
                 
                  &nbsp;&nbsp;
                  <a href="javascript:void(0)" class="inactive-status" aria-label="Left Align" onclick="changebulkstatus('I')"  title="Activate course">
                       <i class="fa fa-unlock" aria-hidden="true"></i>
                  </a>
                  </div>
                      <a href="{{route('question.create')}}" class="btn btn-sm btn-default"><i class="fa fa-plus"></i>Add Question</a>
                  </div>
                  <div>
<!--                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-default" aria-label="Left Align" onclick="addQuestiontoTest()"  title="Activate course">
                       <i class="fa fa-plus" aria-hidden="true"></i>
                  Create test</a> -->

                  <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalSubscriptionForm">Create Test</a>


                  </div>

<!--                     <form action="{{route('course-search')}}" method="get">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                   
                      <input type="text" class="input-sm form-control" name="search" value="{{session('search')}}"  placeholder="Search By Banner Text">
                        <span class="input-group-btn">
                            
                          <button class="btn btn-sm btn-default" type="submit">Go!</button>
   
                        </span>
                      
                      </div>
                    </div>
                    </form> -->
                  </div>
                </header>



                
                <section class="scrollable wrapper w-f">
                  <section class="panel panel-default">
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none">
                        <thead>
                          <tr>
                            <th width="20"><input type="checkbox" value="" class="checkAll"></th>
                            <!-- <th width="20"></th> -->
                            <th>Question</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

				@foreach($question as $value)

        
                          <tr>

                            <td><input type="checkbox" name="del[]" value="{{$value->id}}" id="checked"></td>

                            <td>{!!$value->question!!}</td>
                        	
                        	 <td>{{$value->question_type}}</td>
                                                  
                            <td>{{$value->status}}</td>


                           
                            <td>{{date('jS M, Y', strtotime($value->created_at))}}</td>
                            <td>

                  <button class="btn btn-primary btn-rounded formConfirm" data-form="#frmStatus-{{$value->id}}" data-title="Status Change" data-message="Are you sure, you want to change the status ?" >
                                        <?php if($value->status == 'I'){ ?>
                                            <i title="Inactive" style="margin-right: 0;" class="fa fa-lock" aria-hidden="true"></i>
                                        <?php } else { ?>
                                            <i title="Active" style="margin-right: 0;" class="fa fa-unlock" aria-hidden="true"></i>
                                        <?php } ?>
                                    </button>
                                    {!! Form::open(array(
                                            'url' => route('admin.question.statuschange', array($value->id)),
                                            'method' => 'get',
                                            'style' => 'display:none',
                                            'id' => 'frmStatus-' . $value->id,
                                            'status' => 'frmStatus-' . $value->status,
                                        ))
                                    !!}
                                    {!! Form::submit('Submit') !!}
                                    {!! Form::close() !!}

                  
                      <a href="{{route('exam-list.edit',$value->id)}}" class="btn btn-info btn-rounded"><i class="fa fa-pencil-square-o"></i></a>


                        
                        <button class="btn btn-danger btn-rounded formConfirm" data-form="#frmDelete-{{$value->id}}" data-title="Delete banner" data-message="Are you sure, you want to delete this course ?" >
                                        <i title="Delete" style="margin-right: 0;" class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                    {!! Form::open(array(
                                            'url' => route('admin.question.delete', array($value->id)),
                                            'method' => 'get',
                                            'style' => 'display:none',
                                            'id' => 'frmDelete-'.$value->id
                                        ))
                                    !!}
                                    {!! Form::submit('Submit') !!}
                                    {!! Form::close() !!}                    
             					 


                            </td>
                           
                          </tr>


                          @endforeach
                        
                        </tbody>
                      </table>
                    </div>
                  </section>
                </section>

{!!$question->links()!!}


<div> Showing {!!$question->count()!!}|{!!$question->total()!!}</div>
    
   

  <div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
      <div class="modal-body" id="frm_body">Are you sure, you want to delete this Topic ?</div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-danger col-sm-2 pull-right" id="frm_submit">Confirm</button>
        <button type="button" class="btn btn-primary col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Cancel</button>
      </div>
    </div>
  </div>
</div>                         

<!-- model for test -->

<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
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
    </div>
  </div>
</div>
<!-- model for test ends -->                 
                     


</section>
</section>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-body">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="" id="video" frameborder="0" title="Funny Cat Videos For Kids" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" data-ready="true"></iframe>
</div>
        
        
      </div>

    </div>
  </div>
</div> 


    @endsection


    @section('scripts')


<script type="text/javascript">

$(document).ready(function(){



  $('.addQuestion').on('click', function(e) {
  // alert(id);
  if(!id){
    alert("Please Select Some Question to add");
  }
  else{
    
    var title=$("#title").val();
    var description=$("#description").val();
    var marks=$("#marks").val();
    var duration=$("#duration").val();
    var exam_list_id=$("#exam_lists_id").val();

    var r = confirm("Are You Sure You Wanna Add these Questions?");
    if (r == true) {
    console.log(id);
  

    $.ajax({
      
        url:"{{route('add-question-to-test')}}", 
        type:"get",
        data:{IDs:id,title:title,description:description,marks:marks,duration:duration,exam_list_id:exam_list_id},
        success: function(result){
          //alert(result);
          console.log(result);
          //location.reload();
          //location.reload();
          window.parent.location.reload();
        
        $("input[type='checkbox']").prop('checked', false);
    }});

   }//if ends
  }
});



     
  $('.formConfirm').on('click', function(e) {
    //alert();
        e.preventDefault();
        var el = $(this);
        //alert(el);
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
        $('#formConfirm')
        .find('#frm_body').html(msg)
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
  });
  $('#formConfirm').on('click', '#frm_submit', function(e) {
        var id = $(this).attr('data-form');
        //alert(id);
        $(id).submit();
  });
});
</script>
    




<script type="text/javascript">
  
  $('.delete-icon').click(function(e){
    alert();
    e.preventDefault();
    var id=$(this).attr('id');
   
    var r = confirm("Are You Sure You Wanna Delete The Course?");
    if (r == true) {
       $("#delete"+id).submit();
    } 
    
  });
  
</script>

<script>
var maxid=0;
$(document).ready(function(){
    
    $("input[type='checkbox']:not(.checkAll)").each(function(){
      maxid++;
    })
});
</script>




<script type="text/javascript">
var id;

$(".checkAll").change(function(){
  
  if($(this).is(':checked')){

    $("input[type='checkbox']").prop('checked', true);

  }else{
    $("input[type='checkbox']").prop('checked', false);
  }
  id = $("input[type='checkbox']:not(.checkAll):checked").map(function() {
                       return this.value;
                   }).get().join();

});

$("input[type='checkbox']:not(.checkAll)").change(function(){

  id = $("input[type='checkbox']:not(.checkAll):checked").map(function() {
                       return this.value;
                   }).get().join();
  if(!id)
    $(".checkAll").prop('checked', false);

  
   var arr=id.split(",");
    var mid=arr.length;
   

  if(maxid==mid)
   $(".checkAll").prop('checked', true);
  if(maxid>mid)
    $(".checkAll").prop('checked', false);

  
});

</script>


<script type="text/javascript">
  function changebulkstatus(status){
  /*alert(id);*/
  if(!id){
    alert("Please Select Some Items To Activate/Deactivate");
  }
  else{
    var r = confirm("Are You Sure You Wanna Change the status ?");
    if (r == true) {
    console.log(id);
    $.ajax({
        url:"{{route('bulk-course-status')}}", 
        type:"get",
        data:{IDs:id,status:status},
        success: function(result){
          //alert(result);
          console.log(result);
          //location.reload();
          //location.reload();
          window.parent.location.reload();
        
        $("input[type='checkbox']").prop('checked', false);
    }});

   }//if ends
  }
}




$('.delete-many').click(function(){

  if(!id)
    alert("Please Select Some Items To Delete");
  else{
    var r = confirm("Are You Sure You Wanna Delete The Course ?");
    if (r == true) {
     //alert(id);
    $.ajax({
        url:"{{route('delete-course')}}", 
        type:"get",
        data:{IDs:id},
        success: function(result){
      //alert(result);
            
          //location.reload();
           window.parent.location.reload();
          $("input[type='checkbox']").prop('checked', false);

    }});

  }//if ends
}

  });

</script>
@endsection