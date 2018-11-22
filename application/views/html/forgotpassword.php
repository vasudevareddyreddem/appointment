<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Forgot password</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/style.min.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

    <!--Main layout-->
    <main class="pt-5" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
        <div class="container">

            <!--Section: Post-->
            <section class="mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-5 mx-auto">
                        
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <form id="defaultForm" action="<?php echo base_url('users/forgotpasswordpost'); ?>" method="post">
                                            <div class="md-form form-group">
                                                <i class="fa fa-envelope prefix grey-text"></i>
                                                <input type="text" id="email" name="email" class="form-control">
                                                <label for="">Enter your email</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-md btn-block mb-4 waves-effect waves-light" role="button">Submit</button>
                                            </div>
                                        </form>
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
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
        </div>
    </main>


    <!--Main layout-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
	
    $('#defaultForm').bootstrapValidator({
//     
        fields: {
            email: {
               validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            }
        }
    });
});
</script>