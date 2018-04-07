@extends('main')

@section('content')

    <div class="register-wrapper text-center">
        <div class="container">
                <h1>Create Account</h1>
            
            <p>Already a registered user? <a href="{{route('login')}}">Sign in</a></p>
            
            <div class="form-wrapper text-left">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-4">
                    <form action="{{route('register.step2')}}" method="post" data-parsley-validate>

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Sponsor Id</label>
                        <input type="text" name="sponsor_id" placeholder="Enter Sponsor's ID" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Sponsor's Username" required>
                    </div>
                        
                        <div class="buttonset text-center">
                         <button type="submit" class="button-common">Continue</button>
                        
                        </div>
                        
                        </form> 
                    </div>  
                    
                </div>
            
            </div>
        
        </div>
    
    </div>
@endsection
