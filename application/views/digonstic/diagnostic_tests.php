
<!--Main layout-->
<main class="" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
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
                        <!-- Content -->
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
                <div class="col-md-12 mx-auto mb-5">

                    <div class="row">
					<?php  //echo '<pre>';print_r($packages_list);exit; ?>
					<?php if(isset($packages_list) && count($packages_list)>0){ ?>
					<?php $cnt=1;foreach($packages_list as $list){ ?>
					<?php if($cnt<=3){ ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

                            <!-- Card -->
                            <div class="card">

                                <div class="card-img-top" style="background-image: url(img/tests.jpg);">

                                    <!-- Content -->
                                    <div class="text-white site-blue-color py-4 px-4">
                                        <div>
                                            <h4 class="card-title mb-0"><strong><?php echo isset($list['test_package_name'])?$list['test_package_name']:''; ?></strong></h4>
                                            <small><?php echo isset($list['accrediations'])?$list['accrediations']:''; ?></small><br>
                                            <small><?php echo isset($list['instruction'])?$list['instruction']:''; ?></small>
                                        </div>
                                    </div>

                                </div>

                                <!-- Card content -->
                                <div class="card-body">

                                    <div class="media d-block d-md-flex">
                                        <i class="d-flex mt-1 mx-auto fa fa-user fa-1x"></i>
                                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                            <h5 class="font-weight-bold mb-1">Includes Tests  <?php echo isset($list['instruction'])?count($list['package_test_list']):''; ?> </h5>
											<h6>Lab Name : <?php echo isset($list['lab_name'])?$list['lab_name']:''; ?></h6>
											<?php $count=1;foreach($list['package_test_list'] as $li){ ?>
												<?php if($count<=2){ ?>
												<label class="d-block mt-0 mb-0"><?php echo isset($li['test_name'])?$li['test_name']:''; ?></label>
												<?php } ?>
											<?php $count++;} ?>
											<label class="d-block mt-0 mb-0">
											<a class="text-primary" data-toggle="modal" data-target="#centralModal<?php echo $cnt; ?>">View All</a>
											</label>
											<div class="modal fade" id="centralModal<?php echo $cnt; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

												<!-- Change class .modal-sm to change the size of the modal -->
												<div class="modal-dialog" role="document" style="overflow-y: initial !important">


												  <div class="modal-content">
													<div class="modal-header">
													  <h4 class="modal-title w-100" id="myModalLabel"> Tests</h4>
													  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													  </button>
													</div>
													<div class="modal-body list-style-view-more" style="height:400px;overflow-y: auto;">
														<?php foreach($list['package_test_list'] as $li){ ?>
														<div class="list-group">
															<a href="#" class="list-group-item"><?php echo isset($li['test_name'])?$li['test_name']:''; ?></a>
														</div>
													  <?php } ?>
													</div>
												   
												  </div>
												</div>
											  </div>
											<p>Reports In :<?php echo isset($list['reports_time'])?$list['reports_time']:''; ?> </p>
                                        </div>
                                    </div>
                                   

                                </div>

                                <div class="card-footer bt-none mdb-color lighten-5 pb-2" style="border-top:none;">

                                    <div class="d-inline-block d-md-flex">
                                        <label class="text-white font-weight-bold green lighten-1 p-1"><?php echo number_format(floatval($list['percentage']), 0); ?> %off </label>
                                        <label class="font-weight-bold p-1 ml-auto mr-auto">Rs.<?php echo isset($list['amount'])?($list['amount']-$list['discount']):''; ?> <strike class="dark-grey-text font-weight-bold">Rs.<?php echo isset($list['amount'])?$list['amount']:''; ?></strike></label>
                                        <div class="pull-right mt-0">
                                            <a id="package_name" class="btn btn-outline-primary btn-sm mt-0 pl-2 pr-2 font-weight-bold" href="<?php echo base_url('diagnostic/addcart/'.base64_encode($list['l_t_p_id'])); ?>"  role="button">Book nOw</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- Card -->
                        </div>
					<?php } ?>
					<?php $cnt++;} ?>

					
					<?php } ?>
					<div class="col-md-12" style="display:none" id="showmore1">
					<div class="row">
                       <?php $cnt=1;foreach($packages_list as $list){ ?>
					  <?php if($cnt>3){ ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

                            <!-- Card -->
                            <div class="card">

                                <div class="card-img-top" style="background-image: url(img/tests.jpg);">

                                    <!-- Content -->
                                    <div class="text-white site-blue-color py-4 px-4">
                                        <div>
                                            <h4 class="card-title mb-0"><strong><?php echo isset($list['test_package_name'])?$list['test_package_name']:''; ?></strong></h4>
                                            <small><?php echo isset($list['accrediations'])?$list['accrediations']:''; ?></small><br>
                                            <small><?php echo isset($list['instruction'])?$list['instruction']:''; ?></small>
                                        </div>
                                    </div>

                                </div>

                                <!-- Card content -->
                                <div class="card-body">

                                    <div class="media d-block d-md-flex">
                                        <i class="d-flex mt-1 mx-auto fa fa-user fa-1x"></i>
                                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                            <h5 class="font-weight-bold mb-1">Includes Tests <?php echo isset($list['instruction'])?count($list['package_test_list']):''; ?>  </h5>
											<h6>Lab Name : <?php echo isset($list['lab_name'])?$list['lab_name']:''; ?></h6>
											<?php $count=1;foreach($list['package_test_list'] as $li){ ?>
												<?php if($count<=2){ ?>
												<label class="d-block mt-0 mb-0"><?php echo isset($li['test_name'])?$li['test_name']:''; ?></label>
												<?php } ?>
											<?php $count++;} ?>
											<label class="d-block mt-0 mb-0">
											<a class="text-primary" data-toggle="modal" data-target="#centralModal<?php echo $cnt; ?>">View All</a>
											</label>
											<div class="modal fade" id="centralModal<?php echo $cnt; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

												<!-- Change class .modal-sm to change the size of the modal -->
												<div class="modal-dialog" role="document" style="overflow-y: initial !important">


												  <div class="modal-content">
													<div class="modal-header">
													  <h4 class="modal-title w-100" id="myModalLabel"> Tests</h4>
													  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													  </button>
													</div>
													<div class="modal-body list-style-view-more" style="height:400px;overflow-y: auto;">
														<?php foreach($list['package_test_list'] as $li){ ?>
														<div class="list-group">
															<a href="#" class="list-group-item"><?php echo isset($li['test_name'])?$li['test_name']:''; ?></a>
														</div>
													  <?php } ?>
													</div>
												   
												  </div>
												</div>
											  </div>
											<p>Reports In :<?php echo isset($list['reports_time'])?$list['reports_time']:''; ?></p>
                                        </div>
                                    </div>
                                   

                                </div>

                                <div class="card-footer bt-none mdb-color lighten-5 pb-2" style="border-top:none;">

                                    <div class="d-inline-block d-md-flex">
                                        <label class="text-white font-weight-bold green lighten-1 p-1"><?php echo number_format(floatval($list['percentage']), 0); ?> %off </label>
                                        <label class="font-weight-bold p-1 ml-auto mr-auto">Rs.<?php echo isset($list['amount'])?($list['amount']-$list['discount']):''; ?> <strike class="dark-grey-text font-weight-bold">Rs.<?php echo isset($list['amount'])?$list['amount']:''; ?></strike></label>
                                        <div class="pull-right mt-0">
                                            <a id="package_name" class="btn btn-outline-primary btn-sm mt-0 pl-2 pr-2 font-weight-bold" href="<?php echo base_url('diagnostic/addcart/'.base64_encode($list['l_t_p_id'])); ?>"  role="button">Book nOw</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- Card -->
                        </div>
					<?php } ?>
					<?php $cnt++;} ?>
					</div>
					</div>
					<div class="clearfix">&nbsp;</div>
                    <div class="col-md-12">
                    <div class="text-center py-2">
                        <a id="readmore1" class="btn btn-success">More Packages</a>
                    </div>
                    </div>

                    </div>
                    
                    

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>

    </section>
    <!--Section: Post-->
</main>
<!-- Central Modal Small -->

  <!-- Central Modal Small -->
<!--Main layout-->
<script>
var cnt=2;
		$("#readmore1").click(function(){
				$("#loadcon1").slideToggle("slow", "linear");
				if((cnt % 2) === 0){
			$("#readmore1").text("Less Packages..");
			}else{
				$("#readmore1").text("More Packages..");
			}
			cnt++;
		});
 $('#readmore1').click(function(){
          $('#showmore1').toggle();

      });
</script>

