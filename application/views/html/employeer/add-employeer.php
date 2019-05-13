
				<div class="container">
				<h3 style="margin-top:100px;">Add  Employee</h3>
			<div class="col-md-12">
			
				<form id="addemp" name="addemp" method="post" action="<?php echo base_url('employeer/addpost'); ?>">
				
							<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="">Name:</label>
							  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Mobile:</label>
							  <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Email Id:</label>
							  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Password</label>
							  <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd" required >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Confirm Password</label>
							  <input type="password" class="form-control" id="confirmpwd" placeholder="Confirm Password" name="confirmpwd" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Profile Pic</label>
							  <input type="file" class="form-control" id="profile_pic" placeholder="Enter Profile Pic" name="profile_pic">
							</div>
						</div>
						
						<div class="col-md-12">
							<button class="btn btn-success btn-primary">Submit</button>
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
            mobile: {
               validators: {
					notEmpty: {
						message: 'Mobile is required'
					
				}
            }
        }
    });
});
</script>