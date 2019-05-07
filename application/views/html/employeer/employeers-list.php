
					<div class="container">
					<div class="row add">
			<div class="col-md-12">
					<table class="table table-bordered " id="dtBasicExample">
			<thead>
				<tr>
					<th>Sr.no</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Email id</th>
					<th>Password</th>
					<th>Created Date & Time</th>
					<th>Status</th>
					<th>Action</th>
				
				</tr>
				</thead>
				<tbody>
				<?php if(isset($emp_list) && count($emp_list)>0){ ?>
					<?php $cnt=1;foreach($emp_list as $li){ ?>
						<tr>
							<td><?php echo $cnt; ?></td>
							<td><?php echo isset($li['name'])?$li['name']:''; ?></td>
							<td><?php echo isset($li['mobile'])?$li['mobile']:''; ?></td>
							<td><?php echo isset($li['email'])?$li['email']:''; ?></td>
							<td><?php echo isset($li['org_password'])?$li['org_password']:''; ?></td>
							<td><?php echo isset($li['create_at'])?$li['create_at']:''; ?></td>
							<td><?php if($li['status']==1){ echo "Active"; }else{ echo "Deactive"; }; ?></td>
							<td>
								<a href="<?php echo base_url('employeer/edit/'.base64_encode($li['a_u_id'])); ?>" class="btn btn-success btn-sm btn-block">Edit</a>
								<a href="<?php echo base_url('employeer/status/'.base64_encode($li['a_u_id']).'/'.base64_encode($li['status'])); ?>" class="btn btn-danger btn-sm btn-block confirmation"><?php if($li['status']==0){ echo "Active"; }else{ echo "Deactive"; }; ?></a>
								&nbsp; <a href="<?php echo base_url('employeer/delete/'.base64_encode($li['a_u_id'])); ?>" class="btn btn-warning btn-sm btn-block confirmation">Delete</a>
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