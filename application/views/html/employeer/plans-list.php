<div class="container">
				<div class="col-md-12 add">
					<table class="table table-bordered " id="dtBasicExample">
			<thead>
				<tr>
					<th>Sr.no</th>
					<th>Amount</th>
					<th>No of resumes view</th>
					<th>Expiry date</th>
					<th>Plan Name</th>
					<th>Created Date & Time</th>
					<th>Status</th>
					<th>Action</th>
				
				</tr>
				</thead>
				<tbody>
				<?php if(isset($plans_list) && count($plans_list)>0){ ?>
					<?php $cnt=1;foreach($plans_list as $li){ ?>
						<tr>
							<td><?php echo $cnt; ?></td>
							<td><?php echo isset($li['p_amt'])?$li['p_amt']:''; ?></td>
							<td><?php echo isset($li['no_of_resume_view'])?$li['no_of_resume_view']:''; ?></td>
							<td><?php echo isset($li['expiry_date'])?$li['expiry_date']:''; ?></td>
							<td><?php echo isset($li['p_name'])?$li['p_name']:''; ?></td>
							<td><?php echo isset($li['create_at'])?$li['create_at']:''; ?></td>
							<td><?php if($li['status']==1){ echo "Active"; }else{ echo "Deactive"; }; ?></td>
							<td>
								<a href="<?php echo base_url('employeer/planedit/'.base64_encode($li['j_p_id'])); ?>" class="btn btn-success btn-sm btn-block">Edit</a>
								<a href="<?php echo base_url('employeer/planstatus/'.base64_encode($li['j_p_id']).'/'.base64_encode($li['status'])); ?>" class="btn btn-danger btn-sm btn-block confirmation"><?php if($li['status']==0){ echo "Active"; }else{ echo "Deactive"; }; ?></a>
								&nbsp; <a href="<?php echo base_url('employeer/plandelete/'.base64_encode($li['j_p_id'])); ?>" class="btn btn-warning btn-sm btn-block confirmation">Delete</a>
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

<script>
 $(document).ready(function() {
      $('.confirmation').on('click', function() {
        return confirm('Are you sure ?');
      });
    });
</script>