<!--Main layout-->
 <main class="mt-5 bg-white">
            <section class="pt-4 wow fadeIn" style="margin-top:100px;">
			<div class="container" style="min-height:500px;">
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
					<?php if($user_details['role']==3){ ?>
							<a href="<?php echo base_url('employeer/dashboard'); ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1)=='employeer' && $this->uri->segment(2)=='dashboard'){ echo "active"; } ?> ">Dashboard</a>
							<a href="<?php echo base_url('employeer/add'); ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1)=='employeer' && $this->uri->segment(2)=='add'){ echo "active"; } ?> ">Add Employee</a>
							<a href="<?php echo base_url('employeer/index'); ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1)=='employeer' && $this->uri->segment(2)=='index'){ echo "active"; } ?> ">Employee List</a>
							<a href="<?php echo base_url('employeer/plans'); ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1)=='employeer' && $this->uri->segment(2)=='plans'){ echo "active"; } ?> ">Plans</a>

					<?php }else{ ?>
						<a href="<?php echo base_url('jobs'); ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1)=='jobs' && $this->uri->segment(2)==''){ echo "active"; } ?> ">Dashboard</a>
						<a href="<?php echo base_url('jobs/add'); ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1)=='jobs' && $this->uri->segment(2)=='add'){ echo "active"; } ?>">Add Job</a>
						<a href="<?php echo base_url('jobs/lists'); ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1)=='jobs' && $this->uri->segment(2)=='lists'){ echo "active"; } ?>">Posted Jobs</a>
						<a href="<?php echo base_url('jobs/appliedlist'); ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1)=='jobs' && $this->uri->segment(2)=='appliedlist'){ echo "active"; } ?>">Applied List</a>
					<?php } ?>
					</div>
				</div>