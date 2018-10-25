
<!--Main layout-->
<main class="pt-4">

    <!--Section: Jumbotron-->
    <section style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">

        <!-- Content -->
        <div class="text-white text-center py-5 px-5 my-5">

            <h1 class="mt-5">
                <strong>Medspace HIMS</strong>
            </h1>
            <h4>
                Now , doctor booking and ordering medicine is made simple with medspace
            </h4>
            <!--Card: Jumbotron-->
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <div class="card mb-4 mt-4 wow fadeIn">

                        <!-- Content -->
                        <div class="card-body text-center">
						<form action="<?php echo base_url('users/search'); ?>" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-0">
                                        <select class="form-control" name="city" id="city" required>
                                            <option value="">Select city</option>
											<?php if(isset($city_list) && count($city_list)>0){ ?>
											<?php foreach($city_list as $li){ ?>
												<option value="<?php echo $li['hos_bas_city']; ?>"><?php echo $li['hos_bas_city']; ?></option>
											<?php } ?>
											<?php } ?>
											
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <input type="text" name="search_value" id="search_value" placeholder="Search hospitals / departments" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-outline-black btn-md mt-0">Search</button>
                                </div>
                            </div>
						

                        </div>
							</form>
                        <!-- Content -->
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Card: Jumbotron-->
                <div class="col-md-6 mx-auto mt-3 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <h1 class=""><?php echo isset($hospital_list['cnt'])?$hospital_list['cnt']:''; ?></h1>
                            <h5 class="font-weight-bold">Hospitals</h5>
                        </div>
                        <div class="col-md-4">
                            <h1 class=""><?php echo isset($clicnic_list['cnt'])?$clicnic_list['cnt']:''; ?></h1>
                            <h5 class="font-weight-bold">Departments</h5>
                        </div>
                        <div class="col-md-4">
                            <h1 class=""><?php echo isset($doctors_list['cnt'])?$doctors_list['cnt']:''; ?></h1>
                            <h5 class="font-weight-bold">Doctors</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Content -->
    </section>
    <!--Section: Jumbotron-->

    <!--Section: Post-->
    <section class="mt-4">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-6 mb-4 ml-auto">

                <div class="">

                    <p class="h3 my-4"> About Us </p>

                    <p>The evolution of technology has made the communication process much easier for humans. In the past decade one has to go physically to the hospital to book a doctor appointment, but now through the expeditious expansion in software one can book the doctor’s appointment through mobile app, all you need is a smart phone with an internet connection.</p>

                    <p>We at Medspace Softtech Pvt. Ltd. has developed a hospital management system to benefit both the hospitals and medical care seekers. The company deals with hospital management system, health cards, online medicine, lab and etc.</p>

                    <p>It helps people to find online medical services like choosing the right hospital, booking doctor appointment, booking diagnostic center appointment, storing medical records, purchasing online medicines etc. Medspace Softtech Pvt. Ltd. is located in Hyderabad and has its branches in Tirupati, Guntur and Bangalore and is planning to launch more branches across India.</p>

                </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4 mr-auto">

                <!--Card: Jumbotron-->
                <div class="card mdb-color blue-grey lighten-3 mb-4 wow fadeIn">

                    <!-- Content -->
                    <div class="card-body text-center text-white">

                        <h3 class="card-title pt-2"><strong>Hospitals & Clinics</strong></h3>
                        <p>Medspace makes patients to reach you easier and faster. Join us and help patients to find you.</p>
                        <a target="_blank" href="https://medspaceit.com/" class="btn btn-outline-black"><i class="fa fa-user-plus left"></i> Register </a>
                    </div>
                    <!-- Content -->
                </div>
                <!--Card: Jumbotron-->


                <!--Card-->
                <div class="card mb-4 wow mdb-color lighten-3 text-white fadeIn">

                    <div class="card-header">
                        <h5>Customer Care</h5>
                    </div>

                    <!--Card content-->
                    <div class="card-body text-white">
                        <p class="mb-1"><strong>Email</strong> : medspaceit@gmail.com</p>
                        <p class="mb-1"><strong>Phone Number</strong> : 7997999105, 7095103103</p>

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Post-->

</main>
<!--Main layout-->

