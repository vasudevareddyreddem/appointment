<!--Main layout-->
 <main class="mt-5 bg-white">
            <section class="pt-4 wow fadeIn" style="margin-top:100px;">
			<div class="container" style="min-height:500px;">
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
					<?php if($user_details['role']==3){ ?>
							<a href="<?php echo base_url('employeer/add'); ?>" class="list-group-item list-group-item-action active">Add Employee</a>

					<?php }else{ ?>
						<a href="<?php echo base_url('jobs'); ?>" class="list-group-item list-group-item-action active">Dashboard</a>
						<a href="<?php echo base_url('jobs/add'); ?>" class="list-group-item list-group-item-action ">Add Job</a>
						<a href="<?php echo base_url('jobs/lists'); ?>" class="list-group-item list-group-item-action">Posted Jobs</a>
						<a href="<?php echo base_url('jobs/appliedlist'); ?>" class="list-group-item list-group-item-action">Applied List</a>
					<?php } ?>
					</div>
				</div>