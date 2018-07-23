@extends('adminmain')

@section('content')

<!-- {{dump($users)}} -->
<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">User Management</a></li>
                <li><a href="{{route('course-management.create')}}">Show User</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Show Users</span>
                      </header>

                      
                 
                     
                      <!-- <header class="panel-heading">
                        <strong>Enter The Course Details</strong>
                      </header> -->
                      {{Form::model($users,['route' =>['users.update',$users->id],'method' =>'PUT', 'files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="line line-dashed line-lg pull-in"></div>
                      <header class="panel-heading">
                        <strong>Personal Information Of Students</strong>
                      </header>
                      <div class="panel-body">                   
                        <div class="form-group">

                          <label class="col-sm-3 control-label">User Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="title" class="form-control"  data-required="true" placeholder="Course Title" value="{{$users->title}}"> 

                          </div>
                        </div>
                         <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">User Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="user_" class="form-control"  data-required="true" placeholder="Course Caption" value="{!!$users->fname!!}&nbsp;{!!($users->lname)!!}" required>   
                          </div>
                        </div> -->
                         <!-- <div class="line line-dashed line-lg pull-in"></div> -->
                        <div class="form-group">
                          
                          <label class="col-sm-3 control-label">First Name</label>
                          <div class="col-sm-3">
                            <input type="text" name="price"  value="{{$users->fname}}" class="form-control" placeholder="First Name" required>
                          </div>


                          <label class="col-sm-3 control-label">Last Name</label>
                          <div class="col-sm-3">
                            <input type="text" name="duration"  value="{{$users->lname}}" class="form-control" placeholder="Duration" required>
                          </div>
                         

                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Sponsor ID</label>
                          <div class="col-sm-9">
                            <input type="text" name="sponsor_id" class="form-control"  data-required="true" value="{{$users->sponsor_id}}" placeholder="sponsor_id" required>   
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Parent ID</label>
                          <div class="col-sm-9">
                            <input type="text" name="parent_id" class="form-control"  data-required="true" value="{{$users->parent_id}}" required>   
                          </div>
                        </div>

                      

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Relationship With Nominee</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->relation_with_nominee}}" class="form-control" placeholder="First Name" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Contact No</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->contact_no}}" class="form-control" placeholder="First Name" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email Id</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->email}}" class="form-control" placeholder="First Name" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Date Of Birth</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->dob}}" class="form-control" placeholder="First Name" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Mode Of Correspondence</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->correspondence}}" class="form-control" placeholder="Mode Of Correspondence" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Name of Father/Guardian</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->guardian}}" class="form-control" placeholder="Name of Father/Guardian"  required>

                            </div>
                          </div>
                          <div class="form-group">
                          <label class="col-sm-3 control-label"> Address</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea  name="address" class="form-control" required>{!!$users->address!!}</textarea> 
                          </div>
                        </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Landmark</label>
                            <div class="col-sm-9">
                            
                              <input type="text" name="price"  value="{{$users->landmark}}" class="form-control" placeholder="Landmark" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Student id</label>
                            <div class="col-sm-9">
                            
                              <input type="text" name="price"  value="{{$users->id}}" class="form-control" placeholder="student_id" disabled="true">

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Business id</label>
                            <div class="col-sm-9">
                            
                              <input type="text" name="price"  value="{{$users->business_id}}" class="form-control" placeholder="business_id" disabled="true">

                            </div>
                          </div>

                          <div class="line line-dashed line-lg pull-in"></div>
                        <header class="panel-heading">
                        <strong>Account Details</strong>
                      </header>                      
                        <div class="form-group">
                            <label class="col-sm-3 control-label">User Name</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->username}}" class="form-control" placeholder="User Name" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="password" name="price"  value="{{$users->password}}" class="form-control" placeholder="Password" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Placed Side</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->side}}" class="form-control" placeholder="Placed Side" required>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Course</label>
                            <div class="col-sm-9">
                              <!-- <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea>  -->
                              <input type="text" name="price"  value="{{$users->userCourse->title}}" class="form-control" placeholder="Course" required>

                            </div>
                          </div>
                          <div class="line line-dashed line-lg pull-in"></div>

