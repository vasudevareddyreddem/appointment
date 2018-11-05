<!--Main layout-->
<main class="">

    <!--Section: Post-->
    <section class="mt-5">
        <div class="container">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8">

                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body pb-0">

                            <div class="media d-block d-md-flex">
                                <?php 
								$mail_url=$this->config->item('lab_url');
								if($lab_deatils['profile_pic']==''){ ?>
                                <img class="d-flex mb-3 mx-auto z-depth-1" src="<?php echo base_url('assets/profile_pic/dia-test.png'); ?>" alt="Logo" style="width: 100px;">
                                <?php }else{ ?>
                                <img class="d-flex mb-3 mx-auto z-depth-1" src="<?php echo $mail_url.'assets/profile_pic/'.$lab_deatils['profile_pic']; ?>" alt="<?php echo isset($lab_deatils['profile_pic'])?$lab_deatils['profile_pic']:''; ?>" style="width: 100px;">
                                <?php } ?>
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h4 class="mt-0 font-weight-bold">
                                        <?php echo isset($lab_deatils['name'])?$lab_deatils['name']:''; ?>
                                    </h4>
                                    <p class="mb-0">
                                        <?php echo isset($lab_deatils['address1'])?$lab_deatils['address1']:''; ?>,
                                        <?php echo isset($lab_deatils['address2'])?$lab_deatils['address2']:''; ?>
                                        <?php echo isset($lab_deatils['city'])?$lab_deatils['city']:''; ?>
                                        <?php echo isset($lab_deatils['state'])?$lab_deatils['state']:''; ?>
                                        <?php echo isset($lab_deatils['country'])?$lab_deatils['country']:''; ?>
                                    </p>
                                    <p>Zip code :
                                        <?php echo isset($lab_deatils['zipcode'])?$lab_deatils['zipcode']:''; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="mt-3 d-block d-md-flex">
                                <?php if(isset($lab_deatils['test_names']) && count($lab_deatils['test_names'])>0){ ?>
                                <div>
                                    <label class="mb-0">Facilities</label>
                                    <ul class="list-inline list-styled">
                                        <?php foreach($lab_deatils['test_names'] as $list){ ?>
                                        <li class="list-inline-item"><span>&#8226;</span> <small>
                                                <?php echo isset($list['test_name'])?$list['test_name']:''; ?></small></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php } ?>
                                <!--<div class="ml-5">
                                    <label class="mb-0">Next Slot</label>
                                    <ul class="list-inline list-styled">
                                        <li class="list-inline-item"><small>Tomorrow at 6:30PM</small></li>
                                    </ul>
                                </div>-->
                            </div>

                        </div>

                        <hr>

                        <!--Card content-->
                        <?php if(isset($lab_deatils['test_names']) && count($lab_deatils['test_names'])>0){ ?>
                        <div class="card-body">

                            <div class="">
                                <h5 class="mt-0 font-weight-bold">All Tests</h5>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                            </div>

                            <hr>

                            <ul id="myUL">
                                <li>
                                    <hr class="mt-0">

                                    <div class="d-block d-md-flex pb-0">
                                        <div class="mt-2">
                                            <h6 class="mb-1">REMO - AMLI / ETO IN AML M - 2</h6>
                                            <small>Also known as: Amli/Eto In Aml M2 Fish Blood.</small>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="d-block d-md-flex">
                                                <p class="mb-0 font-weight-bold mt-2"><span>&#8377;</span><span>8561</span></p>
                                                <a id="" class="btn btn-outline-primary btn-sm ml-5" href="#" role="button">Book</a>
                                            </div>
                                            <div class="">
                                                <ul class="list-unstyled">
                                                    <li class=""><span>&#8226;</span> <small>Lorem ipsum</small></li>
                                                    <li class=""><span>&#8226;</span> <small>Phasellus iaculis</small></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <hr class="mt-0">

                                    <div class="d-block d-md-flex pb-0">
                                        <div class="mt-2">
                                            <h6 class="mb-1">AVATAR - AMLI / ETO IN AML M - 2</h6>
                                            <small>Also known as: Amli/Eto In Aml M2 Fish Blood.</small>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="d-block d-md-flex">
                                                <p class="mb-0 font-weight-bold mt-2"><span>&#8377;</span><span>8561</span></p>
                                                <a id="" class="btn btn-outline-primary btn-sm ml-5" href="#" role="button">Book</a>
                                            </div>
                                            <div class="">
                                                <ul class="list-unstyled">
                                                    <li class=""><span>&#8226;</span> <small>Lorem ipsum</small></li>
                                                    <li class=""><span>&#8226;</span> <small>Phasellus iaculis</small></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <hr class="mt-0">

                                    <div class="d-block d-md-flex pb-0">
                                        <div class="mt-2">
                                            <h6 class="mb-1">RATIO - AMLI / ETO IN AML M - 2</h6>
                                            <small>Also known as: Amli/Eto In Aml M2 Fish Blood.</small>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="d-block d-md-flex">
                                                <p class="mb-0 font-weight-bold mt-2"><span>&#8377;</span><span>8561</span></p>
                                                <a id="" class="btn btn-outline-primary btn-sm ml-5" href="#" role="button">Book</a>
                                            </div>
                                            <div class="">
                                                <ul class="list-unstyled">
                                                    <li class=""><span>&#8226;</span> <small>Lorem ipsum</small></li>
                                                    <li class=""><span>&#8226;</span> <small>Phasellus iaculis</small></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <hr class="mt-0">

                                    <div class="d-block d-md-flex pb-0">
                                        <div class="mt-2">
                                            <h6 class="mb-1">REVENGE - AMLI / ETO IN AML M - 2</h6>
                                            <small>Also known as: Amli/Eto In Aml M2 Fish Blood.</small>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="d-block d-md-flex">
                                                <p class="mb-0 font-weight-bold mt-2"><span>&#8377;</span><span>8561</span></p>
                                                <a id="" class="btn btn-outline-primary btn-sm ml-5" href="#" role="button">Book</a>
                                            </div>
                                            <div class="">
                                                <ul class="list-unstyled">
                                                    <li class=""><span>&#8226;</span> <small>Lorem ipsum</small></li>
                                                    <li class=""><span>&#8226;</span> <small>Phasellus iaculis</small></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <hr class="mt-0">

                                    <div class="d-block d-md-flex pb-0">
                                        <div class="mt-2">
                                            <h6 class="mb-1">NOTHING - AMLI / ETO IN AML M - 2</h6>
                                            <small>Also known as: Amli/Eto In Aml M2 Fish Blood.</small>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="d-block d-md-flex">
                                                <p class="mb-0 font-weight-bold mt-2"><span>&#8377;</span><span>8561</span></p>
                                                <a id="" class="btn btn-outline-primary btn-sm ml-5" href="#" role="button">Book</a>
                                            </div>
                                            <div class="">
                                                <ul class="list-unstyled">
                                                    <li class=""><span>&#8226;</span> <small>Lorem ipsum</small></li>
                                                    <li class=""><span>&#8226;</span> <small>Phasellus iaculis</small></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>


                        </div>
                        <?php } ?>

                    </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4">

                    <div class="card mb-4">

                        <!--Card content-->
                        <div class="card-body pb-0 d-block d-md-flex">
                            <div class="">
                                <h6 class="mt-0 mb-0 font-weight-bold">Selected Tests</h6>
                                <small class="mt-0">Thyrocare, Domalguda</small>
                            </div>
                            <div class="mt-auto ml-auto">
                                <small>2 Tests</small>
                            </div>
                        </div>
                        <hr class="mt-2 mb-2">

                        <!--Card content-->
                        <div class="card-body pt-0">
                            <div class="d-block d-md-flex mt-2">
                                <div>
                                    <i class="fa fa-times"></i>
                                    <small class="ml-2">FISH - AMLI / ETO IN AML M - 2</small>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span>3500</span></small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-1">
                            <div class="d-block d-md-flex mt-2">
                                <div>
                                    <i class="fa fa-times"></i>
                                    <small class="ml-2">FISH - AMLI / ETO IN AML M - 2</small>
                                </div>
                                <div class="ml-auto">
                                    <small><span>&#8377;</span> <span>3500</span></small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-1">
                            <div class="d-block d-md-flex mt-2 p-2 green lighten-5">
                                <div>
                                    <p class="mb-0">Total</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span>&#8377;</span> <span>7000</span></p>
                                </div>
                            </div>
                            <a class="btn btn-success btn-block mt-3" href="lab_test_booking.php">Checkout</a>
                        </div>
                    </div>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>

    </section>
    <!--Section: Post-->
</main>
<!--Main layout-->

<script>
    function addtocard(id, l_id) {
        alert(id);
        alert(l_id);

    }
</script>
<script>
    function myFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>