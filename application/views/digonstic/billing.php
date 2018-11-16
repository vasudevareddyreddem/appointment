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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input past_address" id="defaultUnchecked" value="1" onchange="valueChanged()">
                                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                                    </div>
                                                    <small class="">9-25,Narayanapuram</small><br>
                                                    <small class="">Dachepalli, Guntur,A.p</small><br>
                                                    <small class="">Pin Code : 500016</small><br>
                                                    <small class="">Mobile Number : 98xxxxx230</small><br>
                                                    <small class="">Email : admin@gmail.com</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input past_address" id="defaultUnchecked" value="1" onchange="valueChanged()">
                                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                                    </div>
                                                    <small class="">9-25,Narayanapuram</small><br>
                                                    <small class="">Dachepalli, Guntur,A.p</small><br>
                                                    <small class="">Pin Code : 500016</small><br>
                                                    <small class="">Mobile Number : 98xxxxx230</small><br>
                                                    <small class="">Email : admin@gmail.com</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
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
									<input type="hidden" name="lab_id" id="lab_id" value="<?php echo isset($lab_id)?$lab_id:''; ?>">
									<input type="hidden" name="patient_details_id" id="patient_details_id" value="<?php echo isset($patient_details_id)?$patient_details_id:''; ?>">

                                    <a href="<?php echo base_url('diagnostic/patient_details/'.base64_encode($lab_id).'/'.base64_encode($patient_details_id)); ?>"  class="btn btn-secoundary btn-md btn-previous black-text">Back</a>
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
                                <small>
                                    <?php echo count($cart_item_details); ?> Tests</small>
                            </div>
                        </div>
                        <hr class="mt-2 mb-2">

                        <!--Card content-->
                        <div class="card-body pt-0">
                            <?php $total='';$delivery_charge='';foreach($cart_item_details as $li){  ?>
                            <div class="d-block d-md-flex mt-2">
                                <div>
                                    <a href="javascript:void(0);" onclick="remove_item(<?php echo $li['c_id']; ?>);"><i class="fa fa-times"></i></a>
                                    <small class="ml-2">
                                        <?php echo isset($li['test_name'])?$li['test_name']:''; ?> ( Lab Name:
                                        <?php echo isset($li['name'])?$li['name']:''; ?> ) </small>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span>
                                            <?php echo isset($li['test_amount'])?$li['test_amount']:''; ?></span></small>
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
                                    <p class="mb-0"><span>₹</span> <span>
                                            <?php echo isset($delivery_charge)?$delivery_charge:''; ?></span></p>
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

    function valueChanged()
    {
        if($('.past_address').is(":checked"))   
            $(".new_address_form").hide();
        else
            $(".new_address_form").show();
    }
</script>
