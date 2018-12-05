<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php 
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
?>
    <title>MedArogya</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/vendor/img/logo1.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendor/dist/css/bootstrapValidator.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/mdb.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendor/css/addons/datatables.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/style.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/jquery-3.3.1.min.js"></script>

</head>

<body class="grey lighten-5">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark  header-back-color ">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="<?php echo base_url(''); ?>">
                    <img src="<?php echo base_url(); ?>assets/vendor/img/logo1.png" alt="medspace" height="auto" width="85px">
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fa fa-bars fa-2x black-text"></i></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto mar-l50">
                        <li class="nav-item black-text  <?php if($this->uri->segment(1)==''){ echo "active"; } ?>">
                            <a class="nav-link waves-effect black-text" href="<?php echo base_url(); ?>">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(1)=='appointment'){ echo "active"; } ?>">
                            <a class="nav-link waves-effect" href="<?php echo base_url('appointment'); ?>">Book Appointment</a>
                        </li>
						<li class="nav-item <?php if($this->uri->segment(1)=='diagnostic'){ echo "active"; } ?>">
                            <a class="nav-link waves-effect" href="<?php echo base_url('diagnostic'); ?>">Diagnostic Tests</a>
                        </li>
                       
						<!--<li class="nav-item">
                            <a class="nav-link waves-effect" href="order_medicine.php">Order Medicine</a>
                        </li>-->
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
					<?php if(!$this->session->userdata('app_user')){ ?>
                        <li class="nav-item mr-2 <?php if($this->uri->segment(2)=='login'){ echo "active"; } ?>">
                            <a href="<?php echo base_url('users/login'); ?>" class="nav-link border border-light rounded waves-effect">
                                <i class="fa fa-sign-in mr-2"></i>Login
                            </a>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(2)=='register'){ echo "active"; } ?>">
                            <a href="<?php echo base_url('users/register'); ?>" class="nav-link border border-light rounded waves-effect">
                                <i class="fa fa-user-plus mr-2"></i>Register
                            </a>
                        </li>
					<?php }else{ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo isset($user_details['name'])?ucfirst($user_details['name']):''; ?></a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>">My Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url('appointment/lists'); ?>">Appointments List</a>
                                <a class="dropdown-item" href="<?php echo base_url('diagnostic/cart'); ?>">Lab Cart</a>
                                <a class="dropdown-item" href="<?php echo base_url('diagnostic/orders'); ?>">My Diagnostic Orders</a>
                                <a class="dropdown-item" href="<?php echo base_url('profile/changepassword'); ?>">Change Password</a>
                                <a class="dropdown-item" href="<?php echo base_url('dashboard/logout'); ?>">Sign Out</a>
                            </div>
                        </li>
					<?php } ?>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->
	<?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>