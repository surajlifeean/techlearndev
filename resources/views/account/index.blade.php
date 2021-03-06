@extends('main')

@section('content')

<section class="dashboard-section">

        @include('partials._sidenav')
<?php //echo "<pre>"; print_r($userDetails);?>
        <div class="dashboard-area">
            <div class="dashboard-area-top">
                <a href="javascript:void(0);" class="dashboard-collapse"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> &nbsp; &nbsp;Dashboard</a>
            </div>

                        <div class="p-3 pt-5 pb-5 mb-5 card-wrap">
              	
				
				
				<div class="profile-form-wrapper">
					<div class="row justify-content-center">
						<div class="col-sm-11">
						<div class="proifle-status">
							<h4>Profile: <span style="color: blue">Active</span></h4>
						</div>

							
							
							<h4>Personal information </h4>
							
							<div class="form-wrapper">
								<!--<form action="">-->
								{{Form::open(['route' => 'SaveAccount','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Title</label>
											<select name="title" id="" class="form-control">
												<option value="Mr" <?php if($userDetails->title=="Mr"){ ?> selected="selected" <?php   }?> >Mr.</option>
												<option value="Ms" <?php if($userDetails->title=="Ms"){ ?> selected="selected" <?php   }?>>Ms.</option>
												<option value="Mrs" <?php if($userDetails->title=="Mrs"){ ?> selected="selected" <?php   }?> >Mrs.</option>
												<option value="Prof" <?php if($userDetails->title=="Prof"){ ?> selected="selected" <?php   }?> >Prof.</option>
												<option value="Dr" <?php if($userDetails->title=="Dr"){ ?> selected="selected" <?php   }?> >Dr.</option>
											</select>
											
											
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>First Name</label>
											<input type="text" name="fname" value="{!!($userDetails->fname)!!}" class="form-control">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Last Name</label>
											<input type="text" name="lname" value="{!!($userDetails->lname)!!}" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Nominee</label>
											<input type="text" name="nominee" value="{!!($userDetails->nominee)!!}"  class="form-control">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Relation With Nominee</label>
											<input type="text" name="relation_with_nominee" value="{!!($userDetails->relation_with_nominee)!!}"  class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Contact No</label>
											<input type="tel" name="contact_no" value="{!!($userDetails->contact_no)!!}" class="form-control">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Email Id</label>
											<input type="email" name="email" value="{!!($userDetails->email)!!}"  class="form-control" disabled>
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Date Of Birth</label>
											<input type="date"  name="dob" value="<?php echo date('Y-m-d',strtotime($userDetails["dob"])) ?>"  class="form-control" placeholder="DD/MM/YYYY">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Mod Of Correspondence</label>
											<input type="v" name="correspondence" value="{!!($userDetails->correspondence)!!}"  class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Name of Father/Guardian</label>
											<input type="text"  name="guardian" value="{!!($userDetails->guardian)!!}"  class="form-control">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Address</label>
											<input type="text" name="address" value="{!!($userDetails->address)!!}"  class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Landmark</label>
											<input type="text" name="landmark" value="{!!($userDetails->landmark)!!}" class="form-control">
										</div>
									</div>
									
									
									<div class="pt-4 mb-4">
										<h3>Bank Information</h3>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Account Name</label>
											<input type="text" name="AccountName" value="{!!($bankAccountDetails->AccountName)!!}"  class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Account Number</label>
											<input type="text" name="AccountNumber" value="{!!($bankAccountDetails->AccountNumber)!!}"  class="form-control">
										</div>
									</div>
									<div class="row align-items-end">
										<!--<div class="col-md-6 col-sm-6 from-group">
											<label >Bank Name</label>
											<input type="text" name"BankName" value="{!!($bankAccountDetails->BankName)!!}"  class="form-control">
										</div>-->
										<div class="col-md-6 col-sm-6 from-group">
											<label>Bank Name</label>
											<input type="text" name="BankName" value="{!!($bankAccountDetails->BankName)!!}"  class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Branch Name</label>
											<input type="text" name="BranchName" value="{!!($bankAccountDetails->BranchName)!!}"  class="form-control">
										</div>
									</div>
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">IFSC Code </label>
											<input type="text" name="IfscCode" value="{!!($bankAccountDetails->IfscCode)!!}"  class="form-control">
										</div>
										
									</div>
									
									<div class="button-set">
										<button type="submit" class="button-small">
											Save Changes	
										</button>
									</div>
									
								</form>
								
								
								
							</div>
						</div>
					</div>
				</div>

            </div>

            
        </div>


    </section>
	

@endsection