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
						<a href="<?php echo base_url('jobs'); ?>" class="list-group-item list-group-item-action active">Dashboard</a>
						<a href="<?php echo base_url('jobs/add'); ?>" class="list-group-item list-group-item-action ">Add Job</a>
						<a href="<?php echo base_url('jobs/lists'); ?>" class="list-group-item list-group-item-action">Posted Jobs</a>
						<a href="<?php echo base_url('jobs/appliedlist'); ?>" class="list-group-item list-group-item-action">Applied List</a>
						
					</div>
				</div>
				<div class="col-md-9">
					<table class="table table-bordered " id="dtBasicExample">
			<thead>
				<tr>
					<th>Sr.no</th>
					<th>Name</th>
					<th>Qualification</th>
					<th>Experence</th>
					<th>Applied for</th>
					<th>District</th>
					<th>Resume</th>
					<th>Applied Date</th>
					<th>Action</th>
				
				</tr>
				</thead>
				<tbody>
				<?php if(isset($appiled_list) && count($appiled_list)>0){ ?>
					<?php $cnt=1;foreach($appiled_list as $li){ ?>
						<tr>
							<td><?php echo $cnt; ?></td>
							<td><?php echo isset($li['cname'])?$li['cname']:''; ?></td>
							<td><?php echo isset($li['qualifications'])?$li['qualifications']:''; ?></td>
							<td><?php echo isset($li['total_exp'])?$li['total_exp']:''; ?></td>
							<td><?php echo isset($li['category'])?$li['category']:''; ?></td>
							<td><?php echo isset($li['district'])?$li['district']:''; ?></td>
							<td>
							<?php if(isset($li['resume']) && $li['resume']!=''){ ?>
							<a style="color:blue" href="<?php echo base_url('assets/resume/'.$li['resume']); ?>" download>Download</a>
							<?php } ?>
							</td>
							<td><?php echo isset($li['created_at'])?$li['created_at']:''; ?></td>
							<td>
								<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($li['u_a_p_id']) ?>');admindedeletemsgreject(1);" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm btn-block">Call for interview </button>
								<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($li['u_a_p_id']) ?>');admindedeletemsgrejects(2);" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm btn-block  mt-1">Reject </button>
							</td>
						</tr>
					<?php $cnt++;} ?>
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
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div style="padding:10px">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="pull-left" class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="" method="POST" action="<?php echo base_url('jobs/interviewpost'); ?>" enctype="multipart/form-data">
                            <div id="content1" class="col-lg-12 form-group">
                                Are you sure ?
                            </div>

                            <div class="col-lg-12">
							<label class=" control-label">Comment</label>
							<input type="text" id="comment" name="comment" class="form-control" placeholder="Enter comment" required>
                            </div>
                            <br>
                            <div class="col-lg-12">
							<input type="hidden" name="u_a_p_id" id="u_a_p_id"  value="">
							<input type="hidden" name="statusval" id="statusval"  value="">
                            </div>
							<a type="button" onclick="sentcommet();" class="btn btn-primary " name="signup" value="signup">Submit</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
function sentcommet(){
	if($('#comment').val()==''){
		alert('Commnet is required');return false;
	}
			jQuery.ajax({
					url: "<?php echo base_url('jobs/application_status');?>",
					data: {
						u_a_p_id: $('#u_a_p_id').val(),
						status: $('#statusval').val(),
						comment: $('#comment').val(),
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
						if(data.msg==1){
							alert('successfully  upload comment');
							 location.reload(); 
						}else if(data.msg==0){
							alert('Technical problem will occurred please try again later');return false;
						}else if(data.msg==0){
							location.reload();
						}
				 }
			});
	}
 function admindedelete(id){
   	$("#u_a_p_id").val(id);
   }
   function admindedeletemsgreject(id){
			$("#statusval").val(id);
   			$('#content1').html('Are you sure you want to call for interview?');
   
   }
   function admindedeletemsgrejects(id){
			$("#statusval").val(id);
   			$('#content1').html('Are you sure you want to reject?');
   } 
</script>