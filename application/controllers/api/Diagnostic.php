<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Diagnostic extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->model('Diagnosticapp_model');
		
    }

 
	public function cities_post(){
		$city_list=$this->Diagnosticapp_model->get_city_list();
		if(count($city_list)>0){
			$message = array('status'=>1,'list'=>$city_list,'message'=>'Cities list are found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Cities list are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public function package_post(){
		$packages_list=$this->Diagnosticapp_model->get_packages_list();
		if(isset($packages_list) && count($packages_list)>0){
			foreach($packages_list as $list){
				$p_l_lists[]=$list;
			}
		}
		if(isset($p_l_lists) && count($p_l_lists)>0){
			$message = array('status'=>1,'list'=>$p_l_lists,'message'=>'Packages list are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Packages list are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public function search_post(){
		$city=$this->post('city');
		$search=$this->post('search_value');
		if($city!='' && $search!=''){
				$lab_list=$this->Diagnosticapp_model->get_loication_and_lab_wise_lab_list($city,$search);
				$test_list=$this->Diagnosticapp_model->get_loication_and_lab_wise_testy_list($city,$search);
				$all_data=array_merge($lab_list,$test_list);
			}else if($city!='' && $search==''){
				$lab_list=$this->Diagnosticapp_model->get_all_loication_wise_lab_list($city);
				$test_list=$this->Diagnosticapp_model->get_all_test_names_list($city);
				$all_data=array_merge($lab_list,$test_list);
			}else if($city=='' && $search!=''){
				$lab_list=$this->Diagnosticapp_model->get_lab_name_list($search);
				$test_list=$this->Diagnosticapp_model->get_test_name_list($search);
				$all_data=array_merge($lab_list,$test_list);
			}
			if(isset($all_data) && count($all_data)>0){
					
					$pageNos = array();
					foreach($all_data as $el) {
						//echo '<pre>';print_r($el);
					   $pageno = $el['a_id'];
					   if(!in_array($pageno, $pageNos))
					   {
							$deta=$this->Diagnosticapp_model->get_lab_test_lists($pageno);
							if($el['a_id']!=''){
								$data[$el['a_id']]=$el;
								$data[$el['a_id']]['test_names']=isset($deta)?$deta:'';
							}
							//echo '<pre>';print_r($el);exit;							
							//echo $pageno ;
						   array_push($pageNos,$pageno);
					   }
					}
					
					$all_labs_lists=$data;
					
				}
			if(isset($all_labs_lists) && count($all_labs_lists)>0){
				foreach($all_labs_lists as $lists){
					$labs_lists[]=$lists;
				}
				}else{
					$labs_lists=array();
				}
				
			
		if(isset($labs_lists) && count($labs_lists)>0){
			$message = array('status'=>1,'list'=>$labs_lists,'imgpath'=>'http://mlab.ehealthinfra.com/assets/profile_pic','message'=>'Test list are found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Test list are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		
		
	}
	
	public function test_list_post(){
		$a_id=$this->post('a_id');
		
		if($a_id==''){
			$message = array('status'=>0,'message'=>'Lab Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$test_list=$this->Diagnosticapp_model->get_lab_details_with_test_list($a_id);
		//echo '<pre>';print_r($test_list);exit;
		
		if(isset($test_list) && count($test_list)>0){
			$message = array('status'=>1,'details'=>$test_list,'message'=>'Test details are found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Test details are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public  function updateprofile_post(){
		$s_id=$this->post('s_id');
		$name=$this->post('name');
		$email=$this->post('email');
		$mobile=$this->post('mobile');
		$address=$this->post('address');
		$account_number=$this->post('account_number');
		$bank_name=$this->post('bank_name');
		$ifsc_code=$this->post('ifsc_code');
		$bank_account_holder=$this->post('bank_account_holder');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if($name==''){
			$message = array('status'=>0,'message'=>'Name is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($email==''){
			$message = array('status'=>0,'message'=>'Email Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($mobile==''){
			$message = array('status'=>0,'message'=>'Mobile Number is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($address==''){
			$message = array('status'=>0,'message'=>'Address is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		/*if($account_number==''){
			$message = array('status'=>0,'message'=>' Bank Account Number is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($bank_name==''){
			$message = array('status'=>0,'message'=>' Bank Name is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($ifsc_code==''){
			$message = array('status'=>0,'message'=>' Ifsc Code is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($bank_account_holder==''){
			$message = array('status'=>0,'message'=>'Bank Account Holder Name is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}*/
		$details=$this->Cardnumber_model->get_card_seller_details($s_id);
		/*if($details['kyc']==''){
				$message = array('status'=>0,'message'=>'kyc is required');
				$this->response($message, REST_Controller::HTTP_OK);
		}*/
		if(isset($_FILES['kyc']['name']) && $_FILES['kyc']['name']!=''){
		$pic=$_FILES['kyc']['name'];
		$picname = str_replace(" ", "", $pic);
		$imagename=microtime().basename($picname);
		$imgname = str_replace(" ", "", $imagename);
		move_uploaded_file($_FILES['kyc']['tmp_name'], 'assets/cardnumbers_sellers/'.$imgname);
		}else{
			$imgname=$details['kyc'];
		}
			
		$update_data=array(
		'name'=>isset($name)?$name:'',
		'email_id'=>isset($email)?$email:'',
		'mobile'=>isset($mobile)?$mobile:'',
		'address'=>isset($address)?$address:'',
		//'bank_account'=>isset($account_number)?$account_number:'',
		//'bank_name'=>isset($bank_name)?$bank_name:'',
		//'ifsccode'=>isset($ifsc_code)?$ifsc_code:'',
		//'bank_holder_name'=>isset($bank_account_holder)?$bank_account_holder:'',
		//'kyc'=>isset($imgname)?$imgname:'',
		'updated_at'=>date('Y-m-d H:i:s'),
		);
		$update=$this->Cardnumber_model->update_seller_profile_details($s_id,$update_data);
		if(count($update)>0){
			$details=$this->Cardnumber_model->get_seller_details($s_id);
					$message = array('status'=>1,'s_id'=>$s_id,'details'=>$details,'kycpath'=>base_url('assets/cardnumbers_sellers/'),'imgpath'=>base_url('assets/adminprofilepic/'),'message'=>'Profile Details successfully updated');
					$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
				$message = array('status'=>0,'s_id'=>$s_id,'message'=>'Technical problem will occured. Please try again.');
				$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public  function uploadpic_post(){
		$s_id=$this->post('s_id');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if(count($_FILES)==0){
			$message = array('status'=>0,'message'=>'upload image is required');
			$this->response($message, REST_Controller::HTTP_OK);	
		}
		$pic=$_FILES['profile_pic']['name'];
		$picname = str_replace(" ", "", $pic);
		$imagename=microtime().basename($picname);
		$imgname = str_replace(" ", "", $imagename);
		if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], 'assets/adminprofilepic/'.$imgname)){
			$addimg=array(
			'profile_pic'=>$imgname,
			);
			$save_img=$this->Cardnumber_model->update_seller_profile_details($s_id,$addimg);
			
			if(count($save_img)>0){
					$details=$this->Cardnumber_model->get_seller_details($s_id);
					$message = array('status'=>1,'s_id'=>$s_id,'imgpath'=>base_url('assets/adminprofilepic/'.$details['profile_pic']),'message'=>'Image successfully updated');
					$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'Technical problem will occurred .Please try again');
				$this->response($message, REST_Controller::HTTP_OK);
			}
			
		}else{
			
			$message = array('status'=>0,'message'=>'Technical problem will occurred .Please try again');
				$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public  function cardnumbers_limit_post(){
		$s_id=$this->post('s_id');
		$amount=$this->post('amount');
		$razorpay_payment_id=$this->post('razorpay_payment_id');
		$razorpay_order_id=$this->post('razorpay_order_id');
		$razorpay_signature=$this->post('razorpay_signature');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($amount==''){
			$message = array('status'=>0,'message'=>'Amount is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($razorpay_payment_id==''){
			$message = array('status'=>0,'message'=>'Razorpay Payment Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}/*if($razorpay_order_id==''){
			$message = array('status'=>0,'message'=>'Razorpay Order Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($razorpay_signature==''){
			$message = array('status'=>0,'message'=>'Razorpay signature is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}*/
		
		$limit_count=$amount/10;
		$add=array(
		's_id'=>isset($s_id)?$s_id:'',
		'limit'=>isset($limit_count)?$limit_count:'',
		'amount'=>isset($amount)?$amount:'',
		'razorpay_payment_id'=>isset($razorpay_payment_id)?$razorpay_payment_id:'',
		'razorpay_order_id'=>isset($razorpay_order_id)?$razorpay_order_id:'',
		'razorpay_signature'=>isset($razorpay_signature)?$razorpay_signature:'',
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
		'created_by'=>isset($s_id)?$s_id:'',
		
		);
		//echo '<pre>';print_r($add);exit;
		$card_limit=$this->Cardnumber_model->save_seller_card_limit($add);
		if(count($card_limit)>0){
				$message = array('status'=>1,'s_id'=>$s_id,'message'=>'Seller card count successfully updated');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0, 's_id'=>$s_id,'message'=>'Technical problem will occurred .Please try again');
				$this->response($message, REST_Controller::HTTP_OK);
			}
	}
	public  function cardnumbers_assign_post(){
		$s_id=$this->post('s_id');
		$card_number=$this->post('card_number');
		$patient_name=$this->post('patient_name');
		$mobile_num=$this->post('mobile_num');
		$whatsapp_num=$this->post('whatsapp_num');
		$city=$this->post('city');
		$email_id=$this->post('email_id');
		$gender=$this->post('gender');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($card_number==''){
			$message = array('status'=>0,'message'=>'Card Number is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($patient_name==''){
			$message = array('status'=>0,'message'=>'Patient Name is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($mobile_num==''){
			$message = array('status'=>0,'message'=>'Mobile Number is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($whatsapp_num==''){
			$message = array('status'=>0,'message'=>'Whatsapp Number is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($city==''){
			$message = array('status'=>0,'message'=>'City is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($email_id==''){
			$message = array('status'=>0,'message'=>'Email Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($gender==''){
			$message = array('status'=>0,'message'=>'Gender is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		
		$check_mobile=$this->Cardnumber_model->mobile_number_exists($mobile_num);
		if(count($check_mobile)>0){
			$message = array('status'=>0,'message'=>'Mobile Number already exists. Please use another Mobile Number');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$six_digit_random_number = mt_rand(100000, 999999);
		
		$add=array(
		's_id'=>isset($s_id)?$s_id:'',
		'card_number'=>isset($card_number)?$card_number:'',
		'patient_name'=>isset($patient_name)?$patient_name:'',
		'mobile_num'=>isset($mobile_num)?$mobile_num:'',
		'whatsapp_num'=>isset($whatsapp_num)?$whatsapp_num:'',
		'city'=>isset($city)?$city:'',
		'email_id'=>isset($email_id)?$email_id:'',
		'gender'=>isset($gender)?$gender:'',
		'otp'=>isset($six_digit_random_number)?$six_digit_random_number:'',
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
		'created_by'=>isset($s_id)?$s_id:'',
		);
		$card_assign=$this->Cardnumber_model->save_card_number_details($add);
		if(count($card_assign)>0){
				/* opt*/
				
				$msg=$six_digit_random_number.' is your ehealthinfra verification code one-time use. Please DO NOT share this OTP with anyone to ensure account security';
				$username=$this->config->item('smsusername');
				$pass=$this->config->item('smspassword');
				$ch2 = curl_init();
				curl_setopt($ch2, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=Medsit&phone='.$mobile_num.'&text='.$msg.'&priority=ndnd&stype=normal');
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
				//echo '<pre>';print_r($ch);exit;
				$server_output = curl_exec ($ch2);
				curl_close ($ch2);
				//echo '<pre>';print_r($server_output);exit;
				/* opt*/
				$message = array('status'=>1,'card_assign_number'=>$card_assign,'s_id'=>$s_id,'message'=>'Card Number successfully added');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0, 's_id'=>$s_id,'message'=>'Technical problem will occurred .Please try again');
				$this->response($message, REST_Controller::HTTP_OK);
			}
	}
	
	public  function otp_verification_post(){
		$s_id=$this->post('s_id');
		$otp=$this->post('otp');
		$card_assign_number=$this->post('card_assign_number');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($otp==''){
			$message = array('status'=>0,'message'=>'OTP is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($card_assign_number==''){
			$message = array('status'=>0,'message'=>'Card Assign number is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$detail=$this->Cardnumber_model->get_opt_details($s_id,$card_assign_number);
		if(count($detail)>0){
			if($detail['otp']==$otp){
				$add=array(
					'mobile_verified'=>1,
					);
				$update=$this->Cardnumber_model->update_otp_verification($s_id,$card_assign_number,$add);
				if(count($update)>0){
					
					/*sms purpose */
				$username=$this->config->item('smsusername');
				$pass=$this->config->item('smspassword');
				$msg = "Greetings from Medspace, you have successfully registered for health card with Medspace. Avail offers on booking doctor appointments, ordering medicines, health checkups by using Medspace online appointment app.";
				$ch2 = curl_init();
				curl_setopt($ch2, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=Medsit&phone='.$detail['mobile_num'].'&text='.$msg.'&priority=ndnd&stype=normal');
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
				//echo '<pre>';print_r($ch);exit;
				$server_output = curl_exec ($ch2);
				curl_close ($ch2);
				/*sms purpose */
					$message = array('status'=>1,'card_assign_number'=>$card_assign_number,'s_id'=>$s_id,'message'=>'Card Number details successfully updated');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0, 's_id'=>$s_id,'message'=>'Technical problem will occurred .Please try again');
					$this->response($message, REST_Controller::HTTP_OK);
				}
				
			}else{
				$message = array('status'=>0, 's_id'=>$s_id,'message'=>'OTP is wrong.Please try again');
				$this->response($message, REST_Controller::HTTP_OK);
			}
			
		}else{
			$message = array('status'=>0, 's_id'=>$s_id,'message'=>'Card Assign number is wrong.Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		//echo '<pre>';print_r($detail);exit;
	}
	public  function resend_otp_post(){
		$s_id=$this->post('s_id');
		$card_assign_number=$this->post('card_assign_number');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($card_assign_number==''){
			$message = array('status'=>0,'message'=>'Card Assign number is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$detail=$this->Cardnumber_model->get_opt_details($s_id,$card_assign_number);
		if(count($detail)>0){
			
				$msg=$detail['otp'].' is your ehealthinfra verification code one-time use. Please DO NOT share this OTP with anyone to ensure account security';
				$username=$this->config->item('smsusername');
				$pass=$this->config->item('smspassword');
				//echo $url='http://bhashsms.com/api/sendmsg.php?user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$detail['mobile_num'].'&text='.$msg.'&priority=ndnd&stype=normal';
				//exit;
				$ch2 = curl_init();
				curl_setopt($ch2, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=Medsit&phone='.$detail['mobile_num'].'&text='.$msg.'&priority=ndnd&stype=normal');
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
				//echo '<pre>';print_r($ch2);exit;
				$server_output = curl_exec ($ch2);
				curl_close ($ch2);
				
				$message = array('status'=>1,'card_assign_number'=>$card_assign_number,'s_id'=>$s_id,'message'=>'Otp successfully sent to your  mobile number');
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0, 's_id'=>$s_id,'message'=>'Card Assign number is wrong.Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public  function card_details_post(){
		$s_id=$this->post('s_id');
		$card_assign_number=$this->post('card_assign_number');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($card_assign_number==''){
			$message = array('status'=>0,'message'=>'Card Assign number is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$detail=$this->Cardnumber_model->get_opt_details($s_id,$card_assign_number);
		if(count($detail)>0){
			$message = array('status'=>1,'details'=>$detail,'card_assign_number'=>$card_assign_number,'s_id'=>$s_id,'message'=>'Card details are found');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0, 's_id'=>$s_id,'message'=>'Card Assign number is wrong.Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	
	public  function card_number_generator_post(){
		$s_id=$this->post('s_id');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$Card_limit=$this->Cardnumber_model->get_seller_count_limit($s_id);
		$details=$this->Cardnumber_model->get_Card_number_count($s_id);
		$card_num=$this->Cardnumber_model->get_card_number();
		
		if($details['c_count']<=$Card_limit['total_limit']){
			if(count($card_num)>0){
				//$num=($card_num['card_number'])+1;
				$number=preg_replace("/[^0-9]/", "", $card_num['card_number']);
				$num=($number)+1;
				$message = array('status'=>1,'Cardnumber'=>$num,'s_id'=>$s_id,'message'=>'Card number successfully generated');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$num='450054021000';
				$message = array('status'=>1,'Cardnumber'=>$num,'s_id'=>$s_id,'message'=>'Card number successfully generated');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		}else{
			$message = array('status'=>0, 's_id'=>$s_id,'message'=>'your card limit is over.please recharge again.');
			$this->response($message, REST_Controller::HTTP_OK);	
		}
		//echo '<pre>';print_r($card_number);exit;
	}
	public  function card_limit_availability_post(){
		$s_id=$this->post('s_id');
		if($s_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$Card_limit=$this->Cardnumber_model->get_seller_count_limit($s_id);
		$details=$this->Cardnumber_model->get_Card_number_count($s_id);
		$message = array('status'=>0, 's_id'=>$s_id,'total'=>isset($Card_limit['total_limit'])?$Card_limit['total_limit']:'','availability'=>isset($Card_limit['total_limit'])?$Card_limit['total_limit']-$details['c_count']:'','used'=>isset($details['c_count'])?$details['c_count']:'','message'=>'Your card number limit Details.');
		$this->response($message, REST_Controller::HTTP_OK);	
		//echo '<pre>';print_r($Card_limit);exit;
	}
	

}
