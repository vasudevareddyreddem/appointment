<main class="">

    <!--Section: Post-->
    <section class="mt-5">
        <div class="container">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8">
                    <div class="form-box">
                        <form role="form" method="post" class="payment_form" id="patient_billing" name="patient_billing" action="<?php echo base_url('diagnostic/billingpost'); ?>">


                            <fieldset class="card">
                                <div class="card-header unique-color">
                                    <h4 class="mb-0 white-text">Patient Address </h4>
                                </div>
                                <div class="card-body">
                                    <!-- Default unchecked -->
									<?php if(isset($billing_details) && count($billing_details)>0){ ?>
                                    <div class="row">
									<?php foreach($billing_details as $list){ ?>
                                        <div class="col-md-4">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="billingadress" class="custom-control-input past_address" id="billingadress<?php echo $list['l_t_b_id']; ?>" onclick="getbillingaddress_id(this.value);" value="<?php echo $list['l_t_b_id']; ?>">
                                                        <label class="custom-control-label" for="billingadress<?php echo $list['l_t_b_id']; ?>"><?php echo isset($list['address_lable'])?$list['address_lable']:''; ?></label>
                                                    </div>
                                                    <small class=""><?php echo isset($list['address'])?$list['address']:''; ?></small><br>
                                                    <small class=""><?php echo isset($list['landmark'])?$list['landmark']:''; ?></small><br>
                                                    <small class=""><?php echo isset($list['locality'])?$list['locality']:''; ?></small><br>
                                                    <small class="">Pin Code : <?php echo isset($list['pincode'])?$list['pincode']:''; ?></small><br>
                                                    <small class="">Mobile Number : <?php echo isset($list['mobile'])?$list['mobile']:''; ?></small><br>
                                                </div>
                                            </div>
                                        </div>
									<?php } ?>
                                    </div>
									<?php } ?>
                                     <div id="newbillingaddress" >   
										<div class="new_address_form">
											<div class="form-group">
												<label>Mobile Number</label>
												<input type="text" class="form-control" placeholder="Enter Number" id="mobile" name="mobile">
											</div>
											<div class="row">
												<div class="form-group col-md-6 col-sm-12">
													<label>Locality</label>
													<input type="text" class="form-control" placeholder="Enter Locality" id="locality" name="locality">
												</div>
												<div class="form-group col-md-6 col-sm-12">
													<label>Pincode</label>
													<input type="text" class="form-control" placeholder="Enter Pincode" id="pincode" name="pincode">
												</div>
											</div>
											<div class="form-group">
												<label>Address</label>
												<textarea class="form-control" id="address" name="address"></textarea>
											</div>
											<div class="form-group">
												<label>Landmark</label>
												<input type="text" class="form-control" placeholder="Enter Landmark" id="landmark" name="landmark">
											</div>
											<div class="form-group">
												<label>Label</label>
												<select class="form-control" id="address_lable" name="address_lable">
													<option value="">Select</option>
													<option value="Home">Home</option>
													<option value="Work">Work</option>
													<option value="Other">Other</option>
												</select>
											</div>
										</div>
									</div>
									<input type="hidden" name="patient_details_id" id="patient_details_id" value="<?php echo isset($patient_details_id)?$patient_details_id:''; ?>">
									<input type="hidden" name="billingaddressid" id="billingaddressid" value="">

                                    <a href="<?php echo base_url('diagnostic/patient_details/'.base64_encode($patient_details_id)); ?>"  class="btn btn-secoundary btn-md btn-previous black-text">Back</a>
                                    <button type="submit" class="btn btn-info btn-md btn-next">Continue</button>
                                </div>
                            </fieldset>


                        </form>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4">

                    <div class="card mb-4">
					 <!--Card content-->
                        <div class="card-body pb-0 d-block d-md-flex">
                            <div class="">
                                <h6 class="mt-0 mb-0 font-weight-bold">Selected Cart Items</h6>
                            </div>
                          
                        </div>
                        <hr class="mt-2 mb-2">
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
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>

    </section>
    <!--Section: Post-->
</main>
<!--Main layout-->
<script>
    $(document).ready(function() {
        $('#patient_billing').bootstrapValidator({

            fields: {
                locality: {
                    validators: {
                        notEmpty: {
                            message: 'Locality is required'
                        },
                        regexp: {
                            regexp: /^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
                            message: 'Locality wont allow <> [] = % '
                        }
                    }
                },
                pincode: {
                    validators: {
                        notEmpty: {
                            message: 'Pin code is required'
                        },
                        regexp: {
                            regexp: /^[0-9]{5,7}$/,
                            message: 'Pin code  must be  5 to 7 characters'
                        }
                    }
                },
                mobile: {
                    validators: {
                        notEmpty: {
                            message: 'Mobile Number is required'
                        },
                        regexp: {
                            regexp: /^[0-9]{10,14}$/,
                            message: 'Mobile Number must be 10 to 14 digits'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'Address is required'
                        }
                    }
                },
                landmark: {
                    validators: {
                        notEmpty: {
                            message: 'Address is required'
                        },
                        regexp: {
                            regexp: /^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
                            message: 'Address wont allow <> [] = % '
                        }
                    }
                },
                address_lable: {
                    validators: {
                        notEmpty: {
                            message: 'Label is required'
                        }
                    }
                }
            }
        })

    });
</script>


<script type="text/javascript">
function getbillingaddress_id(id){
	$('#billingaddressid').val(id);

}
$("input:checkbox").on('click', function() {
	
  var $box = $(this);
  if ($box.is(":checked")) {
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    var group1 = $box.attr("id");
    $(group).prop("checked", false);
    $box.prop("checked", true);
	$('#newbillingaddress').hide();
	
  } else {
	 $('#newbillingaddress').show();
    $box.prop("checked", false);
  }
});
</script>
