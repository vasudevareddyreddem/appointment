
<!--Main layout-->
<main class="pt-3" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);" >
    <div class="container">

        <!--Section: Post-->
        <section class="mt-4 pt-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mx-auto">

                    <!--Reply-->
                    <div class="card mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold bg-white">Book Appointment</div>
                        <div class="card-body">

                            <form onsubmit="return checkDate()" id="addappoinment" name="addappoinment" action="<?php echo base_url('appointment/post'); ?>" method="post">
								<div class="form-group">
                                    <select id="city" name="city" class="form-control" onchange="get_hos_list(this.value)">
                                        <option value="">Select City</option>
										<?php if(isset($city_list) && count($city_list)>0){ ?>
                                        <?php foreach($city_list as $list){ ?>
										 <option value="<?php echo $list['hos_bas_city']; ?>"><?php echo $list['hos_bas_city']; ?></option>
										<?php } ?>
										<?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select id="hospital_id" name="hospital_id" onchange="get_hospital_department(this.value);" class="form-control">
                                        <option value="">Select Hospital</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select id="department" name="department" onchange="get_hospital_sepci(this.value);"  class="form-control">
                                        <option value="" >Select Department</option>
                                    </select>
                                </div>
								<div class="form-group">
                                    <select id="specilist" name="specilist" onchange="get_hospital_doctor(this.value);"  class="form-control">
                                        <option value="" >Select Speciality</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select id="doctor_id" name="doctor_id" onchange="get_time_slot(this.value);get_consultation_fee(this.value);" class="form-control">
                                        <option value="">Select Doctor</option>
                                      
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input  type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Time Slot</label>
                                        <?php $time_list=array("12:00 am","12:30 am","01:00 am","01:30 am","02:00 am","02:30 am","03:00 am","03:30 am","04:00 am","04:30 am","05:00 am","05:30 am","06:00 am","06:30 am","07:00 am","07:30 am","08:00 am","08:30 am","09:00 am","09:30 am","10:00 am","10:30 am","11:00 am","11:30 am","12:00 pm","12:30 pm","01:00 pm","01:30 pm","02:00 pm","02:30 pm","03:00 pm","03:30 pm","04:00 pm","04:30 pm","05:00 pm","05:30 pm","06:00 pm","06:30 pm","07:00 pm","07:30 pm","08:00 pm","08:30 pm","09:00 pm","09:30 pm","10:00 pm","10:30 pm","11:00 pm","11:30 pm"); ?>
										<select class="form-control" id="time" name="time">
											<option value="">Select</option>
										</select>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" id="name" name="name"  class="form-control">
                                        </div>
                                    </div>
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Age</label>
                                            <input type="text" id="age" name="age"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-warning form-group row">
                                    <input type="checkbox" class="col-md-1 form-control mt-3" id="terms_conditions" name="terms_conditions"  style="height: 16px;">
                                    <label class="col-md-11 mt-2 pt-1 pl-0" for="terms_conditions">Doctor consultation fee is <span id="consultaion_fee"></span> check once, consultation fee before confirmation </label>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-md mb-4 waves-effect waves-light"  role="button">Booking Confirmation</button>
                                </div>

                            </form>

                        </div>
                    </div>
                    <!--/.Reply-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Post-->

    </div>
</main>
<!--Main layout-->


<script type="text/javascript">
function checkDate() {
   var selectedText = document.getElementById('date').value;
   var selectedDate = new Date(selectedText);
   var now = new Date();
   if (selectedDate < now) {
    alert("Date must be in the future");return false;
   }
 }
function get_consultation_fee(a_id){
	if(a_id!=''){
		jQuery.ajax({
   			url: "<?php echo base_url('appointment/get_consultation_fee');?>",
   			data: {
				a_id: a_id,
			},
   			dataType: 'json',
   			type: 'POST',
   					success:function(data){
						console.log(data.fee);
						if(data.msg=1){
							$('#consultaion_fee').empty();
							$('#consultaion_fee').val(data.fee);
							$('#consultaion_fee').append(data.fee);
						}
					}
           });
	}
	
}
function get_time_slot(d_id){
	if(d_id!=''){
	jQuery.ajax({
   			url: "<?php echo base_url('appointment/get_doctors_time_list');?>",
   			data: {
				d_id: d_id,
				h_id: $('#hospital_id').val(),
			},
   			dataType: 'json',
   			type: 'POST',
   					success:function(data){
						//console.log(data.list[i]);return false;
						if(data.msg=1){
							$('#time').empty();
							$('#time').append("<option>Select Time</option>");
							for(i=0; i<data.list.length; i++) {
								//$('#time').append("<option value="+data.list[i]+">xx</option>");                     
								$('#time').append('<option value="'+data.list[i]+'">'+data.list[i]+'</option>');                      
							 }
							
						}else{
							$('#time').empty();
							$('#time').append("<option value=''>NO Time Slot</option>");
						}
					}
           });
	}else{
		$('#time').empty();
		$('#time').append("<option value=''>Select</option>");
	}
	
}
function get_hospital_doctor(s_id){
	if(s_id!=''){
		jQuery.ajax({
   			url: "<?php echo base_url('appointment/get_hospital_specilist_doctor');?>",
   			data: {
				s_id: s_id,
				h_id: $('#hospital_id').val(),
			},
   			dataType: 'json',
   			type: 'POST',
   					success:function(data){
						console.log(data.msg);
						if(data.msg=1){
							$('#doctor_id').empty();
							$('#doctor_id').append("<option>Select Doctor</option>");
							for(i=0; i<data.list.length; i++) {
								$('#doctor_id').append("<option value="+data.list[i].a_id+">"+data.list[i].resource_name+"</option>");                      
							 
							}
							
						}
					}
           });
	}
	
}
function get_hospital_sepci(d_id){
	if(d_id!=''){
		jQuery.ajax({
   			url: "<?php echo base_url('appointment/get_hospital_department_specilist');?>",
   			data: {
				d_id: d_id,
				h_id: $('#hospital_id').val(),
			},
   			dataType: 'json',
   			type: 'POST',
   					success:function(data){
						console.log(data.msg);
						if(data.msg=1){
							$('#specilist').empty();
							$('#specilist').append("<option>Select Speciality</option>");
							for(i=0; i<data.list.length; i++) {
								$('#specilist').append("<option value="+data.list[i].s_id+">"+data.list[i].specialist_name+"</option>");                      
							 
							}
							
						}
					}
           });
	}
	
}
function get_hospital_department(h_id){
	if(h_id!=''){
		jQuery.ajax({
   			url: "<?php echo base_url('appointment/get_hospital_department');?>",
   			data: {
				h_id: h_id,
			},
   			dataType: 'json',
   			type: 'POST',
   					success:function(data){
						console.log(data.msg);
						if(data.msg=1){
							$('#department').empty();
							$('#department').append("<option>Select Department</option>");
							for(i=0; i<data.list.length; i++) {
								$('#department').append("<option value="+data.list[i].t_id+">"+data.list[i].t_name+"</option>");                      
							 
							}
							
						}
					}
           });
	}
	
}
function get_hos_list(c_id){
	if(c_id!=''){
		jQuery.ajax({
   			url: "<?php echo base_url('appointment/get_hospital_list');?>",
   			data: {
				city: c_id,
			},
   			dataType: 'json',
   			type: 'POST',
   					success:function(data){
						console.log(data.msg);
						if(data.msg=1){
							$('#hospital_id').empty();
							$('#hospital_id').append("<option>Select Hospital</option>");
							for(i=0; i<data.list.length; i++) {
								$('#hospital_id').append("<option value="+data.list[i].hos_id+">"+data.list[i].hos_bas_name+"</option>");                      
							 
							}
							
						}
					}
           });
	}
	
}
$(document).ready(function() {
    $('#addappoinment').bootstrapValidator({
        
        fields: {
            name: {
                validators: {
					notEmpty: {
						message: 'Name is required'
					}
				}
            },
			city: {
                validators: {
					notEmpty: {
						message: 'City is required'
					}
				}
            },
			hospital_id: {
                validators: {
					notEmpty: {
						message: 'Hospital is required'
					}
				}
            },
            department: {
               validators: {
					notEmpty: {
						message: 'Department is required'
					}
				}
            },
			doctor_id: {
               validators: {
					notEmpty: {
						message: 'Doctor is required'
					}
				}
            },
			date: {
               validators: {
					notEmpty: {
						message: 'Date is required'
					}
				}
            },
			age: {
               validators: {
					notEmpty: {
						message: 'Age is required'
					}
				}
            },
			terms_conditions: {
               validators: {
					notEmpty: {
						message: 'Checkbox is required'
					}
				}
            },
			time: {
                validators: {
					notEmpty: {
						message: 'Time is required'
					}
				}
            }
            }
        })
     
});

</script>