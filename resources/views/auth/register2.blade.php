@extends('main')

@section('stylesheets')

<style>
input[type="checkbox"], input[type="radio"]{
	position: absolute;
	right: 9000px;
}

/*Check box*/
input[type="checkbox"] + .label-text:before{
	content: "\f096";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 5px;
}

input[type="checkbox"]:checked + .label-text:before{
	content: "\f14a";
	color: #1040a3;
	animation: effect 250ms ease-in;
}

input[type="checkbox"]:disabled + .label-text{
	color: #aaa;
}

input[type="checkbox"]:disabled + .label-text:before{
	content: "\f0c8";
	color: #ccc;
}

/*Radio box*/

input[type="radio"] + .label-text:before{
	content: "\f10c";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 5px;
}

input[type="radio"]:checked + .label-text:before{
	content: "\f192";
	color: #1040a3;
	animation: effect 250ms ease-in;
}

input[type="radio"]:disabled + .label-text{
	color: #aaa;
}

input[type="radio"]:disabled + .label-text:before{
	content: "\f111";
	color: #ccc;
}

/*Radio Toggle*/

.toggle input[type="radio"] + .label-text:before{
	content: "\f204";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 10px;
}

.toggle input[type="radio"]:checked + .label-text:before{
	content: "\f205";
	color: #16a085;
	animation: effect 250ms ease-in;
}

.toggle input[type="radio"]:disabled + .label-text{
	color: #aaa;
}

.toggle input[type="radio"]:disabled + .label-text:before{
	content: "\f204";
	color: #ccc;
}


@keyframes effect{
	0%{transform: scale(0);}
	25%{transform: scale(1.3);}
	75%{transform: scale(1.4);}
	100%{transform: scale(1);}
}


</style>


@endsection

