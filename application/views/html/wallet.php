<!--Main layout-->
<main class="pt-3" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
    <div class="container">
        
        <!--Section: Post-->
        <section class="mt-3 mb-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mx-auto py-4">
                    
                    <div class="card my-wallet">
                        
                        <!--Tabs-->
                        <div class="card-header font-weight-bold bg-white mw-list">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php  if(isset($tab) && $tab==''){ echo "active"; } ?>" id="op-tab" data-toggle="tab" href="#op" role="tab" aria-controls="op" aria-selected="true">OP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php  if(isset($tab) && $tab==2){ echo "active"; } ?>" id="ip-tab" data-toggle="tab" href="#ip" role="tab" aria-controls="ip" aria-selected="false">IP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php  if(isset($tab) && $tab==3){ echo "active"; } ?>" id="lab-tab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab" aria-selected="false">Lab</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="whistory-tab" data-toggle="tab" href="#whistory" role="tab" aria-controls="whistory" aria-selected="false">Wallet History</a>
                                </li>
                            </ul>
                        </div>
                        
                        <!--Tabs Content-->
                        <div class="card-body table-responsive mw-content">
                            <div class="tab-content">
                                
                                <!--OP Tab-->
                                <div class="tab-pane fade show <?php  if(isset($tab) && $tab==''){ echo "active"; } ?>" id="op" role="tabpanel" aria-labelledby="op-tab">
                                    <div class="text-center">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span>Total Balance :</span> <b>Rs <?php echo isset($wallet_details['op_wallet_amount'])?$wallet_details['op_wallet_amount']:''; ?></b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Used :</span> <b>Rs <?php if($wallet_details['op_wallet_amount']!=$wallet_details['remaining_op_wallet_amount']){ ?> <?php echo $wallet_details['remaining_op_wallet_amount']-$wallet_details['op_wallet_amount']; ?> <?php }else{ echo "0";} ?></b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Remaining :</span> <b>Rs <?php echo isset($wallet_details['remaining_op_wallet_amount'])?$wallet_details['remaining_op_wallet_amount']:''; ?></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="table-responsive">
									<?php if(isset($appoinment_list) && count($appoinment_list)>0){ ?>
                                        <table id="" class="table table-striped table-bordered dtBasicExample">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">Patient Name
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Mobile Number
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Hospital Name
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">City
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Doctor Name
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Date & Time
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Appointment Fee
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Coupon Code
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php foreach($appoinment_list as $list){ ?>
                                                <tr>
                                                    <td><?php echo isset($list['patinet_name'])?$list['patinet_name']:''; ?></td>
                                                    <td><?php echo isset($list['mobile'])?$list['mobile']:''; ?></td>
                                                    <td><?php echo isset($list['hos_bas_name'])?$list['hos_bas_name']:''; ?></td>
                                                    <td><?php echo isset($list['city'])?$list['city']:''; ?></td>
                                                    <td><?php echo isset($list['resource_name'])?$list['resource_name']:''; ?></td>
                                                    <td>
													<?php echo isset($list['date'])?$list['date']:''; ?>
													<?php echo isset($list['time'])?$list['time']:''; ?>
													</td>
                                                    <td><?php echo isset($list['consultation_fee'])?$list['consultation_fee']:''; ?></td>
                                                    <td>
                                                        <!--<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Generate</button>-->
                                                        <a  href="<?php echo base_url('wallet/generatecoupon/'.base64_encode($list['b_id'])); ?>" class="btn btn-default btn-sm">Generate</a>
                                                        <br>
                                                        <a onclick="get_coupon_code('<?php echo $list['b_id']; ?>')" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCoupon">View</a>
                                                    </td>
                                                </tr>
											<?php } ?>
                                            </tbody>
                                        </table>
										<?php }else{ ?>
										<?php } ?>
                                    </div>
                                </div>
                                
                                <!--IP Tab-->
                                <div class="tab-pane <?php  if(isset($tab) && $tab==2){ echo "active"; } ?>" id="ip" role="tabpanel" aria-labelledby="ip-tab">
                                    <div class="text-center">
                                        <ul class="list-inline">
                                             <li class="list-inline-item">
                                                <span>Total Balance :</span> <b>Rs <?php echo isset($wallet_details['ip_wallet_amount'])?$wallet_details['ip_wallet_amount']:''; ?></b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Used :</span> <b>Rs <?php if($wallet_details['ip_wallet_amount']!=$wallet_details['remaining_ip_wallet']){ ?> <?php echo $wallet_details['remaining_ip_wallet']-$wallet_details['ip_wallet_amount']; ?> <?php }else{ echo "0";} ?></b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Remaining :</span> <b>Rs <?php echo isset($wallet_details['remaining_ip_wallet'])?$wallet_details['remaining_ip_wallet']:''; ?></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <form id="ip_form" name="ip_form" action="<?php echo base_url('wallet/ipcouponcode'); ?>" method="post">

                                                <div class="form-group">
                                                    <label>Select City</label>
                                                    <select id="city" name="city" class="form-control" onchange="get_hos_list(this.value)">
														<option value="">Select City</option>
														<?php if(isset($city_list) && count($city_list)>0){ ?>
														<?php foreach($city_list as $list){ ?>
														 <option value="<?php echo $list['hos_bas_city']; ?>"><?php echo $list['hos_bas_city']; ?></option>
														<?php } ?>
														<?php } ?>
													</select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <select id="hospital_id" name="hospital_id"  class="form-control">
														<option value="">Select Hospital</option>
													</select>
                                                </div>
												<input type="hidden" name="type" id="type" value="2">
												<input type="hidden" name="tab" id="tab" value="2">

                                                <div class="text-center mt-4">
                                                    <button id="ip-submit-btn" type="submit" class="btn btn-primary btn-md mb-4 waves-effect waves-light" role="button">Generate Coupon</button>
                                                </div>
                                            </form>
                                        </div>
										<div class="col-md-12">
										 <table id="" class="table table-striped table-bordered dtBasicExample">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">Coupon code
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Hospital Name
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">City
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php foreach($ip_couponcode_list as $list){ ?>
                                                <tr>
                                                    <td><?php echo isset($list['couponcode_name'])?$list['couponcode_name']:''; ?></td>
                                                    <td><?php echo isset($list['hos_bas_name'])?$list['hos_bas_name']:''; ?></td>
                                                    <td><?php echo isset($list['hos_bas_city'])?$list['hos_bas_city']:''; ?></td>
                                                    
                                                </tr>
											<?php } ?>
                                            </tbody>
                                        </table>
										</div>
                                    </div>
                                </div>
                                
                                <!--Lab Tab-->
                                <div class="tab-pane <?php  if(isset($tab) && $tab==3){ echo "active"; } ?>" id="lab" role="tabpanel" aria-labelledby="lab-tab">
                                    <div class="text-center">
                                        <ul class="list-inline">
                                              <li class="list-inline-item">
                                                <span>Total Balance :</span> <b>Rs <?php echo isset($wallet_details['lab_wallet_amount'])?$wallet_details['lab_wallet_amount']:''; ?></b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Used :</span> <b>Rs <?php if($wallet_details['lab_wallet_amount']!=$wallet_details['remaining_lab_wallet']){ ?> <?php echo $wallet_details['remaining_lab_wallet']-$wallet_details['lab_wallet_amount']; ?> <?php }else{ echo "0";} ?></b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Remaining :</span> <b>Rs <?php echo isset($wallet_details['remaining_lab_wallet'])?$wallet_details['remaining_lab_wallet']:''; ?></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <form id="lab_form" name="ip_form" action="<?php echo base_url('wallet/ipcouponcode'); ?>" method="post">

                                                <div class="form-group">
                                                    <label>Select City</label>
                                                    <select id="city" name="city" class="form-control" onchange="get_hos_list(this.value)">
														<option value="">Select City</option>
														<?php if(isset($city_list) && count($city_list)>0){ ?>
														<?php foreach($city_list as $list){ ?>
														 <option value="<?php echo $list['hos_bas_city']; ?>"><?php echo $list['hos_bas_city']; ?></option>
														<?php } ?>
														<?php } ?>
													</select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <select id="hospital_id1" name="hospital_id" onchange="get_hospital_department(this.value);" class="form-control">
														<option value="">Select Hospital</option>
													</select>
                                                </div>
													<input type="hidden" name="type" id="type" value="3">
													<input type="hidden" name="tab" id="tab" value="3">
                                                <div class="text-center mt-4">
                                                    <button id="lab-submit-btn" type="submit" class="btn btn-primary btn-md mb-4 waves-effect waves-light" role="button">Generate Coupon</button>
                                                </div>
                                                
                                             
                                            </form>
											
                                        </div>
										<div class="col-md-12">
										 <table id="" class="table table-striped table-bordered dtBasicExample">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">Coupon code
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Hospital Name
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">City
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php foreach($lab_couponcode_list as $list){ ?>
                                                <tr>
                                                    <td><?php echo isset($list['couponcode_name'])?$list['couponcode_name']:''; ?></td>
                                                    <td><?php echo isset($list['hos_bas_name'])?$list['hos_bas_name']:''; ?></td>
                                                    <td><?php echo isset($list['hos_bas_city'])?$list['hos_bas_city']:''; ?></td>
                                                    
                                                </tr>
											<?php } ?>
                                            </tbody>
                                        </table>
										</div>
										
                                    </div>
                                </div>
                                
                                <!-- Wallet History Tab-->
                                <div class="tab-pane fade" id="whistory" role="tabpanel" aria-labelledby="whistory-tab">
                                    <div class="table-responsive">
									<?php if(isset($wallet_history_list) && count($wallet_history_list)>0){ ?>
                                        <table id="" class="table table-striped table-bordered dtBasicExample">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">Patient Name
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Mobile Number
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Hospital Name
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">City
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Doctor Name
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th> 
													<th class="th-sm">Amount
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
													<th class="th-sm">Coupon code
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
													<th class="th-sm">Coupon code Amount
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th> 
													<th class="th-sm">Type
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Date & Time
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                    <th class="th-sm">Appointment Fee
                                                        <i class="fa fa-sort float-right mt-1" aria-hidden="true"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php foreach($wallet_history_list as $list){ ?>
                                                <tr>
                                                    <td><?php echo isset($list['name'])?$list['name']:''; ?></td>
                                                    <td><?php echo isset($list['mobile'])?$list['mobile']:''; ?></td>
                                                    <td><?php echo isset($list['hos_bas_name'])?$list['hos_bas_name']:''; ?></td>
                                                    <td><?php echo isset($list['hos_bas_city'])?$list['hos_bas_city']:''; ?></td>
                                                    <td><?php echo isset($list['resource_name'])?$list['resource_name']:''; ?></td>
                                                    <td><?php echo isset($list['amount'])?$list['amount']:''; ?></td>
                                                    <td><?php echo isset($list['coupon_code'])?$list['coupon_code']:''; ?></td>
                                                    <td><?php echo isset($list['coupon_code_amount'])?$list['coupon_code_amount']:''; ?></td>
                                                    <td><?php if($list['type_id']==1){ echo "Op";}else if($list['type_id']==2){ echo "Ip"; }else if($list['type_id']==3) { echo "Lab"; } ?></td>
                                                    <td>
													<?php echo isset($list['date'])?$list['date']:''; ?>
													<?php echo isset($list['time'])?$list['time']:''; ?>
													</td>
                                                    <td><?php echo isset($list['consultation_fee'])?$list['consultation_fee']:''; ?></td>
                                                
                                                </tr>
											<?php } ?>
                                            </tbody>
                                        </table>
									<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
                
            </div>

        </section>
        <!--Section: Post-->
        
    </div>
</main>
<!--Main layout-->


<!--coupon code-->
<div class="modal fade" id="modalCoupon" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-success" role="document" style="max-width: 100%;">
        <!--Content-->
        <div class="modal-content">
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">

                    <h2>
                        <span class="badge"><span id="couponcode_id"></span></span>
                    </h2>
                    <p class="pt-3 mx-4">Copy the code and use it at the checkout to get the discount. It's valid for
                        <strong><u>two hours only ( created Time : <span id="couponcode_time"></span>)</u></strong>.
                    </p>
                    
                    <a type="button" class="btn btn-outline-success waves-effect btn-md" data-dismiss="modal">Ok, thanks</a>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--coupon code-->


<!--generate modal-->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body text-center mt-4">
                <b>Your Coupon code is successfully generated.</b>
            </div>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Ok</button>
            </div>

        </div>
    </div>
</div>
<!--generate modal-->


<script>
function get_hos_list(c_id){
	if(c_id!=''){
		jQuery.ajax({
   			url: "<?php echo base_url('appointment/get_hospital_list');?>",
   			data: {
				city: c_id,
			},
   			dataType: 'json',
   			type: 'POST',
   					success:function(data){
						console.log(data.msg);
						if(data.msg=1){
							$('#hospital_id').empty();
							$('#hospital_id1').empty();
							$('#hospital_id').append("<option>Select Hospital</option>");
							$('#hospital_id1').append("<option>Select Hospital</option>");
							for(i=0; i<data.list.length; i++) {
								$('#hospital_id').append("<option value="+data.list[i].hos_id+">"+data.list[i].hos_bas_name+"</option>");                      
								$('#hospital_id1').append("<option value="+data.list[i].hos_id+">"+data.list[i].hos_bas_name+"</option>");                      
							 
							}
							
						}
					}
           });
	}
	
}
function get_coupon_code(id){
	jQuery.ajax({
		url:'<?php echo base_url('wallet/get_coupon_code'); ?>',
		data:{
			b_id:id,
		},
		datatype:'JSON',
		type: 'POST',
		success: function(data){
			if(data.msg=1){
				var da=JSON.parse(data);
				
				$('#couponcode_id').empty();
				$('#couponcode_time').empty();
				$('#couponcode_id').append(da.coupon_code_name);
				$('#couponcode_time').append(da.coupon_c_time);
			}
			
		}
		
		
	});
	
}
    $(document).ready(function() {
        $('.dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#ip_form').bootstrapValidator({
        
        fields: {
             ipf_city: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					}
				}
            },
            ipf_hname: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					}
				}
            }
         }
    })
     
});
</script>

<script>
    $(document).ready(function() {
        $('#ip-coupon').hide();
        $('#ip-submit-btn').click(function() {
            $('#ip-coupon').show();
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#lab_form').bootstrapValidator({
        
        fields: {
             labf_city: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					}
				}
            },
            labf_hname: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					}
				}
            }
         }
    })
     
});
</script>

<script>
    $(document).ready(function() {
        $('#lab-coupon').hide();
        $('#lab-submit-btn').click(function() {
            $('#lab-coupon').show();
        });
    });
</script>