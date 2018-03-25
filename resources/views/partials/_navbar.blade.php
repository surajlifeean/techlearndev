    <header>
        <div class="nav">
            <div class="container">
                <div class="row align-items-center">
                     <div class="logo_wrap header-left col-md-3 col-6">
                        <a href="{{url('/')}}">
                            <img src="{{asset('images/logo.png')}}" alt="logo" />
                        </a>
                    </div>
                    
                    <div class="col-md-9 col-6 header-right text-right">
                    <a href="javascript:void(0)" class="menu-button"><i class="fa fa-bars"></i></a>
                    <div class="menu-container">    
                    <ul class="top-menu">
                        <li><a href="{{url('/learn')}}">Learn</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="{{route('login')}}">Sign in</a></li>
                        <li><a class="crest-account" href="{{route('register')}}">Create Account</a></li>
                    </ul>
                    </div>  
                </div>
                </div>
               
                
            </div>
        </div>
    </header>
     