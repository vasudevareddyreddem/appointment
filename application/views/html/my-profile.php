
<!--Main layout-->
<main class="mt-5 pt-5 mb-5 pb-5">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-3 mb-3">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mx-auto">

                    <div class="card">
                        <div class="card-header font-weight-bold"><?php echo isset($user_details['name'])?ucfirst($user_details['name']):''; ?> Profile</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="mx-auto d-block">
									<?php if($user_details['profile_pic']==''){ ?>
                                        <img class="rounded-circle mx-auto d-block" src="<?php echo base_url('assets/profile_pic/default.png'); ?>" alt="User pic" height="150px">
									<?php }else{ ?>
									        <img class="rounded-circle mx-auto d-block" src="<?php echo base_url('assets/profile_pic/'.$user_details['profile_pic']); ?>" alt="<?php echo isset($user_details['profile_pic'])?$user_details['profile_pic']:''; ?>" height="150px">
									<?php } ?>
										<h5 class="mt-2 mb-1"><?php echo isset($user_details['name'])?$user_details['name']:''; ?></h5>
                                        <a href="<?php echo base_url('profile/edit'); ?>" class="btn btn-sm btn-info text-center">
                                            <i class="fa fa-edit"></i> Edit Profile
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <table class="table mb-0" style="border-left:1px dotted #ccc;">
                                        <tbody>
                                            <tr>
                                                <td>Email Id</td>
                                                <td><?php echo isset($user_details['email'])?$user_details['email']:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td><?php echo isset($user_details['name'])?$user_details['name']:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone Number</td>
                                                <td><?php echo isset($user_details['mobile'])?$user_details['mobile']:''; ?></td>
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

        </section>
        <!--Section: Post-->

    </div>
</main>
<!--Main layout-->