<!--                           <header class="panel-heading">
                        <strong>Payment Details</strong>
                      </header>   -->                    
                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Demand Draft No</label>
                            <div class="col-sm-9">
                              <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea> 
                              <input type="text" name="price"  value="{{$users->ddno}}" class="form-control" placeholder="Demand Draft No" required>

                            </div>
                          </div> -->
                          <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-9">
                              <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea> 
                              <input type="password" name="price"  value="{{$users->amount}}" class="form-control" placeholder="Amount" required>

                            </div>
                          </div> -->
                         <!--  <div class="form-group">
                            <label class="col-sm-3 control-label">Issuing Bank</label>
                            <div class="col-sm-9">
                              <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea> 
                              <input type="text" name="price"  value="{{$users->issuing_bank}}" class="form-control" placeholder="Issuing Bank" required>

                            </div>
                          </div> -->
<!--                           <div class="form-group">
                            <label class="col-sm-3 control-label">Issuing Date</label>
                            <div class="col-sm-9">
                              <textarea class="summernote" name="requirement" class="form-control" required>{!!$users->requirement!!}</textarea> 
                              <input type="text" name="price"  value="{{date('jS M, Y', strtotime($users->issuing_date))}}" class="form-control" placeholder="Issuing Date" required>

                            </div>
                          </div> -->
                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">Description</label>
                          <div class="col-sm-9">
                            
                            <textarea class="summernote" name="description" class="form-control" required>{!!$users->description!!}</textarea> 
                          </div>
                        </div> -->

                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">Set Featured</label>
                          <div class="col-sm-9">
                          Yes:{{Form::radio('set_featured', 'Y')}}
                          No:{{Form::radio('set_featured', 'N')}}

                          </div>
                        </div> 
                        <div class="line line-dashed line-lg pull-in"></div> -->
                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">No of Bedroom</label>
                          <div class="col-sm-9">
                            <input type="number" min="1" step="1" name="no_of_bedroom" required />
                          </div>
                        </div> -->
                        <!-- <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-9">

                           {!!Form::select('status', ['A' => 'Active', 'I' => 'Inactive'],null, ['placeholder' => 'Select'])!!}

                          </div>
                         </div> -->
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                       <!--  <div class="form-group">
                          <label class="col-sm-3 control-label">Images(Min Dimension:1925x725)</label>
                          <div class="col-sm-9">

                            <div class="input_fields_wrap">
                              
                              
                                <div style="margin-bottom:10px;">
                                     <input type="file" name="image_name" class="GalleryImage" id="img0" /> &nbsp 
                                </div>

                            </div>      
                       </div>
                     </div> -->

                     <div class="line line-dashed line-lg pull-in"></div>
                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label">Image List Thumbnail(Min Dimension:318x174)</label>
                          <div class="col-sm-9">

                            <div class="input_fields_wrap">
                                
                                
                                  <div style="margin-bottom:10px;">
                                       <input type="file" name="image_thumbnail" class="GalleryImage" id="img1" /> &nbsp 
                                  </div>

                           </div>      
                       </div>
                     </div> -->
                     
                  <!-- <footer class="panel-footer text-right bg-light lter">
                       
                  <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/> -->

                 <!--  <a href="{{url('/admin/course-management')}}" class="btn btn-danger">Cancel</a>
 -->

                  <!-- </footer> -->


                     </div>

                     {{Form::close()}}
                      
                      
          

</section>
</section>
</section>

@endsection


@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){

    $('form input').attr('readonly', 'readonly');
    $('.course-form textarea').attr('readonly', 'readonly');


  });
  
</script>
 <script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
  </script>


@endsection