@section('content')




	<div class="register-wrapper text-center">
		<div class="container">
			<h1>Create New Account</h1>
			
			
			
			
				<div class="form-wrapper text-left">
				<div class="screen-reader text-center">
					<h5>Personal Information Of Students</h5>
				</div>
				
				
				<div class="row justify-content-center">
					<div class="col-md-8 col-sm-6">
					<form action="{{route('register')}}" method="post" data-parsley-validate>
					{{ csrf_field() }}
					<input type="hidden" name="sponsored_by" value="{{$sponsorid}}">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Title</label>
										<select class="form-control" placeholder="Select Title">
											<option value="Mr">Mr</option>
											<option value="Miss">Miss</option>
											<option value="Mrs">Mrs</option>
										</select>
								</div>
							</div>
							<div class="col-md-6">
							  <div class="form-group">
									<label for="">First Name</label>
								  	<input type="text" name="fname" placeholder="Enter First Name" class="form-control" required>
							  </div>	
							</div>	
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Last Name</label>
								  	<input type="text" name="lname" placeholder="Enter Last Name" class="form-control" required>
							  	</div>
							</div>
							<div class="col-md-6">
							  <div class="form-group">
									<label for="">Nominee</label>
								  	<input type="text" name="nominee" placeholder="Nominee" class="form-control" required>
							  </div>	
							</div>	
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Relation With Nominee</label>
								  	<select class="form-control" placeholder="Select Nominee">
											<option value="Mother">Mother</option>
											<option value="Father">Father</option>
											<option value="Spouse">Spouse</option>
											<option value="Brother">Brother</option>
											<option value="Sister">Sister</option>
										</select>
							  	</div>
							</div>
							<div class="col-md-6">
							  <div class="form-group">
									<label for="">Contact No</label>
								  	<input type="tel" name="contact_no" placeholder="Contact no"  class="form-control" required>
							  </div>	
							</div>	
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Email Id</label>
								  	<input type="text" name="email" placeholder="Email id" id="email" class="form-control" required>
							  	</div>
	  						  	<span class="help-block-un" style="color:red; display:none;">
						                <strong>
						                    Email is taken! Try something else.
						                </strong>
								</span>
								</div>
							<div class="col-md-6">
							  <div class="form-group">
									<label for="">Date Of Birth</label>
								  	<input type="date" name="dob" class="form-control" placeholder="Date of Birth" required>
							  </div>	
							</div>	
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Mode Of Correspondence</label>
								  	 {{Form::select('correspondence',['courier'=>'courier','Speed Post'=>'Speed Post'],null,['placeholder'=>'Mode of correspondence','class'=>'form-control','required'=>'true'])}}

							  	</div>
							</div>
							<div class="col-md-6">
							  <div class="form-group">
									<label for="">Name of Father/Guardian</label>
								  	<input type="text" name="guardian" class="form-control" placeholder="Guardian" required>
							  </div>	
							</div>	
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Address</label>
								  	<input type="text" name="address" id="address" onFocus="initAutocomplete();" placeholder="Address" class="form-control" required>
							  	</div>
							</div>
							<div class="col-md-6">
							  <div class="form-group">
									<label for="">Landmark</label>
								  	<input type="text" name="landmark" class="form-control" placeholder="landmark" required>
							  </div>	
							</div>	
						</div>

						
						<div class="screen-reader text-center">
							<h5>Account Details</h5>
						</div>
						
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">User Name</label>
								  	<input type="text" name="username" id="username" class="form-control" data-parsley-minlength="6" placeholder="Username" required>
							  	</div>
							  	<span class="help-block-un" style="color:red; display:none;">
                                        <strong>
                                            Username is taken! Try something else.
                                        </strong>
                        		</span>

							</div>
							<div class="col-md-6">
							  <div class="form-group">
									<label for="">Password</label>
								  	<input type="password" name="password" placeholder="Password"  class="form-control" required>
							  </div>	
							</div>	
						</div>
						
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Placed Side</label>
										<div class="form-check">
											<label>
												<input type="radio" name="side" value="left" checked> <span class="label-text">Left</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="radio" name="side" value="right"> <span class="label-text">Right</span>
											</label>
										</div>
							  	</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Course</label>
								  	{{Form::select('course',$course,null,['placeholder'=>'Pick your course','class'=>'form-control','required'=>'true'])}}
							  	</div>
							</div>
								
						</div>
						<div class="screen-reader text-center">
							<h5>Payment Details</h5>
						</div>
						
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Demand Draft No</label>
								  	<input type="text" name="ddno" class="form-control" placeholder="Demand Draft No" required>
							  	</div>
							</div>
							<div class="col-md-6">
							  <div class="form-group">
									<label for="">Amount</label>
								  	<input type="text" name="amount" class="form-control" placeholder="Amount" required>
							  </div>	
							</div>	
						</div>
						
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Issuing Bank</label>
								  	<input type="text" name="issuing_bank" placeholder="Issuing bank" class="form-control" required>
							  	</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Issuing Date</label>
								  	<input type="date" name="issuing_date" placeholder="Issuing Date" class="form-control" required>
							  	</div>
							</div>
								
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Issuing Bank Branch</label>
								  	<input type="text" name="bank_branch" placeholder="Issuing Bank Branch" class="form-control" required>
							  	</div>
							</div>
							
								
						</div>
						
						
						
						<div class="buttonset text-center">
						 <button type="submit" id="login" class="button-common">Submit</button>
						
						</div>
						
						</form>	
					</div>	
					
				</div>
			
			</div>
		
		</div>
	
	</div>
@endsection
@section('scripts')

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

<script type="text/javascript">
    $(document).ready(function(){
        
          $('#login').prop('disabled', true);

    });

    $("#email").keyup(function(){

    var username=$("#email").val();
    console.log("console--"+username);
    var len=username.length;
    if(len>6){
    $.ajax({
    url: "{{route('email.exists')}}",
    dataType: "json",
    data: {username:username},
    type: 'get',
    success: function(data) {
        if(data){
            $('#login').prop('disabled',true);
            $('.help-block-un').show();
        }
        else{
            $('.help-block-un').hide();
            $('#login').prop('disabled',false);
        }
    },

});

}


});
</script>



<script type="text/javascript">
    $(document).ready(function(){
        
          $('#login').prop('disabled', true);

    });

    $("#username").keyup(function(){

    var username=$("#username").val();
    console.log("console--"+username);
    var len=username.length;
    if(len>6){
    $.ajax({
    url: "{{route('username.exists')}}",
    dataType: "json",
    data: {username:username},
    type: 'get',
    success: function(data) {
        if(data){
            $('#login').prop('disabled',true);
            $('.help-block-un').show();
        }
        else{
            $('.help-block-un').hide();
            $('#login').prop('disabled',false);
        }
    },

});

}


});
</script>

@endsection