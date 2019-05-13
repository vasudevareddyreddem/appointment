
				<div class="container">
				<h3 style="margin-top:100px;">Add  Employee</h3>
			<div class="col-md-12">
			
				<!--<form id="addemp" name="addemp" method="post" action="<?php echo base_url('employeer/addpost'); ?>">	-->
				   <form id="defaultForm" method="post"  action="">
				
							<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="">Name:</label>
							  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="firstName" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Mobile:</label>
							  <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Email Id:</label>
							  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Password</label>
							  <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd"  >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Confirm Password</label>
							  <input type="password" class="form-control" id="confirmpwd" placeholder="Confirm Password" name="confirmpwd" >
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
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            lastName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'The username is not available'
                    },
                    different: {
                        field: 'password,confirmPassword',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            birthday: {
                validators: {
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The birthday is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            'languages[]': {
                validators: {
                    notEmpty: {
                        message: 'Please specify at least one language you can speak'
                    }
                }
            },
            'programs[]': {
                validators: {
                    choice: {
                        min: 2,
                        max: 4,
                        message: 'Please choose 2 - 4 programming languages you are good at'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
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