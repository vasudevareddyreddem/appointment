
				<div class="container">
				<h3 style="margin-top:100px;">Add Job</h3>
			<div class="col-md-12">
			
				
				   <form id="addjob" name="addjob" method="post" action="<?php echo base_url('jobs/addpost'); ?>">
							<div class="row add">
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="">Job Title:</label>
							  <input type="text" class="form-control" id="title" placeholder="Enter Job Title" name="title" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Category:</label>
							  <input type="text" class="form-control" id="category" placeholder="Enter Category" name="category" >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Qualifications:</label>
							  <input type="text" class="form-control" id="qualifications" placeholder="Enter Qualifications" name="qualifications" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Min. Required Experience</label>
							  <input type="text" class="form-control" id="experience" placeholder="Enter Experience" name="experience" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Salary</label>
							  <input type="text" class="form-control" id="salary" placeholder="Enter Salary " name="salary" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">District</label>
							  <input type="text" class="form-control" id="district" placeholder="Enter District " name="district" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">State</label>
							  <input type="text" class="form-control" id="state" placeholder="Enter State " name="state" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">last date to apply</label>
							  <input type="date" class="form-control" id="last_to_apply"  name="last_to_apply" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group ">
							  <label for="#">Description:</label>
							  <textarea  class="form-control" id="description"  name="description" required></textarea>
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
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },
            category: {
                validators: {
                    notEmpty: {
                        message: 'Category is required'
                    }
                }
            },
			qualifications: {
                validators: {
                    notEmpty: {
                        message: 'Qualifications is required'
                    }
                }
            },
          experience: {
                validators: {
                    notEmpty: {
                        message: 'Experience is required'
                    }
                }
            },
			 salary: {
                validators: {
                    notEmpty: {
                        message: 'Salary is required'
                    }
                }
            },
			 district: {
                validators: {
                    notEmpty: {
                        message: 'District is required'
                    }
                }
            },
			state: {
                validators: {
                    notEmpty: {
                        message: 'State is required'
                    }
                }
            },
             last_to_apply: {
                validators: {
                    notEmpty: {
                        message: 'last_to_apply is required'
                    }
                }
            },   
			description:{
			validators: {
                    notEmpty: {
                        message: 'Description is required'
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