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
                                    <a class="nav-link active" id="op-tab" data-toggle="tab" href="#op" role="tab" aria-controls="op" aria-selected="true">OP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="ip-tab" data-toggle="tab" href="#ip" role="tab" aria-controls="ip" aria-selected="false">IP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="lab-tab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab" aria-selected="false">Lab</a>
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
                                <div class="tab-pane fade show active" id="op" role="tabpanel" aria-labelledby="op-tab">
                                    <div class="text-center">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span>Total Balance :</span> <b>Rs 1000</b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Used :</span> <b>Rs 1000</b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Remaining :</span> <b>Rs 1000</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="table-responsive">
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
                                                <tr>
                                                    <td>Ruler</td>
                                                    <td>9845xxxx23</td>
                                                    <td>Hospital</td>
                                                    <td>Your Heart</td>
                                                    <td>S Leone</td>
                                                    <td>24-11-2018</td>
                                                    <td>Free</td>
                                                    <td>
                                                        <button class="btn btn-default btn-sm">Generate</button>
                                                        <br>
                                                        <button class="btn btn-secondary btn-sm">View</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <!--IP Tab-->
                                <div class="tab-pane fade" id="ip" role="tabpanel" aria-labelledby="ip-tab">
                                    <div class="text-center">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span>Total Balance :</span> <b>Rs 1000</b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Used :</span> <b>Rs 1000</b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Remaining :</span> <b>Rs 1000</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <form id="ip_form" name="ip_form" action="" method="post">

                                                <div class="form-group">
                                                    <label>Select City</label>
                                                    <select id="" class="form-control" name="ipf_city" onchange="" >
                                                        <option selected disabled>Select</option>
                                                        <option value="">Option 1</option>
                                                        <option value="">Option 2</option>
                                                        <option value="">Option 3</option>
                                                        <option value="">Option 4</option>
                                                        <option value="">Option 5</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    <input type="text" class="form-control" name="ipf_hname">
                                                </div>

                                                <div class="text-center mt-4">
                                                    <button id="ip-submit-btn" type="submit" class="btn btn-primary btn-md mb-4 waves-effect waves-light" role="button">Generate Coupon</button>
                                                </div>
                                                
                                                <div id="ip-coupon" class="text-center">
                                                    <p>Coupon code is : <b class="text-warning">Qs5bn4</b></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--Lab Tab-->
                                <div class="tab-pane fade" id="lab" role="tabpanel" aria-labelledby="lab-tab">
                                    <div class="text-center">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span>Total Balance :</span> <b>Rs 1000</b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Used :</span> <b>Rs 1000</b>
                                            </li>
                                            <br class="md-hide">
                                            <li class="list-inline-item">
                                                <span>Remaining :</span> <b>Rs 1000</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <form id="" name="" action="" method="post">

                                                <div class="form-group">
                                                    <label>Select City</label>
                                                    <select id="" class="form-control" name="" onchange="" >
                                                        <option selected disabled>Select</option>
                                                        <option value="">Option 1</option>
                                                        <option value="">Option 2</option>
                                                        <option value="">Option 3</option>
                                                        <option value="">Option 4</option>
                                                        <option value="">Option 5</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    <input type="text" class="form-control">
                                                </div>

                                                <div class="text-center mt-4">
                                                    <button id="lab-submit-btn" type="submit" class="btn btn-primary btn-md mb-4 waves-effect waves-light" role="button">Generate Coupon</button>
                                                </div>
                                                
                                                <div id="lab-coupon" class="text-center">
                                                    <p>Coupon code is : <b class="text-warning">Qs5bn4</b></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Wallet History Tab-->
                                <div class="tab-pane fade" id="whistory" role="tabpanel" aria-labelledby="whistory-tab">
                                    <div class="table-responsive">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ruler</td>
                                                    <td>9845xxxx23</td>
                                                    <td>Hospital</td>
                                                    <td>Your Heart</td>
                                                    <td>S Leone</td>
                                                    <td>24-11-2018</td>
                                                    <td>Free</td>
                                                </tr>
                                            </tbody>
                                        </table>
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


<script>
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

<script>
    $(document).ready(function() {
        $('#lab-coupon').hide();
        $('#lab-submit-btn').click(function() {
            $('#lab-coupon').show();
        });
    });
</script>