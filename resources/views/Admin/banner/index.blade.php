@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('banner-management.index')}}">Banner Management</a></li>
                <li><a href="{{route('banner-management.index')}}">Banner List</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Banner Listing</span>
                      </header>

                       <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                      <!-- <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a> -->
                      <div class="btn-group">
                       <a href="{{route('banner-management.index')}}"> <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button></a>
                        <button type="button" class="btn btn-sm btn-default delete-many" title="Remove"><i class="fa fa-trash-o"></i></button>

                          &nbsp;&nbsp;
                        <a href="javascript:void(0)" class="active-status" aria-label="Left Align" onclick="changebulkstatus('A')"  title="Deactivate Review">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </a>
                 
                  &nbsp;&nbsp;
                  <a href="javascript:void(0)" class="inactive-status" aria-label="Left Align" onclick="changebulkstatus('Y')"  title="Activate Review">
                       <i class="fa fa-unlock" aria-hidden="true"></i>
                      </a>
                      </div>
                      <a href="{{route('banner-management.create')}}" class="btn btn-sm btn-default"><i class="fa fa-plus"></i>Add New Banner</a>
                    </div>

                    <form action="{{route('banner-search')}}" method="get">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                   
                      <input type="text" class="input-sm form-control" name="search" value="{{session('search')}}"  placeholder="Search By Banner Text">
                        <span class="input-group-btn">
                            
                          <button class="btn btn-sm btn-default" type="submit">Go!</button>
   
                        </span>
                      
                      </div>
                    </div>
                    </form>
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
                            <th>Banner Text</th>
                            <th class="th-sortable" data-toggle="class">Banner
                            </th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

				@foreach($banners as $value)

        
                          <tr>

                            <td><input type="checkbox" name="del[]" value="{{$value->id}}" id="checked"></td>

                            <td>{!!$value->banner_text!!}</td>
                            
                            <td><img src="{{asset('uploaded_images/banner/'.$value->image)}}" style="width: 90px;"></td>

                            <td>{{date('jS M, Y', strtotime($value->created_at))}}</td>
                            <td>
                              <!--   @if($value->status=='A')
           <a href="javascript:void(0)" class="active-status" aria-label="Left Align" onclick="changestatus('A',{{$value->id}})" data-toggle="tooltip" title="Deactivate Product">
                       <i class="fa fa-unlock" aria-hidden="true"></i>
                      </a>
                 
                  @else
                  <a href="javascript:void(0)" class="inactive-status" aria-label="Left Align" onclick="changestatus('I',{{$value->id}})" data-toggle="tooltip" title="Activate Product">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </a>
                   

                  @endif -->

                    <button class="btn btn-primary btn-rounded formConfirm" data-form="#frmStatus-{{$value->id}}" data-title="Status Change" data-message="Are you sure, you want to change the status ?" >
                                        <?php if($value->status == 'Y'){ ?>
                                            <i title="Inactive" style="margin-right: 0;" class="fa fa-lock" aria-hidden="true"></i>
                                        <?php } else { ?>
                                            <i title="Active" style="margin-right: 0;" class="fa fa-unlock" aria-hidden="true"></i>
                                        <?php } ?>
                                    </button>
                                    {!! Form::open(array(
                                            'url' => route('admin.banner.statuschange', array($value->id)),
                                            'method' => 'get',
                                            'style' => 'display:none',
                                            'id' => 'frmStatus-' . $value->id,
                                            'status' => 'frmStatus-' . $value->status,
                                        ))
                                    !!}
                                    {!! Form::submit('Submit') !!}
                                    {!! Form::close() !!}
<!-- 
                     {!! Html::LinkRoute('banner-management.edit',null,array($value->id),array('class'=>"fa fa-pencil-square-o",'data-toggle'=>"tooltip",'title'=>"Edit Course"))!!} -->
                      <a href="{{route('banner-management.edit',$value->id)}}"  class="btn btn-info btn-rounded"><i class="fa fa-pencil-square-o"></i></a>

                        <!-- <a href="#" class="delete-icon" id="{{$value->id}}" aria-label="Left Align" data-toggle="tooltip" title="Delete Course">
                			 <i class="fa fa-trash-o" aria-hidden="true"></i>
             					</a> -->  <!-- delete icon that submits the form -->
                                             
             					 
                         <button class="btn btn-danger btn-rounded formConfirm" data-form="#frmDelete-{{$value->id}}" data-title="Delete banner" data-message="Are you sure, you want to delete this banner ?" >
                                        <i title="Delete" style="margin-right: 0;" class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                    {!! Form::open(array(
                                            'url' => route('admin.banner.delete', array($value->id)),
                                            'method' => 'get',
                                            'style' => 'display:none',
                                            'id' => 'frmDelete-'.$value->id
                                        ))
                                    !!}
                                    {!! Form::submit('Submit') !!}
                                    {!! Form::close() !!}
                        <a href="{{route('banner-management.show',$value->id)}}" data-toggle="tooltip" title="banner Details" class="btn btn-info btn-rounded"><i class="fa fa-search-plus"></i></a>

                            </td>
                           
                          </tr>

                    {!! Form::open(['route'=>['banner-management.destroy',$value->id], 'method'=>'DELETE','class'=>'delete-banner','id'=>'delete'.$value->id])!!}
                    {!!Form::close()!!}



                          @endforeach
                        
                        </tbody>
                      </table>
                    </div>
                  </section>
                </section>

{!!$banners->links()!!}


<div> Showing {!!$banners->count()!!}|{!!$banners->total()!!}</div>
    
                      
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

    <script>
function changestatus(status,id){

  var status=status;
  var id=id;
  //alert(status);
  //alert(id);

   var r = confirm("Are You Sure You Want To Change The Status Of Banner?");
    if (r == true) {
     $.ajax({
        url:"route('banner-management.bannerstatus')", 
        type:"get",
        data:{id:id,status:status},
        success: function(result){
          location.reload();

    }});  
    } 
}

</script>

    <script type="text/javascript">

    $(document).ready(function() {

    // Gets the video src from the data-src on each button

    var $videoSrc;  
    $('.video-btn').click(function() {
    $videoSrc = $(this).data( "src" );
    });
    console.log($videoSrc);



    // when the modal is opened autoplay it  
    $('#myModal').on('shown.bs.modal', function (e) {

    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#video").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1" ); 
    })


    // stop playing the youtube video when I close the modal
    $('#myModal').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src',$videoSrc); 
    }) 






    // document ready  
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
        url:"{{route('bulk-banner-status')}}", 
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
    var r = confirm("Are You Sure You Wanna Delete The Banner ?");
    if (r == true) {
     //alert(id);
    $.ajax({
        url:"{{route('delete')}}", 
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