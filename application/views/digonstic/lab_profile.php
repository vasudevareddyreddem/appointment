<!--Main layout-->
<main class="pt-3">

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
									<?php echo isset($lab_deatils['accrediations'])?$lab_deatils['accrediations']:''; ?>
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
                                <input type="text" class="form-control" name="" id="myInput" onkeyup="myFunction()" placeholder="Search all tests in lab" style="width:70%;">
                            </div>

                            <ul id="myUL" class="list-unstyled">
							<?php foreach($lab_deatils['test_names'] as $list){ ?>
									<li>
										<hr>
										<div class="d-block d-md-flex pb-0">
											<div class="mt-2">
												<h6 class="mb-1"><a href="#" class=""> <?php echo isset($list['test_name'])?$list['test_name']:''; ?></a></h6>
												<small>Type : <?php echo isset($list['test_type'])?$list['test_type']:''; ?></small>
											</div>
											<div class="ml-auto">
												<div class="d-block d-md-flex">
													<p class="mb-0 font-weight-bold mt-2"><span>&#8377;</span><span><?php echo isset($list['test_amount'])?$list['test_amount']:''; ?></span></p>
													<a id="" class="btn btn-outline-primary btn-sm ml-5" href="javascript:void(0);" onclick="addtocard('<?php echo $list['l_id']; ?>','<?php echo $list['lab_id']; ?>');" role="button">Book</a>
												</div>
												<div class="">
													<p class="mb-0"><span></span> Reports In : <small><?php echo isset($list['test_duartion'])?$list['test_duartion']:''; ?></small></p>
												</div>
											</div>
										</div>
									</li>
							<?php } ?>
                            </ul>

                        </div>
                        
                        <?php } ?>

                    </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4">
					<span id="cart_item_count"></span>
                    

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>

    </section>
    <!--Section: Post-->
</main>
<!--Main layout-->
					 <div id="sucessmsg" style="display:none;"></div>
					 <script>
window.location.hash="";
window.location.hash="";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="";}

if ("onhashchange" in window) {
    //no alert
    console.log("The browser supports the hashchange event!");
}


function locationHashChanged() {
    if (location.hash === "#somecoolfeature") {
        somecoolfeature();
    }
}

window.onhashchange = locationHashChanged;



// example

// Using the location.hash property to change the anchor part
function changeHash() {
    location.hash = (Math.random() > 0.5) ? "666" : "777";
}

// Alert some text if there has been changes to the anchor part
function HashHandler() {
    console.log("The Hash has changed!");
}

window.addEventListener("hashchange", HashHandler, false);
</script> 
<script>
jQuery.ajax({
   			url: "<?php echo base_url('diagnostic/get_cart_list');?>",
   			data: {
				test_id: '',
				lab_id: '',
			},
   			type: "POST",
   			format:"json",
			dataType: 'html',
   					success:function(data){
						$('#cart_item_count').empty();
						$('#cart_item_count').append(data);

   					}
           });
  function addtocard(id,l_id){
	if(id!='' && l_id!=''){
		 jQuery.ajax({
   			url: "<?php echo base_url('diagnostic/add_to_cart');?>",
   			data: {
				test_id: id,
				lab_id: l_id,
			},
   			type: "POST",
   			format:"json",
			dataType: 'html',
   					success:function(data){
						$('#sucessmsg').show();
						$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-succ">Product Successfully added to cart <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');
						$('#cart_item_count').empty();
						$('#cart_item_count').append(data);

   					}
           });
	}
	
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