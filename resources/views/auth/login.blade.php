@extends('main')

@section('content')

    <div class="register-wrapper text-center">
        <div class="container">
            <h1>Sign in</h1>
            
            <p>Don’t have an Account? <a href="{{route('register')}}">Create an Account</a></p>
            
            
            <div class="form-wrapper text-left">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-4">
                    <form action="{{route('login')}}" method="post" data-parsley-validate>
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" name="username" id="username"value="{{old('username')}}" placeholder="Enter Username" required>
                        <span class="help-block-un" style="color:red; display:none;">
                                        <strong>
                                            Username Does Not Exists
                                        </strong>
                        </span>

                         @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password"  name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                        
                        <div class="buttonset text-center">
                         <button type="submit" id="login"class="button-common">Continue</button>
                        
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
    console.log("console--"+username);
    var len=username.length;
    if(len>6){
    $.ajax({
    url: "{{route('username.exists')}}",
    dataType: "json",
    data: {username:username},
    type: 'get',
    success: function(data) {
        if(!data){
            $('#login').prop('disabled',false);
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