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
			<div class="py-4 col-md-12">
				<div class="pricing card-deck flex-column flex-md-row mb-3">
				<?php if(isset($plans_list) && count($plans_list)>0){ ?>
					<?php foreach($plans_list as $lis){ ?>
					<div class="card card-pricing text-center px-3 mb-4">
						<span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm"><?php echo isset($lis['p_type'])?$lis['p_type']:''; ?></span>
						<div class="bg-transparent card-header pt-4 border-0">
							<h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15">₹<span class="price"><?php echo isset($lis['p_amt'])?$lis['p_amt']:''; ?></span><span class="h6 text-muted ml-2">/ per <?php echo isset($lis['no_of_resume_view'])?$lis['no_of_resume_view']:''; ?>  Job</span></h1>
						</div>
						<form action="<?php echo base_url('payment/'); ?>" method="post">
						<input type="hidden" name="plan_id" value="<?php echo isset($lis['j_p_id'])?$lis['j_p_id']:''; ?>">
						<div class="card-body pt-0">
							<ul class="list-unstyled mb-4">
								<li>Up to <?php echo isset($lis['no_of_resume_view'])?$lis['no_of_resume_view']:''; ?> users</li>
								<li>Monthly updates</li>
								<li>Free cancelation</li>
							</ul>
							<button type="submit" class="btn btn-outline-secondary mb-3">Select</button>
						</div>
						</form>
					</div>
					<?php } ?>
				<?php } ?>
				
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
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>

