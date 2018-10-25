<?php include('header.php'); ?>

<!--Main layout-->
<main class="mt-5 pt-5">
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

                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="" disabled selected>Select City</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="" disabled selected>Select Hospital</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="" disabled selected>Select Department</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="" disabled selected>Select Doctor</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="date" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Time Slot</label>
                                        <select class="form-control">
                                            <option value="" disabled selected>Time Slot
                                            </option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="custom-control custom-checkbox text-warning">
                                    <input type="checkbox" class="custom-control-input" id="">
                                    <label class="custom-control-label" for="">Consultation Fee 20xx/- before confirmation. Check once consultation fee use this code : MSFlat50 for discount at reception</label>
                                </div>

                                <div class="text-center mt-4">
                                    <a id="" class="btn btn-primary btn-md mb-4 waves-effect waves-light" href="book_appointment2.html" role="button">Booking Confirmation</a>
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

<?php include('footer.php'); ?>