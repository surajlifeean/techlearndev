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
                        @guest
                        <li><a href="{{route('login')}}">Sign in</a></li>
                        <li><a class="crest-account" href="{{route('register')}}">Create Account</a></li>
                        @else
                        <li><a class="crest-account" href="{{route('profile.index')}}">Dashboard</a></li>
                         <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                        @endguest
                        
                    </ul>
                    </div>  
                </div>
                </div>
               
                
            </div>
        </div>
    </header>
     