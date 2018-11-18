@extends('main')

@section('content')
<!-- {{dump($salesreport['ds'])}}
 -->
<section class="dashboard-section">

        @include('partials._sidenav')

        <div class="dashboard-area">
            <div class="dashboard-area-top">
                <a href="javascript:void(0);" class="dashboard-collapse"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> &nbsp; &nbsp;Dashboard</a>
            </div>

            <div class="p-3 card-wrap">
               <div class="row justify-content-around">
                   <div class="col-lg-3 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="icon-screen-desktop"></i></h3>
                                                <p class="text-muted">
                                                    <img src="{{asset('images/incomw.png')}}" alt="">
                                                </p>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <h2 class="counter">1548</h2>
                                                <span>Binary Income</span>
                                         </div>     
                                  </div> 
                            </div>
                        </div>
                   </div>

                   <div class="col-lg-3 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="icon-screen-desktop"></i></h3>
                                                <p class="text-muted">
                                                    <img src="{{asset('images/growth-income.png')}}" alt="">
                                                </p>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <h2 class="counter">{{$salesreport['ds']}}</h2>
                                                <span>Direct Sales</span>
                                         </div>     
                                  </div> 
                            </div>
                        </div>
                   </div>

                   <div class="col-lg-3 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="icon-screen-desktop"></i></h3>
                                                <p class="text-muted">
                                                    <img src="{{asset('images/total-sale.png')}}" alt="">
                                                </p>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <h2 class="counter">{{$salesreport['ts']}}</h2>
                                                <span>Total Sales</span>
                                         </div>     
                                  </div> 
                            </div>
                        </div>
                   </div>
             </div>

             <div class="row justify-content-around">
                <div class="col-lg-3 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="icon-screen-desktop"></i></h3>
                                                    <p class="text-muted">
                                                        <img src="{{asset('images/total-sale.png')}}" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">{{$salesreport['ls']}}</h2>
                                                    <span>Left Sales</span>
                                             </div>     
                                      </div> 
                                </div>
                            </div>
                       </div>
    
                       <div class="col-lg-3 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="icon-screen-desktop"></i></h3>
                                                    <p class="text-muted">
                                                        <img src="{{asset('images/growth-income.png')}}" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">{{$salesreport['rs']}}</h2>
                                                    <span>Right Sales</span>
                                             </div>     
                                      </div> 
                                </div>
                            </div>
                       </div>
    
                       <div class="col-lg-3 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="icon-screen-desktop"></i></h3>
                                                    <p class="text-muted">
                                                        <img src="{{asset('images/total-png.png')}}" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">{{$salesreport['ldor']}}</h2>
                                                    <span>Left Dormant Sales</span>
                                             </div>     
                                      </div> 
                                </div>
                            </div>
                       </div>


                       
                   </div>

                   <div class="row justify-content-around">
                   <!--  <div class="col-lg-3 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="icon-screen-desktop"></i></h3>
                                                    <p class="text-muted">
                                                        <img src="{{asset('images/group.jpg')}}" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">1548</h2>
                                                    <span>Recent  Members</span>
                                            </div>     
                                    </div> 
                                </div>
                            </div>

                           
                         </div> -->
                         <div class="col-lg-3 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="icon-screen-desktop"></i></h3>
                                                    <p class="text-muted">
                                                        <img src="{{asset('images/total-png.png')}}" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">{{$salesreport['rdor']}}</h2>
                                                    <span>Right Dormant Sales</span>
                                             </div>     
                                      </div> 
                                </div>
                            </div>
                       </div>

                         <div class="col-lg-3 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="icon-screen-desktop"></i></h3>
                                                    <p class="text-muted">
                                                        <img src="{{asset('images/sale.png')}}" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">{{$commissionedsales}}</h2>
                                                    <span>Total Commission Sales</span>
                                             </div>     
                                      </div> 
                                </div>
                            </div>
                       </div>
                       <div class="col-lg-3 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="icon-screen-desktop"></i></h3>
                                                    <p class="text-muted">
                                                        <img src="{{asset('images/sale.png')}}" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">1548</h2>
                                                    <span>Total Non Commission
                                                        Sales </span>
                                            </div>     
                                    </div> 
                                </div>
                            </div>
                        </div>





                     </div>

            </div>
              

        </div>


    </section>
	

@endsection