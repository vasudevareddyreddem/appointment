<!--Main layout-->
<main class="pt-3" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-3">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mx-auto py-4">
                    <div class="card">
                        <div class="card-header font-weight-bold bg-white">Book Appointment</div>
                        <div class="card-body table-responsive">
                            <table id="dtBasicExample" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="th-sm">City
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Hospital Name
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Department
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Speciality
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Doctor
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Name
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Age
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Date & Time
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Status
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($app_list) && count($app_list)>0){ ?>
                                    <?php foreach($app_list as $lis){ ?>
                                    <tr>
                                        <td>
                                            <?php echo isset($lis['city'])?$lis['city']:''; ?>
                                        </td>
                                        <td>
                                            <?php echo isset($lis['hos_bas_name'])?$lis['hos_bas_name']:''; ?>
                                        </td>
                                        <td>
                                            <?php echo isset($lis['t_name'])?$lis['t_name']:''; ?>
                                        </td>
                                        <td>
                                            <?php echo isset($lis['specialist_name'])?$lis['specialist_name']:''; ?>
                                        </td>
                                        <td>
                                            <?php echo isset($lis['resource_name'])?$lis['resource_name']:''; ?>
                                        </td>
                                        <td>
                                            <?php echo isset($lis['patinet_name'])?$lis['patinet_name']:''; ?>
                                        </td>
                                        <td>
                                            <?php echo isset($lis['age'])?$lis['age']:''; ?>
                                        </td>
                                        <td>
                                            <?php echo isset($lis['date'])?$lis['date']:''; ?>&nbsp;
                                            <?php echo isset($lis['time'])?$lis['time']:''; ?>
                                        </td>
                                        <td>
                                            <?php if($lis['status']==0){ echo "Pending"; } else if($lis['status']==1){ echo "Accepted";}else{  echo "Rejected"; } ?>
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
                
            </div>

        </section>
        <!--Section: Post-->
    </div>
</main>
<!--Main layout-->