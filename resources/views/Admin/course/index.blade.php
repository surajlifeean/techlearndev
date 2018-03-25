@extends('adminmain')

@section('content')


<section id="content">
<section class="vbox">
<section class="scrollable padder">

 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{route('course-management.index')}}">Product Management</a></li>
                <li><a href="{{route('course-management.index')}}">Product List</a></li>
               
              </ul>

 
                      <header class="panel-heading">
                        <span class="h4">Product Listing</span>
                      </header>

                       <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                      <!-- <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a> -->
                      <div class="btn-group">
                       <a href="{{route('course-management.index')}}"> <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button></a>
                        <button type="button" class="btn btn-sm btn-default delete-many" title="Remove"><i class="fa fa-trash-o"></i></button>

                          &nbsp;&nbsp;
                        <a href="" class="active-status" aria-label="Left Align" onclick="changebulkstatus('Y')"  title="Deactivate Newsletter Subscription">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </a>
                 
                  &nbsp;&nbsp;
                  <a href="" class="inactive-status" aria-label="Left Align" onclick="changebulkstatus('N')"  title="Activate Newsletter Subscription">
                       <i class="fa fa-unlock" aria-hidden="true"></i>
                      </a>
                      </div>
                      <a href="{{route('course-management.create')}}" class="btn btn-sm btn-default"><i class="fa fa-plus"></i>Add New Product</a>
                    </div>

                    <form action="" method="get">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                   
                      <input type="text" class="input-sm form-control" name="search" value=""  placeholder="Enter Product Title">
                        <span class="input-group-btn">
                            
                          <button class="btn btn-sm btn-default" type="submit">Go!</button>
   
                        </span>
                      
                      </div>
                    </div>
                    </form>
                  </div>
                </header>



                
                <section class="scrollable wrapper w-f">
                  <section class="panel panel-default">
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none">
                        <thead>
                          <tr>
                            <th width="20"><input type="checkbox" value="" class="checkAll"></th>
                            <!-- <th width="20"></th> -->
                            <th>Name</th>
                            <th class="th-sortable" data-toggle="class">Starting Price
                              
                            </th>
                            <th>Class</th>
                            <th>Service</th>
                            <th >Category</th>
                            <th>Image</th>
                            <th >Created At</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>

				@foreach($products as $product)
                          <tr>

                            <td><input type="checkbox" name="del[]" value="{{$product->id}}" id="checked"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->starting_price}}</td>
                            <td>{{$product->class}}</td>
                            
                            <td>{{$product->service}}</td>

                            <td>
                            {{$product->category->name}}<br>
                            </td>
                            <td>
                            <img src={{asset('/uploaded_images/'.$product->productimages[0]->image_name)}}	
                            </td>

                            <td>{{date('jS M, Y', strtotime($product->created_at))}}</td>
                            <td>
                                @if($product->status=='A')
           <a href="#" class="active-status" aria-label="Left Align" onclick="changestatus('A',{{$product->id}})" data-toggle="tooltip" title="Deactivate Product">
                       <i class="fa fa-unlock" aria-hidden="true"></i>
                      </a>
                 
                  @else
                  <a href="#" class="inactive-status" aria-label="Left Align" onclick="changestatus('I',{{$product->id}})" data-toggle="tooltip" title="Activate Product">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </a>
                   

                  @endif


                              <a href="#" class="delete-icon" id="{{$product->id}}" aria-label="Left Align" data-toggle="tooltip" title="Delete Villa">
                			 <i class="fa fa-trash-o" aria-hidden="true"></i>
             					</a>  <!-- delete icon that submits the form -->
                                             
             					  {!! Html::LinkRoute('product.edit','',array($product->id),array('class'=>"fa fa-pencil-square-o",'data-toggle'=>"tooltip",'title'=>"Edit Villa"))!!}

                        <a href="{{route('product.show',$product->id)}}" data-toggle="tooltip" title="Villa Details"><i class="fa fa-search-plus"></i></a>

                            </td>
                           
                          </tr>

                    {!! Form::open(['route'=>['product.destroy',$product->id], 'method'=>'DELETE','class'=>'delete-villa','id'=>'delete'.$product->id])!!}
                        {!!Form::close()!!}



                          @endforeach
                        
                        </tbody>
                      </table>
                    </div>
                  </section>
                </section>

{!!$products->links()!!}


<div> Showing {!!$products->count()!!}|{!!$products->total()!!}</div>
    
                      
                 
                     


</section>
</section>
</section>
@endsection