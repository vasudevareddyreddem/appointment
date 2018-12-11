
<!--Main layout-->
<main class="pt-5" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
    <div class="container">

        <!--Section: Post-->
        <section class="">

            <!--Grid row-->
            <div class="row ">

                <!--Grid column-->
				
                <div class="col-md-12 mx-auto py-4">
                <div class="card">
				  <div class="card-header font-weight-bold bg-white">Diagnostic Orders</div>
				 <div class="card-body table-responsive">
                    <table id="dtBasicExample" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th class="th-sm">Patient Name
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
								<th class="th-sm">Mobile Number
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
								<th class="th-sm">Test Name / Package Name
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Amount
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
								<th class="th-sm">Delivery charges
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Sample Pickup Date & Time
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Payment Type
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th> 
								<th class="th-sm">Created Date & Time
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
								<th class="th-sm">Order Status
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
								<th class="th-sm">Lab Status
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
								<th class="th-sm">Report File
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
								
                            </tr>
                        </thead>
                        <tbody>
						<?php if(isset($order_list) && count($order_list)>0){ ?>
						<?php foreach($order_list as $lis){ ?>
                            <tr>
                                <td><?php echo isset($lis['p_name'])?$lis['p_name']:''; ?></td>
                                <td><?php echo isset($lis['mobile'])?$lis['mobile']:''; ?></td>
                                <td>
								<?php echo isset($lis['test_name'])?$lis['test_name']:''; ?>
								<?php echo isset($lis['test_package_name'])?$lis['test_package_name']:''; ?>
								
								</td>
                                <td><?php echo isset($lis['amount'])?$lis['amount']:''; ?></td>
                               
                                <td><?php echo isset($lis['delivery_charge'])?$lis['delivery_charge']:''; ?></td>
								 <td>
								<?php echo isset($lis['date'])?$lis['date']:''; ?>&nbsp;
								<?php echo isset($lis['time'])?$lis['time']:''; ?>
								</td>
                                <td>
								<?php if($lis['payment_type']==1){ echo "Online"; } else if($lis['payment_type']==3){ echo "Swipe on Delivery";}else if($lis['payment_type']==2){  echo "Cash On Delivery"; } ?>
								</td>
								<td><?php echo isset($lis['created_at'])?$lis['created_at']:''; ?></td>
                            	<td><?php if($lis['status']==2){ echo "Canceled ";}else if($lis['status']==1){ echo "Success"; } ?></td>
                            	<td><?php if($lis['lab_status']==0){ echo "Pending";}else if($lis['lab_status']==1){ echo "Success"; } ?></td>
                            	<td>
								<?php if($lis['lab_status']==0 && $lis['status']==1){ ?>
								<a  href="javascript;void(0);" onclick="admindelete('<?php echo base64_encode(htmlentities($lis['order_item_id']));?>');adminstatus2();"  data-toggle="modal" data-target="#myModal1">
                                                          Cancel</a> |
								<?php } ?>
								<a href="<?php echo base_url('diagnostic/orderreports/'.base64_encode($lis['order_item_id'])); ?>">View</a>
								</td>

                            </tr>
							
						<?php } ?>
						<?php } ?>
                            
                        </tbody>
                    </table>

                </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Post-->

    </div>
</main>
<br/>
<br/>
<div class="modal fade" id="myModal1" role="dialog">
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
                        <form id="defaultForm" method="post" action="<?php echo base_url('diagnostic/orderstatus_cancel'); ?>">
                            <div id="content1" class="col-lg-12 form-group">
                                Are you sure ?
                            </div>

                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="reason" id="reason" placeholder="Enter reason" value="" required>
                            </div>
                            <br>
                            <div class="col-lg-12">
							<input type="hidden" name="order_item_id_id" id="order_item_id_id" class="popid" value="">
                                <button type="button" aria-label="Close" data-dismiss="modal" class="btn blueBtn float-right">Cancel</button>
                            </div>
							<button type="submit" class="btn btn-primary" name="Submit" value="Submit">Submit</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!--Main layout-->
<script>
 $("#dtBasicExample").DataTable({
		 "order": [[7, "desc" ]]
	});
	function admindelete(id){
	$("#order_item_id_id").val(id);
}
function adminstatus2(id){
$('#content1').html('Are you sure you want to Cancel?');
}
</script>
