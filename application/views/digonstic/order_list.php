
<!--Main layout-->
<main class="pt-3">
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
								<th class="th-sm">Status
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
                               
                                <td><?php echo isset($lis['test_duartion'])?$lis['test_duartion']:''; ?></td>
								 <td>
								<?php echo isset($lis['date'])?$lis['date']:''; ?>&nbsp;
								<?php echo isset($lis['time'])?$lis['time']:''; ?>
								</td>
                                <td>
								<?php if($lis['payment_type']==1){ echo "Online"; } else if($lis['payment_type']==3){ echo "Swipe on Delivery";}else if($lis['payment_type']==2){  echo "Cash On Delivery"; } ?>
								</td>
								<td><?php echo isset($lis['created_at'])?$lis['created_at']:''; ?></td>
                            	<td><?php if($lis['lab_status']==0){ echo "Pending";}else if($lis['lab_status']==1){ echo "Success"; } ?></td>

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
<!--Main layout-->
<script>
 $("#dtBasicExample").DataTable({
		 "order": [[7, "desc" ]]
	});
</script>
