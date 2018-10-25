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
                        <div class="card-header font-weight-bold">Order Medicine</div>
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
                                        <option value="" disabled selected>Select Pharmacy Shop</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <!-- First name -->
                                        <div class="form-group">
                                            <label for="">Upload Prescription report / details</label>
                                            <input type="file" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- Last name -->
                                        <div class="form-group">
                                            <label for="">Select Prescription</label>
                                            <button type="button" class="btn btn-outline-info btn-block btn-md" data-toggle="modal" data-target="#myModal">Click here</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <a id="" class="btn btn-primary btn-md mb-4 waves-effect waves-light" href="order_medicine1.html" role="button">Pay Bill</a>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Select Prescription</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <tr>
                            <th class="text-center">Select</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Issue</th>
                            <th class="text-center">Prescription</th>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="" name=""></td>
                            <td>14-2-2017</td>
                            <td>15:00 AM</td>
                            <td>Cold</td>
                            <td>File</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="" name=""></td>
                            <td>14-2-2017</td>
                            <td>15:00 AM</td>
                            <td>Cold</td>
                            <td>File</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="" name=""></td>
                            <td>14-2-2017</td>
                            <td>15:00 AM</td>
                            <td>Cold</td>
                            <td>File</td>
                        </tr>
                    </table>
                </div>
                <a href="" class="btn btn-primary btn-sm waves-effect waves-light">Submit</a>
                <a class="btn btn-outline-primary waves-effect btn-sm" data-dismiss="modal">Cancel</a>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>

<?php include('footer.php'); ?>