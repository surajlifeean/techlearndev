   <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li>
                      <a href="#layout"  >
                        <i class="fa fa-columns icon">
                          <b class="bg-warning"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>User Mngt.</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="{{route('users.index')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>User List</span>
                          </a>
                        </li>

                        <li >
                          <a href="{{url('admin/users/create')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Root User</span>
                          </a>
                        </li>

                      </ul>
                    </li>
                    <li >
                      <a href="#uikit"  >
                        <i class="fa fa-flask icon">
                          <b class="bg-success"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Banner Mngt.</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="{{route('banner-management.create')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Add Banner</span>
                          </a>
                        </li>
                        <li >
                          <a href="{{route('banner-management.index')}}">                                                                                    
                            <i class="fa fa-angle-right"></i>
                            <span>Banner Listing</span>
                          </a>
                        </li>
                     
                       
                      </ul>
                    </li>
                    <li >
                      <a href="#pages"  >
                        <i class="fa fa-file-text icon">
                          <b class="bg-primary"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Course Mngt.</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="{{route('course-management.create')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Add</span>
                          </a>
                        </li>
                         <li >
                          <a href="{{route('course-management.index')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>List</span>
                          </a>
                        </li>
                       </ul>
                    </li>

                    <li >
                      <a href="{{route('review-management.index')}}"  >
                        <i class="fa fa-envelope-o icon">
                          <b class="bg-primary dker"></b>
                        </i>
                        <span>Review Mngt.</span>
                      </a>
                    </li>

                    <li>
                      <a href="#layout"  >
                        <i class="fa fa-columns icon">
                          <b class="bg-warning"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Video Mngt.</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="{{route('video-management.index')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Video List</span>
                          </a>
                        </li>
                        <li >
                          <a href="{{route('video-management.create')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Add</span>
                          </a>
                        </li>

                      </ul>
                    </li>

                     <li >
                      <a href="#pages"  >
                        <i class="fa fa-file-text icon">
                          <b class="bg-primary"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Commission Mngt.</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="{{route('commission.index')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Add/Update Commission</span>
                          </a>
                        </li>
                         <li >
                          <a href="{{route('commission.index')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>List</span>
                          </a>
                        </li>
                       </ul>
                    </li>


                     <li >
                      <a href="#pages"  >
                        <i class="fa fa-file-text icon">
                          <b class="bg-primary"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Exam Category Mngt.</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="{{route('exam-category.index')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>List</span>
                          </a>
                        </li>
                         <li >
                          <a href="{{route('exam-category.create')}}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Add</span>
                          </a>
                        </li>
                       </ul>
                    </li>



                    
                    <li >
                      <a href="{{url('admin/support-management')}}"  >
                        <i class="fa fa-envelope-o icon">
                          <b class="bg-primary dker"></b>
                        </i>
                        <span>Support Queries</span>
                      </a>
                    </li>


                    
                  </ul>
                </nav>
                <!-- / nav -->
              </div>