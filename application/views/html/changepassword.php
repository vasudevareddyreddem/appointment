
<!--Main layout-->
<main class="mt-5 pt-5">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mx-auto">

                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-sm btn-info">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                            <strong class="card-title">Change Password</strong>
                        </div>
                        <div class="card-body">
                            <form id="changepassword" name="changepassword" method="post" action="<?php echo base_url('profile/changepwdpost'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label">Old Password</label>
                                            <input type="password" id="oldpassword" name="oldpassword" value="" class="form-control">
                                        </div>
                                    </div>
									<div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label">New Password</label>
                                            <input type="password" id="newpassword" name="newpassword" value="" class="form-control">
                                        </div>
                                    </div>
									<div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label">Confirm Password</label>
                                            <input type="password" id="confirmpassword" name="confirmpassword" value="" class="form-control">
                                        </div>
                                    </div>
                                 	<div class="col-md-8">   
                                <button type="submit" class="btn btn-sm btn-info text-center">
                                    Change
                                </button>
								 </div>
                            </form>
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
<!--Main layout-->

<script type="text/javascript">
$(document).ready(function() {
    $('#changepassword').bootstrapValidator({
        
        fields: {
             oldpassword: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Old Password  must be at least 6 characters. '
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Old Password wont allow <>[]'
					}
				}
            },
			newpassword: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters. '
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
			  confirmpassword: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'newpassword',
						message: 'Password and Confirm Password do not match'
					}
					}
				}
            }
        })
     
});

</script>

