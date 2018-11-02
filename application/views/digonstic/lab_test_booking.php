<?php include('header.php'); ?>
<style type="text/css">
    .form-box .card-body{
        height: 550px;
    }
    form.payment_form fieldset {
        display: none;
    }
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
                        <form role="form" class="payment_form" id="payment_form" action="">

                            <fieldset class="card">
                                <div class="card-header unique-color">
                                    <h4 class="mb-0 white-text">Time Slot</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Select Time Slot</label>
                                        <select class="form-control" name="pts_timeslot">
                                            <option value="">Select</option>
                                            <option value="">00</option>
                                            <option value="">00</option>
                                            <option value="">00</option>
                                            <option value="">00</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-info btn-md btn-next">Continue</button>
                                </div>
                            </fieldset>

                            <fieldset class="card">
                                <div class="card-header unique-color">
                                    <h4 class="mb-0 white-text">Patient Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="pd_name" name="pd_name">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12 mb-0">
                                            <label>Patient Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Enter Number" id="pd_number" name="pd_number">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 mb-0">
                                            <label>Age</label>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <input type="text" class="form-control" placeholder="" id="pd_age" name="pd_age">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <select class="form-control">
                                                        <option value="">Years</option>
                                                        <option value="">Months</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Id</label>
                                        <input type="text" name="pd_email" placeholder="Enter email address" class="form-control" id="pd_email">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="pd_gender" id="pd_gender">
                                            <option disabled selected>Select</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-secoundary btn-md btn-previous black-text">Back</button>
                                    <button type="button" class="btn btn-info btn-md btn-next">Continue</button>
                                </div>
                            </fieldset>

                            <fieldset class="card">
                                <div class="card-header unique-color">
                                    <h4 class="mb-0 white-text">Patient Address </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" placeholder="Enter Number" id="pa_number" name="pa_number">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Locality</label>
                                            <input type="text" class="form-control" placeholder="Enter Locality" id="pa_locality" name="pa_locality">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Pincode</label>
                                            <input type="text" class="form-control" placeholder="Enter Pincode" id="pa_pincode" name="pa_pincode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" id="pa_address" name="pa_address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Landmark</label>
                                        <input type="text" class="form-control" placeholder="Enter Number" id="pa_landmark" name="pa_landmark">
                                    </div>
                                    <div class="form-group">
                                        <label>Label</label>
                                        <select class="form-control">
                                            <option disabled selected>Select</option>
                                            <option>Home</option>
                                            <option>Work</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-secoundary btn-md btn-previous black-text">Back</button>
                                    <button type="button" class="btn btn-info btn-md btn-next">Continue</button>
                                </div>
                            </fieldset>

                            <fieldset class="card">
                                <div class="card-header unique-color">
                                    <h4 class="mb-0 white-text">Payment Process </h4>
                                </div>
                                <div class="card-body">

                                    <div class="custom-control custom-radio mt-2">
                                        <input type="radio" class="custom-control-input p-type" id="p_online" name="payment_type" value="online" checked>
                                        <label class="custom-control-label" for="p_online">Credit / Debit / ATM Card</label>
                                    </div>

                                    <div class="form form-online pt-3">

                                        <div class="form-group">
                                            <label for="po_cnumber">Card Number</label>
                                            <input type="text" id="po_cnumber" name="po_cnumber" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="po_cvv">CVV</label>
                                                    <input type="text" id="po_cvv" name="po_cvv" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="po_emonth">Expiry Month</label>
                                                            <select id="po_emonth" name="po_emonth" class="form-control">
                                                                <option value="" disabled selected>MM</option>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="po_eyear">Expiry Year</label>
                                                            <select id="po_eyear" name="po_eyear" class="form-control">
                                                                <option value="" disabled selected>YY</option>
                                                                <option value="1">22</option>
                                                                <option value="2">23</option>
                                                                <option value="3">24</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="custom-control custom-radio mt-2 mb-2">
                                        <input type="radio" class="custom-control-input p-type" id="p_net" name="payment_type" value="net-banking">
                                        <label class="custom-control-label" for="p_net">Net-Banking</label>
                                    </div>

                                    <div class="form form-net-banking pt-3">

                                        <div class="form-group">
                                            <select id="pn_sbank" name="pn_sbank" class="form-control">
                                                <option value="" disabled selected>Select Bank</option>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pn_username">Username</label>
                                                    <input type="text" id="pn_username" name="pn_username" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pn_password">Password</label>
                                                    <input type="text" id="pn_password" name="pn_password" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input p-type" id="p_cash" name="payment_type" value="cash">
                                        <label class="custom-control-label" for="p_cash">Cash on Delivery</label>
                                    </div>
                                    
                                    <button type="button" class="btn btn-secoundary btn-md btn-previous black-text">Back</button>
                                    <button type="submit" class="btn btn-info btn-md mt-2">Confirm</button>

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
                                <h6 class="mt-0 mb-0 font-weight-bold">Selected Tests</h6>
                                <small class="mt-0">Thyrocare, Domalguda</small>
                            </div>
                            <div class="mt-auto ml-auto">
                                <small>2 Tests</small>
                            </div>
                        </div>
                        <hr class="mt-2 mb-2">

                        <!--Card content-->
                        <div class="card-body pt-0">
                            <div class="d-block d-md-flex mt-2">
                                <div>
                                    <small class="ml-2">FISH - AMLI / ETO IN AML M - 2</small>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span>3500</span></small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-1">
                            <div class="d-block d-md-flex mt-2">
                                <div>
                                    <small class="ml-2">FISH - AMLI / ETO IN AML M - 2</small>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span>3500</span></small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-1">
                            <div class="d-block d-md-flex mt-2">
                                <div>
                                    <small class="ml-2">Pick up charges</small>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span>0</span></small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-1">
                            <div class="d-block d-md-flex mt-2 p-2 green lighten-5">
                                <div>
                                    <p class="mb-0">Total</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>&#8377;</span> <span>7000</span></p>
                                </div>
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

