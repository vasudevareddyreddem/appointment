<head>
 <title>Online doctor appointment in Tirupati - Med Arogya</title>
    <meta name="description" content="Med Arogya has developed the best software to book online doctor appointment in Tirupati. It also facilitates online booking for lab tests and pharmacy." />
    <meta name="keywords" content="online doctor appointment in tirupati, doctor appointment in tirupati, book doctor appointment in tirupati, online hospital appointment, online medical doctor in tirupati,  " />
</head>
<style>
.carousel-item > div {
  float: left;
}
.carousel-by-item [class*="cloneditem-"] {
  display: none;
}
.carousel-control-next, .carousel-control-prev{
    width: 5%;
}

</style>

<!--Main layout-->
<main class="" style="margin-top:80px;">

   <!--Section: Jumbotron-->
   <!--Carousel Wrapper-->
<div id="carousel-example-1z"  class="carousel slide carousel-fade" data-ride="">
  <!--Indicators-->
 <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    <li data-target="#carousel-example-1z" data-slide-to="2"></li> 
	<li data-target="#carousel-example-1z" data-slide-to="3"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/vendor/img/slider-2.png" alt="First slide">
	   <div class="carousel-caption">
        <h1 class="h3-responsive">Now Book Online Doctor Appointment In Tirupati!</h1>
      
      </div>
    </div>
    <!--/First slide-->
    <!--Second slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/vendor/img/slider-1.png" alt="Second slide">
    </div>
    <!--/Second slide-->
    <!--Third slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/vendor/img/slider-3.png" alt="Third slide">
    </div>
    <!--/Third slide-->  
	<!--Third slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/vendor/img/slider-4.png" alt="Third slide">
    </div>
    <!--/Third slide-->
  </div>
  <!--/.Slides-->
  <!--Controls-->
 <!-- <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>-->
  <!--/.Controls-->
