
					<div class="container">
					
					<div class="row add">
					<h3>Employee List</h3>
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
								<?php if($li['status']==1){ ?>
								<a href="<?php echo base_url('employeer/status/'.base64_encode($li['a_u_id']).'/'.base64_encode($li['status'])); ?>" class="btn btn-danger btn-sm btn-block confirmation1"><?php if($li['status']==0){ echo "Active"; }else{ echo "Deactive"; }; ?></a>

								<?php }else{ ?>
								<a href="<?php echo base_url('employeer/status/'.base64_encode($li['a_u_id']).'/'.base64_encode($li['status'])); ?>" class="btn btn-danger btn-sm btn-block confirmation0"><?php if($li['status']==0){ echo "Active"; }else{ echo "Deactive"; }; ?></a>

								<?php } ?>
								&nbsp; <a href="<?php echo base_url('employeer/delete/'.base64_encode($li['a_u_id'])); ?>" class="btn btn-warning btn-sm btn-block confirmation2">Delete</a>
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
      $('.confirmation2').on('click', function() {
        return confirm('Are you sure want to delete?');
      });$('.confirmation0').on('click', function() {
        return confirm('Are you sure want to activate?');
      });$('.confirmation1').on('click', function() {
        return confirm('Are you sure want to deactivate?');
      });
    });
</script>