@extends('main')

@section('content')

<section class="dashboard-section">
        <div class="dashboard-menu">
            <div class="dash-menu-inner">
                <a href="javascript:void(0);" class="dashboard-close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>

                <div class="user-avatar">
                    <div class="pro-pic">
                        <img src="images/user.jpg" alt="">
                    </div>

                    <h5>John Smith</h5>
                    <h6>London, UK</h6>

                </div>
                <div class="dashboard-menu-items">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-home" aria-hidden="true"></i>Dashboard </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>My Account </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i>My Income Report </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users" aria-hidden="true"></i>My Team Report </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap" aria-hidden="true"></i>My Genereology </a>
                        </li>

                    </ul>

                </div>
            </div>

        </div>

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
                                                    <img src="images/incomw.png" alt="">
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
                                                    <img src="images/growth-income.png" alt="">
                                                </p>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <h2 class="counter">1548</h2>
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
                                                    <img src="images/total-sale.png" alt="">
                                                </p>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <h2 class="counter">1548</h2>
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
                                                        <img src="images/total-sale.png" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">1548</h2>
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
                                                        <img src="images/growth-income.png" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">1548</h2>
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
                                                        <img src="images/total-png.png" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">1548</h2>
                                                    <span>Left Dormant Sales</span>
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
                                                        <img src="images/group.jpg" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">1548</h2>
                                                    <span>Recent  Members</span>
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
                                                        <img src="images/sale.png" alt="">
                                                    </p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <h2 class="counter">1548</h2>
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
                                                        <img src="images/sale.png" alt="">
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