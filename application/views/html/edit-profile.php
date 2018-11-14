
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
                        <div class="card-header bg-white">
                            <a href="<?php echo base_url('profile'); ?>" class="btn btn-sm btn-info">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                            <strong class="card-title">Edit Profile</strong>
                        </div>
                        <div class="card-body">
                            <form id="edit_profile" name="edit_profile" method="post" action="<?php echo base_url('profile/editpost'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Name</label>
                                            <input type="text" id="name" name="name" value="<?php echo isset($user_details['name'])?$user_details['name']:''; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email Id</label>
                                            <input type="email" id="email" name="email" value="<?php echo isset($user_details['email'])?$user_details['email']:''; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Phone Number</label>
                                            <input type="text" id="mobile" name="mobile" value="<?php echo isset($user_details['mobile'])?$user_details['mobile']:''; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Profile Pic</label>
                                            <input type="file" id="image" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-info text-center">
                                    Update Profile
                                </button>
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
<br/>
<br/>
<br/>
<!--Main layout-->

<script type="text/javascript">
$(document).ready(function() {
    $('#edit_profile').bootstrapValidator({
        
        fields: {
             name: {
                validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
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
            },mobile: {
                validators: {
					notEmpty: {
						message: 'Mobile Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10,14}$/,
					message:'Mobile Number must be 10 to 14 digits'
					}
				
				}
            },image: {
                validators: {
					
					regexp: {
					regexp: "(.*?)\.(png|jpeg|jpg|gif)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif files are allowed'
					}
				}
            }
            }
        })
     
});

</script>

