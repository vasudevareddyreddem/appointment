<style>
.razorpay-payment-button{
	display:none;
}
</style>
<!--Main layout-->
<main class="">

    <!--Section: Post-->
    <section class="mt-5">
        <div class="container">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8">
                    <div class="form-box">

                           

                            <fieldset class="card">
                                <div class="card-header unique-color">
                                    <h4 class="mb-0 white-text">Payment Process </h4>
                                </div>
                                <div class="card-body">
									<div id="online_amt_1">
											<form action="<?php echo base_url('diagnostic/orderpaymenttype'); ?>" method="post" onSubmit="return checkvalidation_payment(this.form);">

										 <div class="custom-control custom-radio mt-2">
                                        <input type="radio" class="custom-control-input p-type" id="radio3" name="payment" onclick="payment_type(this.value);" value="1">
                                        <label class="custom-control-label" for="radio3">Online Payment</label>
                                    </div>
										<div class="custom-control custom-radio mt-2 mb-2">
											<input type="radio" class="custom-control-input p-type"  id="radio2" name="payment" onclick="payment_type(this.value);"  value="3">
											<label class="custom-control-label" for="radio2">Swipe on Delivery</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input p-type" id="radio1"  name="payment" onclick="payment_type(this.value);" value="2">
											<label class="custom-control-label" for="radio1">Cash On Delivery</label>
										</div>
										  
											  <input type="hidden" id="patient_details_id" name="patient_details_id" value="<?php echo isset($patient_details_id)?$patient_details_id:''; ?>">
											  <input type="hidden" id="billing_id" name="billing_id" value="<?php echo isset($billing_id)?$billing_id:''; ?>">
									<a href="<?php echo base_url('diagnostic/billing/'.base64_encode($patient_details_id)); ?>" class="btn btn-secoundary btn-md btn-previous black-text">Back</a>
                                    <button type="submit" class="btn btn-info btn-md mt-2">Confirm</button>
									
									</form>
									</div>
									<div id="online_amt" style="display:none;">
									<form action="<?php echo base_url('diagnostic/orderpaymenttype'); ?>" method="post" onSubmit="return checkvalidation(this.form);">
									 <div class="custom-control custom-radio mt-2">
                                        <input type="radio" class="custom-control-input p-type" id="radio33" name="payment" onclick="payment_type(this.value);"  value="1">
                                        <label class="custom-control-label" for="radio3">Online Payment</label>
                                    </div>
										<div class="custom-control custom-radio mt-2 mb-2">
											<input type="radio" class="custom-control-input p-type"  id="radio22" name="payment" onclick="payment_type(this.value);"  value="3">
											<label class="custom-control-label" for="radio2">Swipe on Delivery</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input p-type" id="radio11"  name="payment" onclick="payment_type(this.value);" value="2">
											<label class="custom-control-label" for="radio1">Cash On Delivery</label>
										</div>
										<script
												src="https://checkout.razorpay.com/v1/checkout.js"
												data-key="<?php echo $details['key']?>"
												data-amount="<?php echo $details['amount']?>"
												data-currency="INR"
												data-name="<?php echo $details['name']?>"
												data-image="<?php echo $details['image']?>"
												data-description="<?php echo $details['description']?>"
												data-prefill.name="<?php echo $details['prefill']['name']?>"
												data-prefill.email="<?php echo $details['prefill']['email']?>"
												data-prefill.contact="<?php echo $details['prefill']['contact']?>"
												data-notes.shopping_order_id="3456"
												data-order_id="<?php echo $details['order_id']?>"
												<?php if ($details['display_currency'] !== 'INR') { ?> data-display_amount="<?php echo $details['amount']?>" <?php } ?>
												<?php if ($details['display_currency'] !== 'INR') { ?> data-display_currency="<?php echo $details['display_currency']?>" <?php } ?>
											  >
											  </script>
											  <input type="hidden" id="patient_details_id" name="patient_details_id" value="<?php echo isset($patient_details_id)?$patient_details_id:''; ?>">
											  <input type="hidden" id="billing_id" name="billing_id" value="<?php echo isset($billing_id)?$billing_id:''; ?>">
                                    
                                    <a href="<?php echo base_url('diagnostic/billing/'.base64_encode($patient_details_id)); ?>"  class="btn btn-secoundary btn-md btn-previous black-text">Back</a>
                                    <button type="submit" class="btn btn-info btn-md mt-2">Confirm</button>
									</form>
									</div>
                                </div>
                            </fieldset>
                      
                    </div>
                </div>
                <!--Grid column-->
                <div class="col-md-4">

                    <div class="card mb-4">
					 <!--Card content-->
                        <div class="card-body pb-0 d-block d-md-flex">
                            <div class="">
                                <h6 class="mt-0 mb-0 font-weight-bold">Selected Cart Items</h6>
                            </div>
                          
                        </div>
                        <hr class="mt-2 mb-2">
					<?php $total='';$delivery_charge='';foreach($cart_details as $list){ ?>
                       

                        <!--Card content-->
                        <div class="card-body pt-0">
                            <div class="d-block d-md-flex mt-2">
                                <div>
								<?php if($list['type']==1){ ?>
                                    <small class="ml-2"><?php echo isset($list['test_name'])?$list['test_name']:''; ?></small>
								<?php }else{ ?>
								    <small class="ml-2"><?php echo isset($list['test_package_name'])?$list['test_package_name']:''; ?></small>
								<?php } ?>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span><?php echo isset($list['amount'])?$list['amount']:''; ?></span></small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-1">
                           
                            
                        </div>
					<?php 
					$total +=$list['amount'];
								$delivery_charge +=$list['delivery_charge'];
					} ?>
							<hr class="mt-2 mb-1">
                            <div class="d-block d-md-flex mt-2 p-2 green lighten-5">
                                <div>
                                    <p class="mb-0">Sample pickup Charges</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>&#8377;</span> <span><?php  
									echo isset($delivery_charge)?$delivery_charge:'';
									
									?></span></p>
                                </div>
                            </div>
                            <div class="d-block d-md-flex mt-2 p-2 green lighten-5">
                                <div>
                                    <p class="mb-0">Total</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>&#8377;</span> <span><?php  
									$overall_amount=(($total)+($delivery_charge));
									echo isset($overall_amount)?$overall_amount:'';
									
									?></span></p>
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
</main>
<!--Main layout-->


<script>
function payment_type(ids){
	$('#paymenterrormsg').html('');
	if(ids==1){
		$('#online_amt').show();
		$('#online_amt_1').hide();
		document.getElementById("radio33").checked = true;
	}else{
		$('#online_amt').hide();
		$('#online_amt_1').show();
		if(ids==1){
			document.getElementById("radio1").checked = true;
			document.getElementById("radio3").checked = false;
		}else if(ids==3){
			document.getElementById("radio2").checked = true;
			document.getElementById("radio3").checked = false;
		}else{
			document.getElementById("radio3").checked = false;
		}
		
	}
}
function checkvalidation(form){
if ($("#radio11").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}if ($("#radio22").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}if ($("#radio33").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}if ($("#radio1").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else if ($("#radio2").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else if ($("#radio3").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else{
	$('#paymenterrormsg').html('Please select a payment mode method');
	return false;
}
}
function checkvalidation_payment(form){

if ($("#radio1").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}if ($("#radio11").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else if ($("#radio2").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else if ($("#radio22").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else if ($("#radio3").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else if ($("#radio33").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else{
	$('#paymenterrormsg').html('Please select a payment mode method');
	return false;
}


}

</script>