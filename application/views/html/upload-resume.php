<head>
 <title>Health Cards In Tirupati</title>
    <meta name="description" content=" Get Med Arogya health card in Tirupati and get 20% discount on every OP, IP and Lab tests. These health cards can store 
	patient’s information regarding doctor's prescription, lab test reports, prescribed medicines, no. of hospital visits and many more. " />
    <meta name="keywords" content="health cards in tirupati, healthcards in tirupati, tirupati health cards, health card care, healthcards in tirupathi, " />
</head>

<!--Main layout-->
 <main class="mt-5">
            <section class="pt-4 wow fadeIn" style="margin-top:100px;">
			<div class="container">
			<form id="uploadresume" name="uploadresume" action="<?php echo base_url('job/upploadresume_post'); ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="post_id" id="post_id" value="<?php echo isset($post_id)?$post_id:''; ?>">
				<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Upload Resume:</label>
							  <input type="file" class="form-control" id="resume"  name="resume" required>
							</div>
						</div>
						
						<div class="col-md-12">
							<button  type="submit" class="btn btn-success btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
			</section>
            <!--Section: Main info-->
           
            
       
    </main>
    <!--Main layout-->
<!--Main layout-->
<script type="text/javascript">
$(document).ready(function() {
	$('#uploadresume').bootstrapValidator({
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