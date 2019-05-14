				<div class="container">
				<div class="col-md-12 add table-responsive">
					<table class="table table-bordered " id="dtBasicExample">
					<h3>User Applied list</h3>
			<thead>
				<tr>
					<th>Sr.no</th>
					<th>Name</th>
					<th>Qualification</th>
					<th>Experience</th>
					<th>Applied for</th>
					<th>Job Title</th>
					<th>District</th>
					<th>Resume</th>
					<th>Applied Date & Time</th>
					<th>Status</th>
				
				</tr>
				</thead>
				<tbody>
				<?php if(isset($appiled_list) && count($appiled_list)>0){ ?>
					<?php $cnt=1;foreach($appiled_list as $li){ ?>
						<tr>
							<td><?php echo $cnt; ?></td>
							<td><?php echo isset($li['name'])?$li['name']:''; ?></td>
							<td><?php echo isset($li['qualifications'])?$li['qualifications']:''; ?></td>
							<td><?php echo isset($li['experience'])?$li['experience']:''; ?></td>
							<td><?php echo isset($li['category'])?$li['category']:''; ?></td>
							<td><?php echo isset($li['title'])?$li['title']:''; ?></td>
							<td><?php echo isset($li['district'])?$li['district']:''; ?></td>
							<td>
								<?php if(isset($li['resume']) && $li['resume']!=''){ ?>
								<a style="color:blue" onclick="update_resume_cnt('<?php echo $li['user_id']; ?>','<?php echo $li['post_id']; ?>');"   href="<?php echo base_url('assets/resume/'.$li['resume']); ?>" download>Download</a>
								<?php } ?>
							</td>
							<td><?php echo isset($li['created_at'])?$li['created_at']:''; ?></td>
							<td>
							<?php if($li['status']==1){ echo "called for interview";}else if($li['status']==2){ echo "rejected"; }else{  echo "Pending"; } ?>
							</td>
						</tr>
					<?php $cnt++;} ?>
				<?php } ?>
				</tbody>
			</table>
				</div>
				</div>
				</div>
			</div>
			</section>
            <!--Section: Main info-->
           
            
       
    </main>
    <!--Main layout-->
<!--Main layout-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div style="padding:10px">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="pull-left" class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="" method="POST" action="<?php echo base_url('jobs/interviewpost'); ?>" enctype="multipart/form-data">
                            <div id="content1" class="col-lg-12 form-group">
                                Are you sure ?
                            </div>

                            <div class="col-lg-12">
							<label class=" control-label">Comment</label>
							<input type="text" id="comment" name="comment" class="form-control" placeholder="Enter comment" required>
                            </div>
                            <br>
                            <div class="col-lg-12">
							<input type="hidden" name="u_a_p_id" id="u_a_p_id"  value="">
							<input type="hidden" name="statusval" id="statusval"  value="">
                            </div>
							<a type="button" onclick="sentcommet();" class="btn btn-primary " name="signup" value="signup">Submit</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
function update_resume_cnt(u_id,p_id){
	jQuery.ajax({
		url: "<?php echo base_url('jobs/update_resume_cnt');?>",
		data: {
			user_id:u_id,
			post_id:p_id,
		},
		dataType: 'json',
		type: 'POST',
		success: function (data) {
			//console.log(data.msg);
		}
	});
}
function sentcommet(){
	if($('#comment').val()==''){
		alert('Commnet is required');return false;
	}
			jQuery.ajax({
					url: "<?php echo base_url('jobs/application_status');?>",
					data: {
						u_a_p_id: $('#u_a_p_id').val(),
						status: $('#statusval').val(),
						comment: $('#comment').val(),
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
						if(data.msg==1){
							alert('successfully  upload comment');
							 location.reload(); 
						}else if(data.msg==0){
							alert('Technical problem will occurred please try again later');return false;
						}else if(data.msg==0){
							location.reload();
						}
				 }
			});
	}
 function admindedelete(id){
   	$("#u_a_p_id").val(id);
   }
   function admindedeletemsgreject(id){
			$("#statusval").val(id);
   			$('#content1').html('Are you sure you want to call for interview?');
   
   }
   function admindedeletemsgrejects(id){
			$("#statusval").val(id);
   			$('#content1').html('Are you sure you want to reject?');
   } 
</script>