<!--Main layout-->
    <main class="pt-5" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
        <div class="container">

            <!--Section: Post-->
            <section class="mt-4"  >

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-5 mx-auto" >
                      
                        <div class="card">
						  <h1 class="py-2 text-center h2 ">Login</h1>
						  <hr>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <form id="defaultForm" action="<?php echo base_url('users/loginpost'); ?>" method="post">
                                            <div class="md-form form-group">
                                                <i class="fa fa-user prefix grey-text"></i>
                                                <input type="text" id="email_id" name="email_id" class="form-control">
                                                <label for="email_id">Email Id</label>
                                            </div>
                                            <div class="md-form form-group">
                                                <i class="fa fa-lock prefix grey-text"></i>
                                                <input type="password" id="password" name="password" class="form-control">
                                                <label for="password">Password</label>
                                            </div>
                                            <p class="font-small blue-text d-flex justify-content-end"><a href="<?php echo base_url('users/forgotpassword'); ?>" class="blue-text ml-1">Forgot Password?</a></p>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light" >Login</button>
                                            </div>
                                            <div class="md-form">
                                                <p class="font-small d-flex justify-content-center">Not a member <a href="<?php echo base_url('users/register'); ?>" class="blue-text ml-1">Sign Up</a></p>
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
            email_id: {
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
            }
        }
    });
});
</script>