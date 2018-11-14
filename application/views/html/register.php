<main class="">
        <div class="container">

            <!--Section: Post-->
            <section class="mt-4" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/login-bg.png); background-repeat: no-repeat;background-attachment: fixed;background-position: center; ">

                <!--Grid row-->
                <div class="row" >

                    <!--Grid column-->
                    <div class="col-md-5 mx-auto">
                        
                        <div class=" mt-3">
						  <h1 class="py-2 text-center h2 ">Register</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <form id="defaultForm" action="<?php echo base_url('users/registerpost'); ?>" method="post">
                                            
                                            <div class="form-row">
                                                <div class="col form-group">
                                                    <!-- First name -->
                                                    <div class="md-form">
                                                        <input type="text" id="name" name="name" class="form-control">
                                                        <label for="">Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md-form mt-0 form-group">
                                                <input type="text" id="email" name="email" class="form-control">
                                                <label for="">Email</label>
                                            </div>
                                            <div class="md-form form-group">
                                                <input type="password" id="password" name="password" class="form-control">
                                                <label for="">Password</label>
                                            </div>
											<div class="md-form form-group">
                                                <input type="password" id="confirmpassword" name="confirmpassword" class="form-control">
                                                <label for="">Confirm Password</label>
                                            </div>
                                            <div class="md-form form-group">
                                                <input type="text" id="mobile" name="mobile" class="form-control">
                                                <label for="">Mobile Number</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-outline-primary btn-md btn-block mb-4 waves-effect waves-light"  role="button">Sign Up</button>
                                            </div>
                                            <div class="md-form">
                                                <p class="font-small d-flex justify-content-center">Are you a already a member? <a href="<?php echo base_url('users/login'); ?>" class="blue-text ml-1">Login</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Post-->

        </div>
    </main>
   
<script type="text/javascript">
$(document).ready(function() {
	
    $('#defaultForm').bootstrapValidator({
//     
        fields: {
            name: {
                validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Name wont allow <> [] = % '
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
            password: {
               validators: {
					notEmpty: {
						message: 'Password is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Password wont allow <> [] = % '
					}
				}
            },confirmpassword: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'Password and Confirm Password do not match'
					}
					}
				}
        }
    });
});
</script>