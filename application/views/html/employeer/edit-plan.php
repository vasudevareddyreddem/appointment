
				<div class="col-md-9">
				<h1>Edit Plan</h1>
				<form id="addemp" name="addemp" method="post" action="<?php echo base_url('employeer/editplanspost'); ?>">
					<input type="hidden" name="j_p_id" id="j_p_id" value="<?php echo isset($details['j_p_id'])?$details['j_p_id']:''; ?>">

							<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="">Plan Type :</label>
							  <input type="text" class="form-control" id="p_type" placeholder="Enter Plan type" name="p_type" value="<?php echo isset($details['p_type'])?$details['p_type']:''; ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="">Amount :</label>
							  <input type="text" class="form-control" id="amount" placeholder="Enter Amount" name="amount" value="<?php echo isset($details['p_amt'])?$details['p_amt']:''; ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">No of resumes view:</label>
							  <input type="text" class="form-control" id="no_of_resume_view" placeholder="Enter No of resumes view" name="no_of_resume_view" value="<?php echo isset($details['no_of_resume_view'])?$details['no_of_resume_view']:''; ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Expiry date:</label>
							  <input type="date" class="form-control" id="expiry_date" placeholder="Enter Expiry date" name="expiry_date" value="<?php echo isset($details['expiry_date'])?$details['expiry_date']:''; ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Plan Name:</label>
							  <input type="text" class="form-control" id="plan_name" placeholder="Enter Plan Name" name="plan_name" value="<?php echo isset($details['p_name'])?$details['p_name']:''; ?>" required>
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

