				<div class="container">
				<div class="col-md-12 add table-responsive">
					<table class="table table-bordered " id="dtBasicExample">
					<h3>Plan details List</h3>
			<thead>
				<tr>
					<th>Sr.no</th>
					<th>Plan Name</th>
					<th>Plan Type</th>
					<th>NO of resume view</th>
					<th>Amount</th>
					<th>Created Date & Time</th>
					<th>Used resume count</th>
				
				</tr>
				</thead>
				<tbody>
				<?php if(isset($plan_list) && count($plan_list)>0){ ?>
					<?php $cnt=1;foreach($plan_list as $li){ ?>
						<tr>
							<td><?php echo $cnt; ?></td>
							<td><?php echo isset($li['p_name'])?$li['p_name']:''; ?></td>
							<td><?php echo isset($li['p_type'])?$li['p_type']:''; ?></td>
							<td><?php echo isset($li['resume_cnt'])?$li['resume_cnt']:''; ?></td>
							<td><?php echo isset($li['p_amt'])?$li['p_amt']:''; ?></td>
							<td><?php echo isset($li['created_at'])?$li['created_at']:''; ?></td>
							<td><?php echo isset($c_resum_count['cnt'])?$c_resum_count['cnt']:''; ?></td>
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


