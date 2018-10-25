<?php include('header.php'); ?>

<!--Main layout-->
<main class="mt-5 pt-5">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mx-auto">

                    <div class="card">
                        <div class="card-header">
                            <a href="profile.php" class="btn btn-sm btn-info">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                            <strong class="card-title">Edit Profile</strong>
                        </div>
                        <div class="card-body">
                            <form method="" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Name</label>
                                            <input type="text" id="" value="John Deo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email Id</label>
                                            <input type="email" id="" value="Johndeo@gmail.com" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Password</label>
                                            <input type="password" id="" value="***********" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Phone Number</label>
                                            <input type="text" id="" value="98xxxxxx56" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Alternative Number</label>
                                            <input type="text" id="" value="Delhi" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Profile Pic</label>
                                            <input type="file" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <a href="my-profile.html" class="btn btn-sm btn-info text-center">
                                    Save Changes
                                </a>
                            </form>
                        </div>
                    </div>

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