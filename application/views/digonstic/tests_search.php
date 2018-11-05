
<!--Main layout-->
<main class="">
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card mt-4">

                        <!-- Content -->
                        <div class="card-body text-center">
                           
							<form action="<?php echo base_url('diagnostic/search'); ?>" method="post" >
							 <div class="row">
									<div class="col-md-3">
										<div class="form-group mb-0">
											<select class="form-control" id="city" name="city" required>
												<option value="">Select city</option>
												<?php if(isset($city_list) && count($city_list)>0){ ?>
													<?php foreach($city_list as $list){ ?>
														<option value="<?php echo isset($list['city'])?$list['city']:''; ?>"><?php echo isset($list['city'])?$list['city']:''; ?></option>
													<?php } ?>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group mb-0">
											<input type="text" name="search_value" id="search_value" class="form-control" placeholder="Search for Test and Labs">
										</div>
									</div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-outline-black btn-md mt-0">Search</button>
									</div>
									</div>
								</form>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
     <!--Section: Post-->
    <section class="mt-4">
        <div class="container">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mx-auto mb-5">
				
				<?php if(isset($labs_lists) && count($labs_lists)>0){ ?>
					<?php foreach($labs_lists as $list){ ?>

						<div class="card mb-4 wow fadeIn">

							<!--Card content-->
							<div class="card-body">

								<div class="media d-block d-md-flex">
								<?php 
								$mail_url=$this->config->item('lab_url');
								if($list['profile_pic']==''){ ?>
									<img class="d-flex mb-3 mx-auto z-depth-1" src="<?php echo base_url('assets/profile_pic/dia-test.png'); ?>" alt="Logo" style="width: 100px;">
								<?php }else{ ?>
								<img class="d-flex mb-3 mx-auto z-depth-1" src="<?php echo $mail_url.'assets/profile_pic/'.$list['profile_pic']; ?>" alt="<?php echo isset($list['profile_pic'])?$list['profile_pic']:''; ?>" style="width: 100px;">
								<?php } ?>
									<div class="media-body text-center text-md-left ml-md-3 ml-0">
										<h5 class="mt-0 font-weight-bold"><?php echo isset($list['name'])?$list['name']:''; ?></h5>
										<ul class="list-inline mb-0">
											<li class="list-block mr-3">
												<i class="fa fa-building-o"></i>
												<label class="grey-text font-size-20 mb-1"><b><?php echo isset($list['test_names'])?$list['test_names']:''; ?></b></label>
											</li>
											<!--<li class="list-block mr-3">
												<i class="fa fa-user"></i>
												<label class="grey-text font-size-20 mb-1">1283 tests booked</label>
											</li>-->
											<li class="list mr-3">
												<i class="fa fa-user"></i>
												<label class="grey-text font-size-20 mb-1">Home Sample Pickup </label>
											</li>
										</ul>
									</div>
									<div class="mt-auto">
										<a id="" class="btn btn-primary btn-sm mb-0 waves-effect waves-light" href="<?php echo base_url('diagnostic/profile/'.base64_encode($list['a_id'])); ?>" role="button">View Profile</a>
									</div>
								</div>

							</div>

						</div>
						
					<?php } ?>
				<?php } ?>
                   
                    
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>

    </section>
    <!--Section: Post-->
</main>
<!--Main layout-->


