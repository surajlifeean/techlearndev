@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">Course Video Management</a></li>
                <li><a href="{{route('course-management.create')}}">Add Video</a></li>
               
              </ul>  
                      <header class="panel-heading">
                        <strong>Enter The Course Video for {{$course->title}}</strong>
                      </header>

@if(count($coursevideo)!=0)
{{Form::model($coursevideo,['route' =>['course-video-management.update',$coursevideo[0]->course_id],'method' =>'PUT', 'files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
@else
{{Form::open(['route' => 'course-video-management.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
@endif

<input type="hidden" name="course_id" value="{{$course->id}}">

@if(count($coursevideo)!=0)
<table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <td>Level</td>
            <td>video</td>
            <td>Topic</td>
            <td>Description</td> 
        </tr>
    </thead>
    <tbody>
@php $vid_array=array(); @endphp
@foreach($coursevideo as $key=>$value)
        @if(isset($coursevideo[$key+1]))
        @php    
            $level=$coursevideo[$key+1]->level; 
        @endphp
        @else
            @php 
            $level=0;    
            @endphp
        @endif

        
        @if($value->level!=$level)
        <tr>
          @php 

            $index=$key+13;

          @endphp
            @php array_push($vid_array,$value->video_id)  @endphp

            <td class="col-sm-1">
                <select name="level[{{$index}}]" class="form-control">
                  <option value="1" @if($value->level==1)selected="selected" @endif>1</option>
                  <option value="2" @if($value->level==2)selected="selected" @endif >2</option>
                  <option value="3" @if($value->level==3)selected="selected" @endif >3</option>
                  <option value="4" @if($value->level==4)selected="selected" @endif>4</option>
                  <option value="5" @if($value->level==5)selected="selected" @endif>5</option>
                  <option value="6" @if($value->level==6)selected="selected" @endif>6</option>
                  <option value="7" @if($value->level==7)selected="selected" @endif>7</option>
                  <option value="8" @if($value->level==8)selected="selected" @endif>8</option>
                  <option value="9" @if($value->level==9)selected="selected" @endif>9</option>
                  <option value="10" @if($value->level==10)selected="selected" @endif>10</option>
                  <option value="11" @if($value->level==11)selected="selected" @endif>11</option>
                  <option value="12" @if($value->level==12)selected="selected" @endif >12</option>
                </select>
            </td>
            <td class="col-sm-3">
                {{Form::select("video_id[$index]", $videos,$vid_array, array("multiple" => true,"class"=>"form-control"))}}
            </td>
            <td class="col-sm-3">
                <input type="text" name="topic[{{$index}}]" value="{{$value->topic_name}}" class="form-control"/>
            </td>
            <td class="col-sm-4">
                <input type="text" name="description[{{$index}}]" value="{{$value->description}}" class="form-control"/>
            </td>
            <!-- <td class="col-sm-2"><a class="deleteRow"></a>

            </td> -->
            <td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>
        </tr>

         @php 
              $vid_array=array();
        @endphp
     

        @else

            @php array_push($vid_array,$value->video_id)  @endphp

        @endif

        
@endforeach

    </tbody>
     <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>

</table>

@else

<table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <td>Level</td>
            <td>video</td>
            <td>Topic</td>
            <td>Description</td> 
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-1">
                <select name="level[0]" class="form-control">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
            </td>
            <td class="col-sm-3">
                {{Form::select("video_id[0][]", $videos,null, array("multiple" => true,"class"=>"form-control"))}}
            </td>
            <td class="col-sm-3">
                <input type="text" name="topic[0]"  class="form-control"/>
            </td>
            <td class="col-sm-4">
                <input type="text" name="description[0]"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>


@endif

<button type="submit" class="btn btn-primary"> Submit </button>
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
  <script type="text/javascript">
    $(document).ready(function () {
    var counter = 1;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td class="col-sm-1"><select name="level['+ counter + ']" class="form-control"><option value="1">1</option>  <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option> </select> </td>';

        cols += '<td><select name="video_id['+counter+'][]" class="form-control" multiple>@foreach ($videos as $key => $value)<option value="{{$key}}">{{$value}}</option>@endforeach</select></td>';

        cols += '<td><input type="text" class="form-control" name="topic[' + counter + ']"/></td>';

        cols += '<td><input type="text" class="form-control" name="description[' + counter + ']"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
  </script>


@endsection