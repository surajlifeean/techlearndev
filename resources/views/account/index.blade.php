@extends('main')

@section('content')

<section class="dashboard-section">

        @include('partials._sidenav')

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

							
							
							<h4>Personal information</h4>
							
							<div class="form-wrapper">
								<form action="">
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Title</label>
											<select name="" id="" class="form-control">
												<option value="">Mr.</option>
												<option value="">Ms.</option>
												<option value="">Mrs.</option>
												<option value="">Prof.</option>
												<option value="">Dr.</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>First Name</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Last Name</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Last Name</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Relation With Nominee</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Contact No</label>
											<input type="tel" class="form-control">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Email Id</label>
											<input type="email" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Date Of Birth</label>
											<input type="date" class="form-control" placeholder="DD/MM/YYYY">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Mod Of Correspondence</label>
											<input type="v" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Name of Father/Guardian</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Address</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Landmark</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									
									<div class="pt-4 mb-4">
										<h3>Bank Information</h3>
									</div>
									
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Account Name</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Account Number</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">Bank Name</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6 from-group">
											<label>Branch Name</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row align-items-end">
										<div class="col-md-6 col-sm-6 from-group">
											<label for="">IFSC Code </label>
											<input type="text" class="form-control">
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