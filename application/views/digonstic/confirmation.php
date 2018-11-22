<style>
    table.table td{
        padding-top: 10px;
        padding-bottom: 0px;
    }
    table.table td:first-child{
        font-weight: 700;
    }

</style>
<!--Main layout-->
<main class="">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-5 mb-5">
    
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6">
            
                    <div class="card mb-5">
                        <div class="card-header font-weight-bold">Address</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b>Address</b></td>
                                            <td><?php echo isset($address_detail['address'])?$address_detail['address']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Landmark</b></td>
                                            <td><?php echo isset($address_detail['landmark'])?$address_detail['landmark']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Locality</b></td>
                                            <td><?php echo isset($address_detail['locality'])?$address_detail['locality']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Zipcode</b></td>
                                            <td><?php echo isset($address_detail['pincode'])?$address_detail['pincode']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Mobile</b></td>
                                            <td><?php echo isset($address_detail['mobile'])?$address_detail['mobile']:''; ?></td>
                                        </tr>
										
										 <tr>&nbsp;&nbsp;</tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                </div>
                
                <!--Grid column-->
                <div class="col-md-6">
            
                    <div class="card mb-5">
                        <div class="card-header font-weight-bold">Patient Details</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td><?php echo isset($patient_detail['name'])?$patient_detail['name']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Mobile Number</b></td>
                                            <td><?php echo isset($patient_detail['mobile'])?$patient_detail['mobile']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Email Id</b></td>
                                            <td><?php echo isset($patient_detail['email'])?$patient_detail['email']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Gender</b></td>
                                            <td><?php echo isset($patient_detail['gender'])?$patient_detail['gender']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Age</b></td>
                                            <td><?php echo isset($patient_detail['age'])?$patient_detail['age']:''; ?></td>
                                        </tr>
										<tr>
                                            <td><b>Sample Pickup - Date & Time</b></td>
                                            <td>
											<?php echo isset($patient_detail['date'])?$patient_detail['date']:''; ?>&nbsp;
											<?php echo isset($patient_detail['time'])?$patient_detail['time']:''; ?>
											</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                </div>
                
            </div>

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mx-auto text-center">
                    
                    <img src="<?php echo base_url(); ?>assets/vendor/img/confirm-booking.png" height="100px">
                    <h1>Booking Confirmed</h1>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Post-->

    </div>
</main>
<!--Main layout-->

