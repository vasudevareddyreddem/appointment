<head>
 <title>Health Cards In Tirupati</title>
    <meta name="description" content=" Get Med Arogya health card in Tirupati and get 20% discount on every OP, IP and Lab tests. These health cards can store 
	patient’s information regarding doctor's prescription, lab test reports, prescribed medicines, no. of hospital visits and many more. " />
    <meta name="keywords" content="health cards in tirupati, healthcards in tirupati, tirupati health cards, health card care, healthcards in tirupathi, " />
</head>

<!--Main layout-->
 <main class="mt-5 bg-white">
            <section class="pt-4 wow fadeIn" style="margin-top:100px;">
			<div class="container" style="min-height:500px;">
			<form>
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
					<table class="table table-bordered " id="dtBasicExample">
			<thead>
				<tr>
					<th>Job Title</th>
					<th>Qualification</th>
					<th>Experence</th>
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
			</section>
            <!--Section: Main info-->
           
            
       
    </main>
    <!--Main layout-->
<!--Main layout-->

