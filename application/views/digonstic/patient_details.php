<style type="text/css">
    
</style>
<!--Main layout-->
<main class="">

    <!--Section: Post-->
    <section class="mt-5">
        <div class="container">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8">
                    <div class="form-box">
                        <form role="form" method="post" class="payment_form" id="patient_details" name="patient_details" action="<?php echo base_url('diagnostic/patient_details_post'); ?>">
							<input type="hidden" name="l_t_a_id" id="l_t_a_id" value="<?php echo isset($patient_details['l_t_a_id'])?$patient_details['l_t_a_id']:''; ?>">

                            <fieldset class="card">
                                <div class="card-header unique-color">
                                    <h4 class="mb-0 white-text">Patient Details</h4>
                                </div>
                                <div class="card-body">
								 <?php $time_list=array("06:00 am","06:30 am","07:00 am","07:30 am","08:00 am","08:30 am","09:00 am","09:30 am","10:00 am","10:30 am","11:00 am","11:30 am","12:00 pm","12:30 pm","01:00 pm","01:30 pm","02:00 pm","02:30 pm","03:00 pm","03:30 pm","04:00 pm","04:30 pm","05:00 pm","05:30 pm","06:00 pm"); ?>
                                    <div class="form-group">
                                        <label>Select Time Slot</label>
                                        <select class="form-control" name="time" id="time">
                                          	<option value="">Select</option>
											<?php foreach($time_list as $list){ ?>
											<?php if($list==$patient_details['time']){ ?>
												<option selected value="<?php echo $list; ?>"><?php echo $list; ?></option>
											<?php }else{ ?>
												<option value="<?php echo $list; ?>"><?php echo $list; ?></option>

											<?php } ?>
											<?php } ?>
                                        </select>
									 </div>
									 <div class="form-group">
                                        <label>Time</label>
                                         <input type="date" class="form-control" id="date" name="date" value="<?php echo isset($patient_details['date'])?$patient_details['date']:''; ?>">

									 </div>
                                
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name" value="<?php echo isset($patient_details['name'])?$patient_details['name']:''; ?>">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12 mb-0">
                                            <label>Patient Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Enter Number" id="mobile" name="mobile" value="<?php echo isset($patient_details['mobile'])?$patient_details['mobile']:''; ?>">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 mb-0">
                                            <label>Age</label>
                                                    <input type="text" class="form-control" placeholder="Age" id="age" name="age"  value="<?php echo isset($patient_details['age'])?$patient_details['age']:''; ?>">
                                              
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Id</label>
                                        <input type="text" name="email" placeholder="Enter email address" class="form-control" id="email" value="<?php echo isset($patient_details['email'])?$patient_details['email']:''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="">Select</option>
                                            <option value="Male" <?php if(isset($patient_details['gender']) && $patient_details['gender']=='Male'){ echo "selected"; } ?>>Male</option>
                                            <option value="Female" <?php if(isset($patient_details['gender']) && $patient_details['gender']=='Female'){ echo "selected"; } ?>>Female</option>
                                            <option value="Others" <?php if(isset($patient_details['gender']) && $patient_details['gender']=='Others'){ echo "selected"; } ?>>Others</option>
                                        </select>
                                    </div>
									<input type="hidden" name="lab_id" id="lab_id" value="<?php echo isset($lab_id)?$lab_id:''; ?>">
                                    <a href="<?php echo base_url('diagnostic/profile/'.base64_encode($lab_id)); ?>" type="button" class="btn btn-secoundary btn-md btn-previous black-text">Back</a>
                                    <button type="submit" class="btn btn-info btn-md btn-next">Continue</button>
                                </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4">

                    <?php if(isset($cart_item_details) && count($cart_item_details)>0){ ?>
               <div class="card mb-4">

                        <!--Card content-->
                        <div class="card-body pb-0 d-block d-md-flex">
                            <div class="">
                                <h6 class="mt-0 mb-0 font-weight-bold">Selected Tests</h6>
                            </div>
                            <div class="mt-auto ml-auto">
                                <small><?php echo count($cart_item_details); ?> Tests</small>
                            </div>
                        </div>
                        <hr class="mt-2 mb-2">

                        <!--Card content-->
                        <div class="card-body pt-0">
						<?php $total='';$delivery_charge='';foreach($cart_item_details as $li){  ?>
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
        $('#patient_details').bootstrapValidator({

            fields: {
                time: {
                    validators: {
                        notEmpty: {
                            message: 'Time Slot is required'
                        }
                    }
                },
                name: {
                     validators: {
   					notEmpty: {
   						message: 'Patient Name is required'
   					},
   					regexp: {
   					regexp: /^[a-zA-Z0-9. ]+$/,
   					message: 'Patient Name can only consist of alphanumeric, space and dot'
   					}
   				}
                },
                mobile: {
                    validators: {
   					notEmpty: {
   						message: 'Mobile Number is required'
   					},
   					regexp: {
   					regexp:  /^[0-9]{10,14}$/,
   					message:'Mobile Number must be 10 to 14 digits'
   					}
					}
                },
                age: {
                   validators: {
   					notEmpty: {
   						message: 'Age is required'
   					},
   					regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Age must be in digits'
   					}
   				}
                },
                email: {
                    validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
					}
                },
                gender: {
                    validators: {
                        notEmpty: {
                            message: 'Patient Gender is required'
                        }
                    }
                }
            }
        })

    });

</script>