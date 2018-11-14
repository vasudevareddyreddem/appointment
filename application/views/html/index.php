
<!--Main layout-->
<main class="">

    <!--Section: Jumbotron-->
    <section style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/homebac1.png);">

        <!-- Content -->
        <div class="text-white text-center mx-4 py-5 ">

            <h1 class="mt-5 pt-1 h1">
                <strong>Medspace HIMS</strong>
            </h1>
            <h4 class="h4">
                <i>Now , doctor booking and ordering medicine is made simple with medspace</i>
            </h4>
            <!--Card: Jumbotron-->
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 mx-auto">
                    <div class="card mb-4  wow fadeIn">

                        <!-- Content -->
                        <div class="card-body text-center">
						<form action="<?php echo base_url('users/search'); ?>" method="post">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12">
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
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mb-0">
                                        <input type="text" name="search_value" id="search_value" placeholder="Search hospitals / departments" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-outline-dark btn-md mt-0">Search</button>
                                </div>
                            </div>
						
                            </form>
                        </div>
							
                        <!-- Content -->
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Card: Jumbotron-->
                <div class="col-md-6 mx-auto mt-3 mb-5">
                    <div class="row count-home-banner">
                        <div class="col-md-4 " >
                            <h1 class=""><?php echo isset($hospital_list['cnt'])?$hospital_list['cnt']:''; ?></h1>
                            <h6 class="font-weight-bold">Hospitals</h6>
                        </div>
                        <div class="col-md-4">
                            <h1 class=""><?php echo isset($clicnic_list['cnt'])?$clicnic_list['cnt']:''; ?></h1>
                            <h6 class="font-weight-bold">Departments</h6>
                        </div>
                        <div class="col-md-4">
                            <h1 class=""><?php echo isset($doctors_list['cnt'])?$doctors_list['cnt']:''; ?></h1>
                            <h6 class="font-weight-bold">Doctors</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Content -->
    </section>
    <!--Section: Jumbotron-->

    <section class="mt-5 pt-3 pb-3">
        <div class="container">
            
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8">
                    <p class="h3"> About Us </p>

                    <p>The evolution of technology has made the communication process much easier for humans. In the past decade one has to go physically to the hospital to book a doctor appointment, but now through the expeditious expansion in software one can book the doctor’s appointment through mobile app, all you need is a smart phone with an internet connection.</p>

                    <p>We at Medspace Softtech Pvt. Ltd. has developed a hospital management system to benefit both the hospitals and medical care seekers. The company deals with hospital management system, health cards, online medicine, lab and etc.</p>

                    <p>It helps people to find online medical services like choosing the right hospital, booking doctor appointment, booking diagnostic center appointment, storing medical records, purchasing online medicines etc.</p>
                    
                    <p> Medspace Softtech Pvt. Ltd. is located in Hyderabad and has its branches in Tirupati, Guntur and Bangalore and is planning to launch more branches across India.</p>
                </div>
                <!--Grid column-->
                <div class="col-md-4">
                
                    <!-- Card -->
                    <div class="card card-image mb-4" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/hospitals.png);">

                        <!-- Content -->
                        <div class="text-white text-center d-flex align-items-center rgba-indigo-strong py-4 px-4">
                            <div>
                                <h3 class="card-title pt-2"><strong>Hospitals & Clinics</strong></h3>
                                <p>Medspace makes patients to reach you easier and faster. Join us and help patients to find you.</p>
                                <a target="_blank" href="https://medspaceit.com/" class="btn btn-outline-white"><i class="fa fa-user-plus left"></i> Register </a>
                            </div>
                        </div>

                    </div>
                    <!-- Card -->
                    
                    <!--Card-->
                    <div class="card mb-4">
                        
                        <div class="media pt-3 pl-2 pr-3 pb-3">
                            <img class="d-flex mr-3" src="<?php echo base_url(); ?>assets/vendor/img/telecom.png" alt="Support">
                            <div class="media-body">
                                <h4 class="mt-0 font-weight-bold">Customer Care</h4>
                                <p class="mb-1"><strong>Email</strong> : medspaceit@gmail.com</p>
                                <p class="mb-1"><strong>Phone Number</strong> : 7997999105</p>
                                <p class="mb-1"><strong>Mobile Number</strong> : 7095103103</p>
                            </div>
                        </div>
                        
                    </div>
                    <!--/.Card-->
                    
                </div>
                
            </div>
        </div>
    </section>

</main>
<!--Main layout-->

