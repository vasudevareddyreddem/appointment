				<div class="col-md-9">
			<h1>Edit Employee</h1>
				<form id="addemp" name="addemp" method="post" action="<?php echo base_url('employeer/editpost'); ?>">
							<input type="hidden" name="a_u_id" id="a_u_id" value="<?php echo isset($details['a_u_id'])?$details['a_u_id']:''; ?>">
							<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="">Name:</label>
							  <input type="text" class="form-control" id="name" placeholder="Enter Name" value="<?php echo isset($details['name'])?$details['name']:''; ?>" name="name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Mobile:</label>
							  <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" value="<?php echo isset($details['mobile'])?$details['mobile']:''; ?>" name="mobile">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Email Id:</label>
							  <input type="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo isset($details['email'])?$details['email']:''; ?>" name="email">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Profile Pic</label>
							  <input type="file" class="form-control" id="profile_pic" placeholder="Enter Profile Pic" name="profile_pic">
							</div>
						</div>
						
						<div class="col-md-12">
							<button class="btn btn-success btn-primary">Update</button>
						</div>
				
				</div>
				</form>
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