@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">Commission Management</a></li>
                <li><a href="{{route('course-management.create')}}">Add / Update Commission</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Add Commission</span>
                      </header>

                 
                      @if(isset($commission))
                    
                          {{Form::open(['route' => 'commission.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                    
                      <div class="panel-body">

                          @foreach($commission as $val)

                        <div class="form-group">
                          <label class="col-sm-3 control-label">{{$val->tag_name}}</label>
                          <div class="col-sm-9">
                              <input type="text" name="{{$val->tag_name}}" class="form-control"  data-required="true" placeholder="{{$val->tag_name}}" value="{{$val->commission}}" required> 
                          </div>
                        </div>

                          @endforeach                   
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        
                      <footer class="panel-footer text-right bg-light lter">
                       
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                        <a href="{{url('/admin/commission')}}" class="btn btn-danger">Cancel</a>
                      </footer>


                     </div>

                     {{Form::close()}}

                     @else

                          {{Form::open(['route' => 'commission.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                    
                      <div class="panel-body">                   
                        <div class="form-group">
                          <label class="col-sm-3 control-label">1st Cheque</label>
                          <div class="col-sm-9">
                              <input type="text" name="1st_cheque" class="form-control"  data-required="true" placeholder="1st Cheque" required> 
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="col-sm-3 control-label">2nd Cheque</label>
                          <div class="col-sm-9">
                            <input type="text" name="2nd_cheque" class="form-control"  data-required="true" placeholder="second_cheque" required>   
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">3rd Cheque</label>
                          <div class="col-sm-9">
                            <input type="text" name="3rd_cheque" class="form-control"  data-required="true" placeholder="third_cheque" required>   
                          </div>
                        </div>
                         <div class="line line-dashed line-lg pull-in"></div>
                    
                        <div class="form-group">
                          <label class="col-sm-3 control-label">2nd Cycle</label>
                          <div class="col-sm-9">
                            <input type="text" name="2nd_cycle" class="form-control"  data-required="true" placeholder="second_cycle" required>   

                          </div>
                        </div>
                          <div class="form-group">
                          <label class="col-sm-3 control-label">3rd Cycle</label>
                          <div class="col-sm-9">
                            <input type="text" name="3rd_cycle" class="form-control"  data-required="true" placeholder="third_cycle" required>   

                          </div>
                        </div>
                          <div class="form-group">
                          <label class="col-sm-3 control-label">4th Cycle</label>
                          <div class="col-sm-9">
                            <input type="text" name="4th_cycle" class="form-control"  data-required="true" placeholder="forth_cycle" required>   

                          </div>
                        </div>
                          <div class="form-group">
                          <label class="col-sm-3 control-label">5nd Cycle</label>
                          <div class="col-sm-9">
                            <input type="text" name="5th_cycle" class="form-control"  data-required="true" placeholder="fifth_cycle" required>   

                          </div>
                        </div>
                        <div class="line line-dashed line-lg pull-in"></div>
                     
                         <div class="form-group">
                          <label class="col-sm-3 control-label">6th Cycle</label>
                          <div class="col-sm-9">
                            <input type="text" name="6th_cycle" class="form-control"  data-required="true" placeholder="sixth_cycle" required>   

                          </div>
                        </div>


                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">7th Cycle Onwords</label>
                            <div class="col-sm-9">
                            <input type="text" name="7th_cycle" class="form-control"  data-required="true" placeholder="seventh_cycle" required>   

                          </div>
                         </div>
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        
                      <footer class="panel-footer text-right bg-light lter">
                       
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                        <a href="{{url('/admin/commission')}}" class="btn btn-danger">Cancel</a>
                      </footer>


                     </div>

                     {{Form::close()}}



                     @endif
                      
                      
          

</section>
</section>
</section>

@endsection


@section('scripts')

 <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>


@endsection