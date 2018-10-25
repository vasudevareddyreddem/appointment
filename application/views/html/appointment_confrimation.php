
<!--Main layout-->
<main class="">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mx-auto">

                    <!--Reply-->
                    <div class="card mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">Book Appointment</div>
                        <div class="card-body">
                            <form action="" method="">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td><b>Name</b></td>
                                                <td><?php echo isset($details['patinet_name'])?$details['patinet_name']:''; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Age</b></td>
                                                <td><?php echo isset($details['age'])?$details['age']:''; ?></td>
                                            </tr>
											<tr>
                                                <td><b>City</b></td>
                                                <td><?php echo isset($details['city'])?$details['city']:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Hospital</b></td>
                                                <td><?php echo isset($details['hos_bas_name'])?$details['hos_bas_name']:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Department</b></td>
                                                <td><?php echo isset($details['t_name'])?$details['t_name']:''; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Speciality</b></td>
                                                <td><?php echo isset($details['specialist_name'])?$details['specialist_name']:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Doctor</b></td>
                                                <td><?php echo isset($details['resource_name'])?$details['resource_name']:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Date</b></td>
                                                <td><?php echo isset($details['date'])?$details['date']:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Time</b></td>
                                                <td><?php echo isset($details['time'])?$details['time']:''; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="text-center mt-4">
                                        <a href="<?php echo base_url('appointment/edit/'.base64_encode($details['b_id'])); ?>" class="btn btn-primary btn-md mb-4 waves-effect waves-light" role="button">Edit</a>
                                        <a href="<?php echo base_url('appointment/success/'.base64_encode($details['b_id'])); ?>" class="btn btn-primary btn-md mb-4 waves-effect waves-light"  role="button">Confirm</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <!--/.Reply-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Post-->

    </div>
</main>
<!--Main layout-->

