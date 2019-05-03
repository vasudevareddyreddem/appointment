<head>
 <title>Health Cards In Tirupati</title>
    <meta name="description" content=" Get Med Arogya health card in Tirupati and get 20% discount on every OP, IP and Lab tests. These health cards can store 
	patient’s information regarding doctor's prescription, lab test reports, prescribed medicines, no. of hospital visits and many more. " />
    <meta name="keywords" content="health cards in tirupati, healthcards in tirupati, tirupati health cards, health card care, healthcards in tirupathi, " />
</head>

<!--Main layout-->
 <main class="mt-5 bg-white">
            <section class="pt-4 wow fadeIn" style="margin-top:100px;">
			<div class="container">
			
				<div class="row">
			<div class="col-md-3">
					<div class="list-group">
						<a href="<?php echo base_url('jobs'); ?>" class="list-group-item list-group-item-action ">Dashboard</a>
						<a href="<?php echo base_url('jobs/add'); ?>" class="list-group-item list-group-item-action ">Add Job</a>
						<a href="<?php echo base_url('jobs/lists'); ?>" class="list-group-item list-group-item-action active">Posted Jobs</a>
						<a href="<?php echo base_url('jobs/appliedlist'); ?>" class="list-group-item list-group-item-action">Applied List</a>
						
					</div>
				</div>
				<div class="col-md-9">
			
				<form id="addjob" name="addjob" method="post" action="<?php echo base_url('jobs/addpost'); ?>">
							<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="">Job Title:</label>
							  <input type="text" class="form-control" id="title" placeholder="Enter Job Title" name="title">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Category:</label>
							  <input type="text" class="form-control" id="category" placeholder="Enter Category" name="category">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Qualifications:</label>
							  <input type="text" class="form-control" id="qualifications" placeholder="Enter Qualifications" name="qualifications">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Min. Required Experience</label>
							  <input type="text" class="form-control" id="experience" placeholder="Enter Experience" name="experience">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">Salary</label>
							  <input type="text" class="form-control" id="salary" placeholder="Enter Salary " name="salary">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">District</label>
							  <input type="text" class="form-control" id="district" placeholder="Enter District " name="district">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">State</label>
							  <input type="text" class="form-control" id="state" placeholder="Enter State " name="state">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
							  <label for="#">last date to apply</label>
							  <input type="date" class="form-control" id="last_to_apply"  name="last_to_apply">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group ">
							  <label for="#">Description:</label>
							  <textarea  class="form-control" id="description"  name="description"></textarea>
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
			</section>
            <!--Section: Main info-->
           
            
       
    </main>
    <!--Main layout-->
<!--Main layout-->

<script type="text/javascript">
$(document).ready(function() {
	
    $('#addjob').bootstrapValidator({
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
        }
    });
});
</script>