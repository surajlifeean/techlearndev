@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">User Management</a></li>
                <li><a href="{{route('course-management.create')}}">Add User</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Add Users</span>
                      </header>

                      
                 
                     
                      

                      {{Form::open(['route' => 'users.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="line line-dashed line-lg pull-in"></div>
                      <header class="panel-heading">
                        <strong>Personal Information Of Students</strong>
                      </header>
                      <div class="panel-body">                   
                        <div class="form-group">

                          <label class="col-sm-3 control-label">User Title</label>
                          <div class="col-sm-9">
                           <!--  <input type="text" name="title" class="form-control"  data-required="true" placeholder="User Title"> --> 
                          <select  name="title" class="form-control" placeholder="Select Title">
                            <option value="Mr">Mr</option>
                            <option value="Miss">Miss</option>
                            <option value="Mrs">Mrs</option>
                          </select>

                          </div>
                        </div>
                         
                        <div class="form-group">
                          
                          <label class="col-sm-3 control-label">First Name</label>
                          <div class="col-sm-3">
                            <input type="text" name="fname"  class="form-control" placeholder="First Name" required>
                          </div>


                          <label class="col-sm-3 control-label">Last Name</label>
                          <div class="col-sm-3">
                            <input type="text" name="lname"   class="form-control" placeholder="Last Name" required>
                          </div>
                         

                        </div>

                        
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Nominee</label>
                            <div class="col-sm-9">
                        
                              <input type="text" name="nominee"   class="form-control" placeholder="Nominee" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Relationship With Nominee</label>
                            <div class="col-sm-9">
                              
                              <input type="text" name="relation_with_nominee"  class="form-control" placeholder="Relationship With Nominee" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Contact No</label>
                            <div class="col-sm-9">
                              
                              <input type="text" name="contact_no"   class="form-control" placeholder="Contact No" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email Id</label>
                            <div class="col-sm-9">
                              
                              <input type="email" name="email"   class="form-control" placeholder="Email" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Date Of Birth</label>
                            <div class="col-sm-9">
                             
                              <input type="date" name="dob"   class="form-control" placeholder="Date Of Birth" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Mode Of Correspondence</label>
                            <div class="col-sm-9">
                              
                             <!--  <input type="text" name="correspondence"   class="form-control" placeholder="Mode Of Correspondence" required> -->
                              <select  name="correspondence" class="form-control" placeholder="Select correspondence">
                            <option value="Courier">Courier</option>
                            <option value="Speed Post">Speed Post</option>
                           
                          </select>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Name of Father/Guardian</label>
                            <div class="col-sm-9">
                             
                              <input type="text" name="guardian"  class="form-control" placeholder="Name of Father/Guardian"  required>

                            </div>
                          </div>
                          <div class="form-group">
                          <label class="col-sm-3 control-label"> Address</label>
                          <div class="col-sm-9">
                          
                            <!-- <textarea  name="address" class="form-control" required></textarea>  -->
                            <textarea name="limitedtextarea"  class="form-control" onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,100);" 
onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,100);">
</textarea><br>
<font size="1">(Maximum characters: 100)<br>
You have <input readonly type="text" name="countdown" size="3" value="100"> characters left.</font>
                          </div>
                        </div>
                            


                         <!--  <div class="form-group">
                          <label class="col-sm-3 control-label"> Address</label>
                          <div class="col-sm-9">
                          
                            <textarea id="message" class="form-control" maxlength="150" onkeyup="countChar(this)"
          placeholder="Type your message ..." >
                            </textarea>

                            <input id="display_count" class="input-mini uneditable-input"
                                   placeholder="0 Chars" readonly />
                            
                            <input id="word_left" class="input-medium uneditable-input"
                                    readonly /> 
                          </div>
                        </div> -->

                     <!--   <textarea id="word_count" class="form-control"></textarea>
                         <input id="text-character" class="input-mini uneditable-input"
                                   placeholder="0 Chars" readonly />
                                    <input id="text-character" class="input-mini uneditable-input"
                                   placeholder="0 Chars" readonly /> -->
                       
                          <div class="foountrm-group">
                            <label class="col-sm-3 control-label">Landmark</label>
                            <div class="col-sm-9">
                             
                              <input type="text" name="landmark"  class="form-control" placeholder="Landmark" required>

                            </div>
                          </div>
                          <div class="line line-dashed line-lg pull-in"></div>
                        <header class="panel-heading">
                        <strong>Account Details</strong>
                      </header>                      
                        <div class="form-group">
                            <label class="col-sm-3 control-label">User Name</label>
                            <div class="col-sm-9">
                             
                              <input type="text" name="username"   class="form-control" placeholder="User Name" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                             
                              <input type="password" name="password"   class="form-control" placeholder="Password" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Placed Side</label>
                            <div class="col-sm-9">
                              
                              <input type="text" name="side"   class="form-control"  readonly="">

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Course</label>
                            <div class="col-sm-9">
                             
                              <!-- <input type="text" name="course"   class="form-control" placeholder="Course" required> -->
                              {{Form::select('course',$course,null,['placeholder'=>'Pick your course','class'=>'form-control','required'=>'true'])}}

                            </div>
                          </div>
                          <div class="line line-dashed line-lg pull-in"></div>

                          <header class="panel-heading">
                        <strong>Payment Details</strong>
                      </header>                      
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Demand Draft No</label>
                            <div class="col-sm-9">
                             
                              <input type="text" name="ddno"   class="form-control" placeholder="Demand Draft No" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-9">
                             
                              <input type="password" name="amount"   class="form-control" placeholder="Amount" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Issuing Bank</label>
                            <div class="col-sm-9">
                             
                              <input type="text" name="issuing_bank"   class="form-control" placeholder="Issuing Bank" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Issuing Date</label>
                            <div class="col-sm-9">
                             
                              <input type="Date" name="issuing_date"  class="form-control" placeholder="Issuing Date" required>

                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Issuing Bank Branch</label>
                            <div class="col-sm-9">
                             
                              <input type="text" name="bank_branch"  class="form-control" placeholder="Issuing Bank Branch" required>

                            </div>
                          </div>
                       
                    
                    <!-- <label for="">Issuing Bank Branch</label>
                    <input type="text" name="bank_branch" class="form-control" required> -->
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                       
                     <div class="line line-dashed line-lg pull-in"></div>
                       
                     
                  <footer class="panel-footer text-right bg-light lter">
                       
                  <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                  <a href="{{url('/admin/users')}}" class="btn btn-danger">Cancel</a>


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





