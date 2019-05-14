<div class="container">
				<div class="col-md-12 add table-responsive">
				
					<table class="table table-bordered " id="dtBasicExample">
					<h3>Posted Jobs<h3>
			<thead>
				<tr>
					<th>Job Title</th>
					<th>Category Name</th>
					<th>Qualification</th>
					<th>Experience</th>
					<th>District</th>
					<th>last date to apply</th>
					<th>Status</th>
					<th>Action</th>
				
				</tr>
				</thead>
				<tbody>
				<?php if(isset($jobs_list) && count($jobs_list)>0){ ?>
					<?php foreach($jobs_list as $lis){ ?>
						<tr>
							<td><?php echo isset($lis['title'])?$lis['title']:''; ?></td>
							<td><?php echo isset($lis['category'])?$lis['category']:''; ?></td>
							<td><?php echo isset($lis['qualifications'])?$lis['qualifications']:''; ?></td>
							<td><?php echo isset($lis['experience'])?$lis['experience']:''; ?></td>
							<td><?php echo isset($lis['district'])?$lis['district']:''; ?></td>
							<td><?php echo isset($lis['last_to_apply'])?$lis['last_to_apply']:''; ?></td>
							<td><?php if($lis['status']==1){echo "Active";}else if($lis['status']==0){ echo "Deactive"; } ?></td>
							<td>
							<a href="<?php echo base_url('jobs/status/'.base64_encode($lis['j_p_id']).'/'.base64_encode($lis['status'])); ?>"><?php if($lis['status']==0){echo "Active";}else{ echo "Deactive"; } ?></a>
							&nbsp; | <a href="<?php echo base_url('jobs/delete/'.base64_encode($lis['j_p_id'])); ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
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

