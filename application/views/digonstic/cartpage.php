
		<?php if(isset($list) && count($list)>0){ ?>
               <div class="card mb-4">

                        <!--Card content-->
                        <div class="card-body pb-0 d-block d-md-flex">
                            <div class="">
                                <h6 class="mt-0 mb-0 font-weight-bold">Selected Tests</h6>
                            </div>
                            <div class="mt-auto ml-auto">
                                <small><?php echo count($list); ?> Tests</small>
                            </div>
                        </div>
                        <hr class="mt-2 mb-2">

                        <!--Card content-->
                        <div class="card-body pt-0">
						<?php $total='';$delivery_charge='';foreach($list as $li){  ?>
                            <div class="d-block d-md-flex mt-2">
                                <div>
                                    <a href="javascript:void(0);" onclick="remove_item(<?php echo $li['c_id']; ?>);"><i class="fa fa-times"></i></a>
                                    <small class="ml-2"><?php echo isset($li['test_name'])?$li['test_name']:''; ?> ( Lab Name: <?php echo isset($li['name'])?$li['name']:''; ?> ) </small>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span><?php echo isset($li['test_amount'])?$li['test_amount']:''; ?></span></small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-1">
							<?php 
								$total +=$li['test_amount'];
								$delivery_charge +=$li['delivery_charge'];
							}

							?>
							<div class="d-block d-md-flex mt-2 p-2 green lighten-5">
                                <div>
                                    <p class="mb-0">Delivery Charges</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>₹</span> <span><?php echo isset($delivery_charge)?$delivery_charge:''; ?></span></p>
                                </div>
                            </div>
							<div class="d-block d-md-flex mt-2 p-2 green lighten-5">
                                <div>
                                    <p class="mb-0">Total</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>₹</span> <span>
									<?php 
									$overall_amount=(($total)+($delivery_charge));
									echo isset($overall_amount)?$overall_amount:''; ?>
									</span></p>
                                </div>
                            </div>
                            
                            <a class="btn btn-success btn-block mt-3" href="<?php echo base_url('diagnostic/patient_details/'.base64_encode($lab_id)); ?>">Checkout</a>
                        </div>
                    </div>
		<?php } ?>
					<script>
					function remove_item(c_id){
						if(c_id!=''){
							 jQuery.ajax({
								url: "<?php echo base_url('diagnostic/remove_cart_item_id');?>",
								data: {
									c_id: c_id,
								},
								type: "POST",
								format:"json",
								dataType: 'html',
										success:function(data){
											$('#sucessmsg').show();
										$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-succ">Product Successfully removed to cart <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');
											$('#cart_item_count').empty();
											$('#cart_item_count').append(data);

										}
							   });
						}
					}
					</script>
					
					<?php exit; ?>

              
             
