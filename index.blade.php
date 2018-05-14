@extends('adminmain')
@section('stylesheets')

@endsection

@section('content')

 <section class="scrollable padder">
 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('/admin')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{url('admin/banner-management')}}">Banner Management</a></li>
                
              </ul>

  
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4">Banner Management</span>
                      </header>

                      <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                      <!-- <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a> -->
                      <div class="btn-group">
                       <a href="{{url('/admin/banner-management')}}"> <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button></a>
                        <button type="button" class="btn btn-sm btn-default delete-many" title="Remove"><i class="fa fa-trash-o"></i></button>

                          &nbsp;&nbsp;
                        <a href="javascript:void(0)" class="active-status" aria-label="Left Align" onclick="changebulkstatus('A')"  title="Deactivate Newsletter Subscription">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </a>
                 
                  &nbsp;&nbsp;
                  <a href="javascript:void(0)" class="inactive-status" aria-label="Left Align" onclick="changebulkstatus('I')"  title="Activate Newsletter Subscription">
                       <i class="fa fa-unlock" aria-hidden="true"></i>
                      </a>
                      
                      </div>
                      <a href="{{route('banner-management.create')}}" class="btn btn-sm btn-default"><i class="fa fa-plus"></i>Add New Banner</a>
                    </div>

                    <form action="{{route('banner-search')}}" method="get">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                   
                      <input type="text" class="input-sm form-control" name="search" value="{{session('search')}}"  placeholder="Enter Banner Name">
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
                            <th>Title</th>             
                            <th>Link</th>
                            <th>Added On</th>
                            <th>Image</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>

		              		@foreach($banners as $banner)
                          <tr>

                            <td><input type="checkbox" name="del[]" value="{{$banner->id}}" id="checked"></td>
                        
                            <td>{{$banner->title}}</td>
                            <td>{{$banner->link}}</td>
                            <td>{{$banner->created_at}}</td>
                            <td><img src="{{asset('uploads/banners/'.$banner->image_name)}}" width="100px"></td>
                            <td>
								@if($banner->status=='A')
								<a href="#" class="active-status" aria-label="Left Align" onclick="changestatus('A',{{$banner->id}})" data-toggle="tooltip" title="Deactivate Record">
								<i class="fa fa-unlock" aria-hidden="true"></i>
								</a>

								@else
								<a href="#" class="inactive-status" aria-label="Left Align" onclick="changestatus('I',{{$banner->id}})" data-toggle="tooltip" title="Activate Record">
								<i class="fa fa-lock" aria-hidden="true"></i>
								</a>


								@endif


                              <a href="#" class="delete-icon" id="{{$banner->id}}" aria-label="Left Align" data-toggle="tooltip" title="Delete Record">
                			 <i class="fa fa-trash-o" aria-hidden="true"></i>
             					</a>  <!-- delete icon that submits the form -->
                                             
             					  {!! Html::LinkRoute('banner-management.edit','',array($banner->id),array('class'=>"fa fa-pencil-square-o",'data-toggle'=>"tooltip",'title'=>"Edit banner"))!!}

      

                            </td>
                           
                          </tr>

                    {!! Form::open(['route'=>['banner-management.destroy',$banner->id], 'method'=>'DELETE','class'=>'delete-banner','id'=>'delete'.$banner->id])!!}
                        
                        {!!Form::close()!!}



                          @endforeach
                        
                        </tbody>
                      </table>
                    </div>
                  </section>
                </section>

{!!$banners->links()!!}


<div> Showing {!!$banners->count()!!}|{!!$banners->total()!!}</div>
    
</section>

</section>


@endsection




@section('scripts')


<script type="text/javascript">
  
  $('.delete-icon').click(function(e){
    e.preventDefault();
    var id=$(this).attr('id');
   
    var r = confirm("Are You Sure You Wanna Delete The Banner?");
    if (r == true) {
       $("#delete"+id).submit();
    } 
    
  });
  
  function changestatus(status,id){

  var status=status;
  var id=id;

   var r = confirm("Are You Sure You Want To Change The Status Of Banner?");
    if (r == true) {
     $.ajax({
        url:"{{route('banner-status')}}", 
        type:"get",
        data:{id:id,status:status},
        success: function(result){
          location.reload();

    }});  
    } 
}
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
    var r = confirm("Are You Sure You Wanna Delete The Gallery ?");
    if (r == true) {
    $.ajax({
        url:"{{route('banner-bulk-delete')}}", 
        type:"get",
        data:{IDs:id},
        success: function(result){
      
            
          location.reload();
          $("input[type='checkbox']").prop('checked', false);

    }});

  }//if ends
}

  });
</script>

@endsection