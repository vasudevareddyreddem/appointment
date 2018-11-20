<style>
.table td, .table th{
	border-top:0px;
	font-weight:600;
}
</style>
<!--Main layout-->
<main class="mt-5 pt-5 mb-5 pb-4" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-4 pb-2">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mx-auto">

                    <div class="card">
                        <div class="card-header font-weight-bold bg-white"><?php echo isset($user_details['name'])?ucfirst($user_details['name']):''; ?> Profile</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center" style="border-right:1px solid #ddd;">
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
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th>Email Id</th>
                                                <th><?php echo isset($user_details['email'])?$user_details['email']:''; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <th><?php echo isset($user_details['name'])?$user_details['name']:''; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <th><?php echo isset($user_details['mobile'])?$user_details['mobile']:''; ?></th>
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

