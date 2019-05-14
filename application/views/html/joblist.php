<head>
 <title>Health Cards In Tirupati</title>
    <meta name="description" content=" Get Med Arogya health card in Tirupati and get 20% discount on every OP, IP and Lab tests. These health cards can store 
	patient’s information regarding doctor's prescription, lab test reports, prescribed medicines, no. of hospital visits and many more. " />
    <meta name="keywords" content="health cards in tirupati, healthcards in tirupati, tirupati health cards, health card care, healthcards in tirupathi, " />
</head>

<!--Main layout-->
 <main class="mt-5">
            <section class="pt-4 wow fadeIn bg-white" >
			<div class="container">
			<div class="row">
			<div class="py-4 col-md-8">
			<div class="section-heading py-2">
				<h2 class="text-center">Jobs   <span>List</span></h2>
			</div>
			<table class="table table-bordered " id="dtBasicExample">
			<thead>
				<tr>
					<th>Job Title</th>
				</tr>
				</thead>
				<tbody>
				<?php if(isset($jobs_list) && count($jobs_list)>0){ ?>
				<?php foreach($jobs_list as $list){ ?>
					<tr>
						<td>
						<div class="card">
						<h5 class="card-header h5"><span><?php echo isset($list['category'])?$list['category']:''; ?></span><span class="pull-right" style="font-size:14px;">Posted by <?php echo isset($list['postedby'])?$list['postedby']:''; ?>, <?php echo isset($list['df_time'])?$list['df_time']:''; ?></span></h5>
							<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="">
											<i class="fa fa-globe" aria-hidden="true"></i>
												<?php echo isset($list['title'])?$list['title']:''; ?>
											 </div>
											<div class="mt-1">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<?php echo isset($list['district'])?$list['district']:''; ?> <span style="margin-left:50px;"> <strong>Exp : </strong> <?php echo isset($list['experience'])?$list['experience']:''; ?></span>
											</div>	
											<div class="mt-1">
											<i class="fa fa-key" aria-hidden="true"></i> <?php echo isset($list['description'])?$list['description']:''; ?>
											</div>
											<div class="mt-1">
											<i class="fa fa-graduation-cap" aria-hidden="true"></i><?php echo isset($list['qualifications'])?$list['qualifications']:''; ?>
											</div>
										</div>
										<div class="col-md-12 ">
											<a href="<?php echo base_url('job/apply/'.base64_encode($list['j_p_id'])); ?>" class="btn btn-primary btn-sm ">Apply Now</a>
										</div>
										
									</div>
							</div>
						</div>
						</td>
					
					</tr>
					<?php } ?>
					<?php } ?>
					
				</tbody>
			</table>
			</div>
			<div class="py-4 col-md-4">
			<?php if(isset($jobs_category) && count($jobs_category)>0){ ?>
				<div class="card">
					<div class="card-body">
					<h5 class="text-cente">Job Catagories</h5>
					<div class="list-group">
					<?php foreach($jobs_category as $li){ ?>
					<a  href="<?php echo base_url('job/lists/'.base64_encode($li['category'])); ?>" class="list-group-item list-group-item-action"><?php echo isset($li['category'])?$li['category']:''; ?> &nbsp;(<?php echo isset($li['cnt'])?$li['cnt']:''; ?>)</a>
					<?php } ?>
					 
					</div>
					</div>
				</div>
			<?php } ?>
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
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>