</div>
 <div class="container" >
 <div class="posi_ab_form " style="">
                <div class="text-white text-left mx-4 ">
                <!--Card: Jumbotron-->
                    <div class="row mb-5 pb-4">
                        <div class="content-bg ml-auto mt-5 mb-5 p-5" style="width:340px">

                            <h2 class="pt-1 h1">
                                <strong>Med<span> Arogya</span></strong>
                            </h2>
                            <h2 class="mb-4 h6" style="">
                                Booking online doctor appointment in Tirupati is made simple with Med Arogya
                            </h2>
                            <!-- Content -->
                            <div class="text-center">
                                <form action="<?php echo base_url('users/search'); ?>" method="post" class="search-form">

                                    <div class="form-group mb-3">
                                        <select class="form-control" name="city" id="city" required>
                                            <option value="">Select city</option>
                                            <?php if(isset($city_list) && count($city_list)>0){ ?>
                                            <?php foreach($city_list as $li){ ?>
                                            <option value="<?php echo $li['hos_bas_city']; ?>">
                                                <?php echo $li['hos_bas_city']; ?>
                                            </option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="search_value" id="search_value" placeholder="Search hospitals / departments" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block btn-md">Search</button>

                                </form>
                            </div>
                            <!-- Content -->

                        </div>
                    </div>
                </div>
            </div>
            </div>

    
    <section class="hdd_counts py-2" style="background: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center white-text h_count p-4">
                    <i class="fa fa-hospital-o fa-3x"></i>
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-2">Hospitals - <span> <?php echo isset($hospital_list['cnt'])?$hospital_list['cnt']:''; ?></span></h5>
                   
                </div>
                <div class="col-md-4 text-center white-text d_count p-4">
                    <i class="fa fa-user-md fa-3x"></i>
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-2">Doctors - <span> <?php echo isset($doctors_list['cnt'])?$doctors_list['cnt']:''; ?></span></h5>
                  
                </div>
                <div class="col-md-4 text-center white-text dep_count p-4">
                    <i class="fa fa-building fa-3x"></i>
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-2">Departments - <span>   <?php echo isset($clicnic_list['cnt'])?$clicnic_list['cnt']:''; ?></span></h5>
                   
                </div>
            </div>
        </div>
    </section>
    <?php //echo '<pre>';print_r($logos_list);exit;?>
<?php if(isset($logos_list) && count($logos_list)>0){ ?>
    <section class="mt-5 pt-3 pb-3">
        <style type="text/css" id="slider-css"></style>
        <div class="container">
            <div class="row">
			 <p class="h3"> Our Associate Hospitals </p>
                <div id="slider-1" class="carousel carousel-by-item slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
					<?php $cnt=1;
					$url=$this->config->item('logos_url');
						foreach($logos_list as $list){?>
					<?php if($cnt==1){ ?>
                        <div class="carousel-item active">
                            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                                <img class="d-block img-fluid" src="<?php echo $url.'assets/logo_images/'.$list['image']; ?>" alt="<?php echo $list['org_name']; ?>">
                            </div>
                        </div>
					<?php }else{ ?>
						<div class="carousel-item">
                            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                                <img class="d-block img-fluid" src="<?php echo $url.'assets/logo_images/'.$list['image']; ?>" alt="<?php echo $list['org_name']; ?>">
                            </div>
                        </div>
					<?php } ?>
					<?php $cnt++;} ?>
                        
                    </div>
                    <a class="carousel-control-prev" href="#slider-1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slider-1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


    <section class="mt-5">
        <div class="container">
            <!--Grid row-->
            <div class="row mt-5">

                <!--Grid column-->
                <div class="col-md-8">
                    <p class="h3"> About Us </p>

                    <p>The evolution of technology has made the communication process much easier for humans. In the past decade one has to present  physically at the hospital to book a doctor appointment but now through the expeditious expansion in software, one can book online doctor appointment through our mobile app/website, all you need is a smart phone with an internet connection.</p>

                    <p>We at Med Arogya has developed the best software to book online doctor appointment in Tirupati and surronding areas. This is very helpful for medical care seekers, as they can book online doctor/hospital/laboratory appointment at anytime and anywhere. We offer 10% - 50% discount through health cards issued by Med Arogya.</p>

                    <p>It helps people to find online medical services like choosing the right hospital, booking doctor appointment, booking diagnostic center appointment, storing medical records, purchasing online medicines etc.</p>


                </div>
                <!--Grid column-->
                <div class="col-md-4">

                    <!-- Card -->
                    <div class="card card-image mb-4" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/hospitals.png);">

                        <div class="text-white text-center d-flex align-items-center rgba-indigo-strong py-4 px-4">
                            <div>
                                <h3 class="card-title pt-2"><strong>Hospitals & Clinics</strong></h3>
                                <p>MedArogya acts as a bridge in between medical care seekers and hospitals. Join us to help medical care seekers to find online doctor appointment in Tirupati in a fast and easy way.</p>
                                <a target="_blank" href="https://Medspaceit.com/" class="btn btn-outline-white"><i class="fa fa-user-plus left"></i> Register </a>
                            </div>
                        </div>

                    </div>
                    <!-- Card -->

                    <!--Card-->
                    <div class="card mb-4">

                        <div class="media pt-3 pl-2 pr-3 pb-3 bg-f5f5f5">
                            <img class="d-flex mr-3" src="<?php echo base_url(); ?>assets/vendor/img/telecom.png" alt="Support">
                            <div class="media-body">
                                <h4 class=" font-weight-bold py-4">Customer Care</h4>

                            </div>
                        </div>
                        <div class="px-3 py-2">
                            <p class="mb-1 "><strong><i class="text-success fa fa-envelope" aria-hidden="true"></i></strong> : support@medarogya.com</p>
                            <p class="mb-1 "><strong><i class=" text-success fa fa-phone" aria-hidden="true"></i></strong> : 7997999108</p>
                            <p class="mb-1 "><strong><i class=" text-success fa fa-whatsapp" aria-hidden="true" style="font-weight:600"></i></strong> : 7997999105</p>
                        </div>

                    </div>
                    <!--/.Card-->

                </div>

            </div>
        </div>
    </section>

</main>
<!--Main layout-->

<script type="text/javascript">
    function GetUnique(e) {
            var l = [],
                s = temp_c = [],
                t = ["col-md-1", "col-md-2", "col-md-3", "col-md-4", "col-md-6", "col-md-12", "col-sm-1", "col-sm-2", "col-sm-3", "col-sm-4", "col-sm-6", "col-sm-12", "col-lg-1", "col-lg-2", "col-lg-3", "col-lg-4", "col-lg-6", "col-lg-12", "col-xs-1", "col-xs-2", "col-xs-3", "col-xs-4", "col-xs-6", "col-xs-12", "col-xl-1", "col-xl-2", "col-xl-3", "col-xl-4", "col-xl-6", "col-xl-12"];
            $(e).each(function() {
                for (var l = $(e + " > div").attr("class").split(/\s+/), t = 0; t < l.length; t++) s.push(l[t])
            });
            for (var c = 0; c < s.length; c++) temp_c = s[c].split("-"), 2 == temp_c.length && (temp_c.push(""), temp_c[2] = temp_c[1], temp_c[1] = "xs", s[c] = temp_c.join("-")), -1 == $.inArray(s[c], l) && $.inArray(s[c], t) && l.push(s[c]);
            return l
        }

        function setcss(e, l, s) {
            for (var t = ["", "", "", "", "", ""], c = d = f = g = 0, r = [1200, 992, 768, 567, 0], a = "", o = [], a = 0; a < e.length; a++) {
                var i = e[a].split("-");
                if (3 == i.length) {
                    switch (i[1]) {
                        case "xl":
                            d = 0;
                            break;
                        case "lg":
                            d = 1;
                            break;
                        case "md":
                            d = 2;
                            break;
                        case "sm":
                            d = 3;
                            break;
                        case "xs":
                            d = 4
                    }
                    t[d] = i[2]
                }
            }
            for (var n = 0; n < t.length; n++)
                if ("" != t[n]) {
                    if (0 == c && (c = 12 / t[n]), f = 12 / t[n], g = 100 / f, a = s + " > .carousel-item.active.carousel-item-right," + s + " > .carousel-item.carousel-item-next {-webkit-transform: translate3d(" + g + "%, 0, 0);transform: translate3d(" + g + ", 0, 0);left: 0;}" + s + " > .carousel-item.active.carousel-item-left," + s + " > .carousel-item.carousel-item-prev {-webkit-transform: translate3d(-" + g + "%, 0, 0);transform: translate3d(-" + g + "%, 0, 0);left: 0;}" + s + " > .carousel-item.carousel-item-left, " + s + " > .carousel-item.carousel-item-prev.carousel-item-right, " + s + " > .carousel-item.active {-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0);left: 0;}", f > 1) {
                        for (k = 0; k < f - 1; k++) o.push(l + " .cloneditem-" + k);
                        o.length && (a = a + o.join(",") + "{display: block;}"), o = []
                    }
                    0 != r[n] && (a = "@media all and (min-width: " + r[n] + "px) and (transform-3d), all and (min-width:" + r[n] + "px) and (-webkit-transform-3d) {" + a + "}"), $("#slider-css").prepend(a)
                }
            $(l).each(function() {
                for (var e = $(this), l = 0; l < c - 1; l++)(e = e.next()).length || (e = $(this).siblings(":first")), e.children(":first-child").clone().addClass("cloneditem-" + l).appendTo($(this))
            })
        }

        //Use Different Slider IDs for multiple slider
        $(document).ready(function() {
            var item = '#slider-1 .carousel-item';
            var item_inner = "#slider-1 .carousel-inner";
            classes = GetUnique(item);
            setcss(classes, item, item_inner);

        });
</script>