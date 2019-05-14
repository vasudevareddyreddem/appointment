
				<div class="container">
			<div class="col-md-12">
			
				
				  <form id="addjob" name="addjob" action="<?php echo base_url('job/upploadresume_post'); ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="post_id" id="post_id" value="<?php echo isset($post_id)?$post_id:''; ?>">
							<div class="row add">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="#">Upload Resume:</label>
							  <input type="file" class="form-control" id="resume"  name="resume" >
							</div>
						</div>
						
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-success btn-primary">Submit</button>
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
    $('#addjob').bootstrapValidator({
//      
        fields: {
            resume: {
                validators: {
                    notEmpty: {
                        message: 'Please upload resume'
                    }
                }
            },
           
			
			
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