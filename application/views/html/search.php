
<!--Main layout-->
<main class="pt-4">

    <!--Section: Jumbotron-->
    <section class="pt-4 mt-4">
        <!-- Content -->
        <div class="text-white text-center my-5">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card mt-4 wow fadeIn">

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
                                        <input type="text" name="search_value" id="search_value" placeholder="Search hospitals / departments" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-outline-black btn-md mt-0">Search</button>
                                </div>
                            </div>
						

                        </div>
							</form>

                        </div>
                        <!-- Content -->
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
            <div class="col-md-9 mx-auto mb-5">

                <!--Card-->
				<?php if(isset($hospital_lists) && count($hospital_lists)>0){ ?>
				<?php $cnt=1;foreach($hospital_lists as $lis){ ?>
                <div class="card mb-4 wow fadeIn">

                    <!--Card content-->
                    <div class="card-body">

                        <div class="media d-block d-md-flex mt-3">
							<?php if($lis['h_id']['hos_bas_logo']==''){ ?>
								<img class="d-flex mb-3 mx-auto z-depth-1" src="<?php echo base_url('assets/vendor/default.png'); ?>" alt="Generic placeholder image" style="width: 100px;">

							<?php }else{ ?>
								<img class="d-flex mb-3 mx-auto z-depth-1" src="http://staging.ehealthinfra.com/assets/hospital_logos/"<?php echo $lis['h_id']['hos_bas_logo']; ?> alt="Hospital Logo" style="width: 100px;">

							<?php } ?>
                            <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                <h5 class="mt-0 font-weight-bold"><?php echo isset($lis['h_id']['hos_bas_name'])?$lis['h_id']['hos_bas_name']:''; ?></h5>
                                <p class="grey-text mb-1">
								<?php echo isset($lis['h_id']['hos_bas_add1'])?$lis['h_id']['hos_bas_add1']:''; ?>
								<?php echo isset($lis['h_id']['hos_bas_add2'])?$lis['h_id']['hos_bas_add2']:''; ?>
								<?php echo isset($lis['h_id']['hos_bas_city'])?$lis['h_id']['hos_bas_city']:''; ?>
								<?php echo isset($lis['h_id']['hos_bas_state'])?$lis['h_id']['hos_bas_state']:''; ?>
								<?php echo isset($lis['h_id']['hos_bas_country'])?$lis['h_id']['hos_bas_country']:''; ?>
								<?php echo isset($lis['h_id']['hos_bas_zipcode'])?$lis['h_id']['hos_bas_zipcode']:''; ?>
								</p>
								 <ul class="list-inline mb-0">
                                     <li class="list-inline-item mr-3 depts-name">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo<?php echo $cnt; ?>" aria-expanded="true" aria-controls="collapseOne" style="padding:0px;font-size:15px;">
                                            <i class="fa fa-building-o"></i>
                                            <small><?php echo isset($lis['h_id']['department_list'])?$lis['h_id']['department_list']:''; ?> Department(s)</small>
                                        </button>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <i class="fa fa-user-md"></i>
                                        <small><?php echo isset($lis['h_id']['doctor_list'])?$lis['h_id']['doctor_list']:''; ?> Doctor(s)</small>
                                    </li>
                                </ul>
                               
								<div class="accordion" id="accordionExample">
                                    <div class="card z-depth-0">
                                        <div id="collapseTwo<?php echo $cnt; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Department Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
													<?php if(isset($lis['h_id']['department_list_with_name']) && count($lis['h_id']['department_list_with_name'])>0){ ?>
														<?php foreach($lis['h_id']['department_list_with_name'] as $list){ ?>
															<tr>
																<td><?php echo isset($list['t_name'])?$list['t_name']:''; ?></td>
															</tr>
														<?php } ?>
													<?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right mt-0">
                                    <a id="" class="btn btn-primary btn-sm mb-0 waves-effect waves-light" href="<?php echo base_url('appointment'); ?>" role="button">Book Appointment</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
				
				<?php $cnt++;} ?>
				<?php } ?>
                <!--/.Card-->

                


            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Post-->

</main>
<!--Main layout-->