<?php include('footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.payment_form fieldset:first-child').show();

        // next step
        $('.payment_form .btn-next').on('click', function() {
            var parent_fieldset = $(this).parents('fieldset');
            var next_step = true;

            if (next_step) {
                parent_fieldset.fadeOut(0, function() {
                    $(this).next().show();
                });
            }

        });

        // previous step
        $('.payment_form .btn-previous').on('click', function() {
            $(this).parents('fieldset').fadeOut(0, function() {
                $(this).prev().show();
            });
        });

    });
</script>

<script>
    function selectForm() {
        $("div.form").hide();
        $("div.form-" + $("input:checked").val()).show();
    }
    selectForm();
    $("input.p-type").click(function() {
        selectForm()
    });
</script>

<script>

    $(document).ready(function() {
        $('#payment_form').bootstrapValidator({

            fields: {
                pts_timeslot: {
                    validators: {
                        notEmpty: {
                            message: 'Time Slot is required'
                        }
                    }
                },
                pd_name: {
                    validators: {
                        notEmpty: {
                            message: 'Patient Name is required'
                        }
                    }
                },
                pd_number: {
                    validators: {
                        notEmpty: {
                            message: 'Patient Number is required'
                        }
                    }
                },
                pd_age: {
                    validators: {
                        notEmpty: {
                            message: 'Patient Age is required'
                        }
                    }
                },
                pd_email: {
                    validators: {
                        notEmpty: {
                            message: 'Patient Email is required'
                        }
                    }
                },
                pd_gender: {
                    validators: {
                        notEmpty: {
                            message: 'Patient Gender is required'
                        }
                    }
                },
                pa_number: {
                    validators: {
                        notEmpty: {
                            message: 'Number is required'
                        }
                    }
                },
                pa_locality: {
                    validators: {
                        notEmpty: {
                            message: 'Locality is required'
                        }
                    }
                },
                pa_pincode: {
                    validators: {
                        notEmpty: {
                            message: 'Pincode is required'
                        }
                    }
                },
                pa_address: {
                    validators: {
                        notEmpty: {
                            message: 'Address is required'
                        }
                    }
                },
                pa_landmark: {
                    validators: {
                        notEmpty: {
                            message: 'Landmark is required'
                        }
                    }
                },
                po_cnumber: {
                    validators: {
                        notEmpty: {
                            message: 'Card Number is required'
                        }
                    }
                },
                po_cvv: {
                    validators: {
                        notEmpty: {
                            message: 'CVV is required'
                        }
                    }
                },
                po_emonth: {
                    validators: {
                        notEmpty: {
                            message: 'Expiry Month is required'
                        }
                    }
                },
                po_eyear: {
                    validators: {
                        notEmpty: {
                            message: 'Expiry Year is required'
                        }
                    }
                },
                pn_sbank: {
                    validators: {
                        notEmpty: {
                            message: 'Bank Name is required'
                        }
                    }
                },
                pn_username: {
                    validators: {
                        notEmpty: {
                            message: 'Username is required'
                        }
                    }
                },
                pn_password: {
                    validators: {
                        notEmpty: {
                            message: 'Password is required'
                        }
                    }
                }
            }
        })

    });

</script>