
<!--Main layout-->
<main class="pt-3">

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
								<div class="col-md-12">

								<!-- Stepers Wrapper -->
								<ul class="stepper stepper-horizontal">

								  <!-- First Step -->
								  <li class="completed">
									<a href="#!">
									  <span class="circle">1</span>
									  <span class="label">Patient Details</span>
									</a>
								  </li>

								  <!-- Second Step -->
								  <li class="">
									<a href="#!">
									  <span class="circle">2</span>
									  <span class="label">Patient Address</span>
									</a>
								  </li>

								  <!-- Third Step -->
								  <li class="">
									<a href="#!">
									  <span class="circle">3</i></span>
									  <span class="label">Payment Process</span>
									</a>
								  </li>

								</ul>
								<!-- /.Stepers Wrapper -->

							  </div>
							   <hr style="margin:0px;">
                                <div class="card-body">
								 <?php $time_list=array("06:00 am","06:30 am","07:00 am","07:30 am","08:00 am","08:30 am","09:00 am","09:30 am","10:00 am","10:30 am","11:00 am","11:30 am","12:00 pm","12:30 pm","01:00 pm","01:30 pm","02:00 pm","02:30 pm","03:00 pm","03:30 pm","04:00 pm","04:30 pm","05:00 pm","05:30 pm","06:00 pm"); ?>
                                    <div class="form-group">
                                        <label>Select Sample Pickup Time Slot</label>
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
                                        <label>Sample Pickup Date</label>
                                         <input type="date" class="form-control"  min="<?php echo date('Y-m-d'); ?>" id="date" name="date" value="<?php echo isset($patient_details['date'])?$patient_details['date']:''; ?>">

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
                                    <a href="<?php echo base_url('diagnostic/cart/'); ?>" type="button" class="btn btn-secoundary btn-md btn-previous black-text">Back</a>
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
							
                            <div class="d-block d-md-flex mt-2 p-2 green lighten-5 px-4">
                                <div>
                                    <p class="mb-0">Sample pickup Charges</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>&#8377;</span> <span><?php  
									echo isset($delivery_charge)?$delivery_charge:'';
									
									?></span></p>
                                </div>
                            </div>
                            <div class="d-block d-md-flex p-2 green lighten-5 px-4" style="border-top:1px solid #ddd">
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