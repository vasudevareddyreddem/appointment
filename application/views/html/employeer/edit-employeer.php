
				<div class="container">
				<h3 style="margin-top:100px;">Edit  Employee</h3>
			<div class="col-md-12">
			
				
				<form id="addemp" name="addemp" method="post" action="<?php echo base_url('employeer/editpost'); ?>">
					<input type="hidden" name="a_u_id" id="a_u_id" value="<?php echo isset($details['a_u_id'])?$details['a_u_id']:''; ?>" enctype="multipart/form-data">

							<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="">Name:</label>
							  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo isset($details['name'])?$details['name']:''; ?>" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Mobile:</label>
							  <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" value="<?php echo isset($details['mobile'])?$details['mobile']:''; ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Email Id:</label>
							  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo isset($details['email'])?$details['email']:''; ?>">
							</div>
						</div>
						
						
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Profile Pic</label>
							  <input type="file" class="form-control" id="profile_pic" placeholder="Enter Profile Pic" name="profile_pic">
							</div>
						</div>
						
						<div class="col-md-12">
							<button type="submit" class="btn btn-success btn-primary" name="signup" value="Sign up">Submit</button>
						</div>
				
				</div>
				</form>
				</div>
				</div>
				</div>
			</div>
			</section>
            <!--Section: Main info-->
           
            
       
    </main>
    <!--Main layout-->
<!--Main layout-->

<script type="text/javascript">
$(document).ready(function() {
    $('#addemp').bootstrapValidator({
//      
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            email: {
                validators: {
					notEmpty: {
						message: 'Email Id is required'
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
						message: 'Mobile  is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 digits'
					}
				
				}
            },
           pwd: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
           confirmpwd: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'pwd',
						message: 'password and Confirm Password do not match'
					}
					}
				},
                profile_pic: {
                validators: {
					regexp: {
					regexp: "(.*?)\.(png|jpeg|jpg|gif)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif files are allowed'
					}
				}
            }
			
			
			
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>