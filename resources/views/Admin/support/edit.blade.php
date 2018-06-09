@extends('adminmain')

@section('content')


        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">

              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('support-management.index')}}">Support Management</a></li>
                <li><a href="{{route('support-management.create')}}">Add Support</a></li>               
              </ul>
                <header class="panel-heading">
                  <span class="h4">Add Support</span>
                </header>                     
                      {{Form::model($supports,['route'=>['support-management.update',$supports->id],'method' =>'PUT', 'files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                  <div class="line line-dashed line-lg pull-in"></div>
                      <div class="panel-body">                   
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Subject</label>
                            <div class="col-sm-9">
                              {{Form::select('subject_id',$subject,null,['placeholder'=>'Pick your subject','class'=>'form-control','required'=>'true'])}}

                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label"> Details</label>
                            <div class="col-sm-9">                           
                              <textarea name="limitedtextarea"   class="form-control" onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,100);"onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,100);">{!!($supports->details)!!}
                              </textarea><br>
                                <font size="1">(Maximum characters: 100)<br>You have <input readonly type="text" name="countdown" size="3" value="100"> characters left.</font>
                            </div>
                        </div>
                         
                        <div class="form-group">                         
                          <label class="col-sm-3 control-label">Your Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" value="{!!($supports->name)!!}"  class="form-control" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Your Email</label>
                            <div class="col-sm-9">                            
                              <input type="email" name="email" value="{!!($supports->email)!!}"   class="form-control" placeholder="Email" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">File Name</label>
                              <div class="col-sm-9">
                              
                                <input type="file" name="attatchment"  id="attatchment"  class="form-control"  required>
                              </div>
                        </div>                     
                        <footer class="panel-footer text-right bg-light lter">                     
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>
                            <a href="{{url('/admin/support-management')}}" class="btn btn-danger">Cancel</a>
                        </footer>
                    </div>

                     {{Form::close()}}
              </section>
            </section>
          </section>

@endsection


@section('scripts')


<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}
</script>
   
  
 <script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote();
    });
  </script>

  <script type='text/javascript'>
    /*function countChar(val) {

    var len = val.value.length;
    var ctext = len + " Chars";

    var str = val.value;
    var parts = [];
    var partSize = 150;

    while (str) {
        if (str.length < partSize) {
            var rtext = (partSize - str.length) + " Chars Remaining";
            parts.push(str);
            break;
        }
        else {
            parts.push(str.substr(0, partSize));
            str = str.substr(partSize);
        }



    }
    var ptext = parts.length + " Parts";

    $('#text-character').val(ctext);
    $('#text-parts').val(ptext);
    $('#text-remaining').val(rtext);

}

*/

</script>


</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgQChjhrquG2nKA5pY0BdsevcKRjUDiEE&libraries=places"></script>

<script type="text/javascript">
 function initAutocomplete() {
          // Create the autocomplete object, restricting the search to geographical
          // location types.
          autocomplete = new google.maps.places.Autocomplete(
              /** @type {!HTMLInputElement} */(document.getElementById('address')),
              {types: ['geocode']});
    
          // When the user selects an address from the dropdown, populate the address
          // fields in the form.
          //autocomplete.addListener('place_changed', fillInAddress);
          autocomplete.addListener("place_changed", function(){
              //fillInAddress(id);                
          })
    }
</script>

@endsection





