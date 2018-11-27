<!--Main layout-->
<main class="pt-3" style="background-image: url(http://localhost/appointment/assets/vendor/img/bac-icons.png);">
    <div class="container">

        <!--Section: Post-->
        <section class="">

            <!--Grid row-->
            <div class="row py-4">

                <!--Grid column-->

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header font-weight-bold bg-white">My Cart</div>
                        <div class="card-body table-responsive">
						 <div class="row">
						<?php foreach($cart_details as $list){ ?>
							
							<?php if($list['type']==0){ ?>
                           
                                  <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>

                                                <p class="mb-0">
                                                    <strong><?php echo isset($list['package_test_list'][0]['test_package_name'])?$list['package_test_list'][0]['test_package_name']:''; ?></strong>
                                                </p>
                                                <p class="mb-0">
                                                    <small>Includes
													<?php echo count($list['package_test_list']); ?>
													tests :

													<?php foreach($list['package_test_list'] as $li){
														
														echo $li['test_name'].',';
														} ?>
													
													</small>
											
													</p>
													
                                                <p>
                                                    <b>&#8377;</b><b class="mr-2"><?php echo isset($list['amount'])?$list['amount']:''; ?></b>
                                                    <small>
                                                        <del class="mr-2">&#8377;<?php echo isset($list['org_amount'])?$list['org_amount']:''; ?></del>
                                                        <u class="text-success"><?php echo number_format(floatval($list['percentage']), 0); ?> %off </u>
                                                    </small>
                                                </p>
                                                <a href="<?php echo base_url('diagnostic/removecartitem/'.base64_encode($list['c_id'])); ?>">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php }else{ ?>
							<div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <p class="mb-0">
                                                    <strong><?php echo isset($list['test_name'])?$list['test_name']:''; ?></strong>
                                                </p>
                                                <p>
                                                    <b>&#8377;</b><b class="mr-2"><?php echo isset($list['amount'])?$list['amount']:''; ?></b>
                                                    <small>
                                                        <b class="mr-12">Sample pickup charges : <?php echo isset($list['delivery_charge'])?$list['delivery_charge']:''; ?></b>
                                                        <b class="mr-12">Reports In : <?php echo isset($list['test_duartion'])?$list['test_duartion']:''; ?></b>
                                                    </small>
                                                </p>
                                                <a href="<?php echo base_url('diagnostic/removecartitem/'.base64_encode($list['c_id'])); ?>">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php } ?>
                                
                           
							<?php } ?>
							 </div>
                        </div>
                        <div class="card-footer text-right">
                             <a class="btn btn-success btn-md mb-0 mt-0" href="<?php echo base_url('diagnostic/patient_details'); ?>">CheckOut</a>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                
                <div class="col-md-4">

                    <div class="card mb-4">
					 <!--Card content-->
                        <div class="card-body pb-0 d-block d-md-flex">
                            <div class="">
                                <h6 class="mt-0 mb-0 font-weight-bold">Selected Cart Items</h6>
                            </div>
                          
                        </div>
                        <hr class="mt-2 mb-2">
						<?php //echo '<pre>';print_r($cart_details);exit; ?>
					<?php $total='';$delivery_charge='';foreach($cart_details as $list){ ?>
                       

                        <!--Card content-->
                        <div class="card-body pt-0">
                            <div class="d-block d-md-flex mt-2">
                                <div>
								<?php if($list['type']==1){ ?>
                                    <small class="ml-2"><?php echo isset($list['test_name'])?$list['test_name']:''; ?></small>
								<?php }else{ ?>
								    <small class="ml-2"><?php echo isset($list['test_package_name'])?$list['test_package_name']:''; ?></small>
								<?php } ?>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span><?php echo isset($list['amount'])?$list['amount']:''; ?></span></small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-1">
                           
                            
                        </div>
					<?php 
					$total +=$list['amount'];
								$delivery_charge +=$list['delivery_charge'];
					} ?>
							<hr class="mt-2 mb-1">
                            <div class="d-block d-md-flex mt-2 p-2 green lighten-5">
                                <div>
                                    <p class="mb-0">Sample pickup Charges</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>&#8377;</span> <span><?php  
									echo isset($delivery_charge)?$delivery_charge:'';
									
									?></span></p>
                                </div>
                            </div>
                            <div class="d-block d-md-flex mt-2 p-2 green lighten-5">
                                <div>
                                    <p class="mb-0">Total</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>&#8377;</span> <span><?php  
									$overall_amount=(($total)+($delivery_charge));
									echo isset($overall_amount)?$overall_amount:'';
									
									?></span></p>
                                </div>
                            </div>
                    </div>

                </div>
                <!--Grid row-->
            </div>
        </section>
        <!--Section: Post-->

    </div>
</main>
<br />
<br />
<!--Main layout-->