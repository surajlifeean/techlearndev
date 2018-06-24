@extends('main')

@section('content')

    <div class="register-wrapper text-center">
        <div class="container">
                <h1>Create Account</h1>
            
            <p>Already a registered user? <a href="{{route('login')}}">Sign in</a></p>

            <span class="help-block-un" style="color:red; display:none;">
                                        <strong>
                                            User With Following Credentials Does Not Exists.
                                        </strong>
                        </span>
            
            <div class="form-wrapper text-left">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-4">
                    <form action="{{route('register.step2')}}" method="post" data-parsley-validate>

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Sponsor Id</label>
                        <input type="text" id="sid" name="sponsor_id" placeholder="Enter Sponsor's ID" class="form-control" required>
                        

                    </div>
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter Sponsor's Username" required>
                        

                    </div>
                        
                        <div class="buttonset text-center">
                         <button type="submit" id="login" class="button-common">Continue</button>
                        
                        </div>
                        
                        </form> 
                    </div>  
                    
                </div>
            
            </div>
        
        </div>
    
    </div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        
          $('#login').prop('disabled', true);

    });

    $("#username").keyup(function(){

    var username=$("#username").val();
    var sid=$("#sid").val();
   // console.log("console--"+username);
    var len=username.length;
    if(len>6){
    $.ajax({
    url: "{{route('unamensid.exists')}}",
    dataType: "json",
    data: {
        username:username,
        sid:sid
    },
    type: 'get',
    success: function(data) {
        if(!data){
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