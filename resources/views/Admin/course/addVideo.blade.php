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
{{Form::open(['route' => 'course-video-management.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
<input type="hidden" name="course_id" value="{{$course->id}}">
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
                {{Form::select("video_id[0][]", $videos, null, array("multiple" => true,"class"=>"form-control"))}}
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