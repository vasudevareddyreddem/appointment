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
		$check=$this->Diagnosticapp_model->lab_exists_ornot($a_id);
		if(count($check)>0){
			$test_list=$this->Diagnosticapp_model->get_lab_details_with_test_list($a_id);
			//echo '<pre>';print_r($test_list);exit;
			
			if(isset($test_list) && count($test_list)>0){
				$message = array('status'=>1,'details'=>$test_list,'message'=>'Test details are found.');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'Test details are not found.');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		}else{
			$message = array('status'=>0,'message'=>'Invalid lab id. Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public  function package_addtocart_post(){
		$package_id=$this->post('l_t_p_id');
		$a_u_id=$this->post('a_u_id');
		if($a_u_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($package_id==''){
			$message = array('status'=>0,'message'=>'Package Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$cart_items=$this->Diagnosticapp_model->get_cart_item_list($a_u_id);
			if(isset($cart_items)  && count($cart_items)>0){
				foreach($cart_items as $list){
				  $this->Diagnosticapp_model->delete_cart_items_data($list['c_id']);
				}
			}
		 $item_details=$this->Diagnosticapp_model->get_package_details_list($package_id);
			$add=array(
			'a_id'=>$a_u_id,
			'package_id'=>isset($package_id)?$package_id:'',
			'l_id'=>isset($item_details['lab_id'])?$item_details['lab_id']:'',
			'delivery_charge'=>isset($item_details['delivery_charge'])?$item_details['delivery_charge']:'',
			'amount'=>isset($item_details['amount'])?$item_details['amount']-$item_details['discount']:'',
			'org_amount'=>isset($item_details['amount'])?$item_details['amount']:'',
			'discount'=>isset($item_details['discount'])?$item_details['discount']:'',
			'percentage'=>isset($item_details['percentage'])?$item_details['percentage']:'',
			//'package_id'=>isset($cart_details['l_t_p_id'])?$cart_details['l_t_p_id']:'',
			'qty'=>1,
			'type'=>0,
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$a_u_id
			);
			$check=$this->Diagnosticapp_model->check_package_exist($a_u_id,$package_id);
			if(count($check)>0){
				$message = array('status'=>0,'message'=>'Package already added to cart.');
			    $this->response($message, REST_Controller::HTTP_OK);
			}else{
				$save=$this->Diagnosticapp_model->save_item_cart($add);
				if(count($save)>0){
						$message = array('status'=>1,'cart_id'=>$save,'message'=>'Package successfully added to cart.');
						$this->response($message, REST_Controller::HTTP_OK);
				}else{
					    $message = array('status'=>0,'message'=>'Technical problem will occurred. Please try again once');
						$this->response($message, REST_Controller::HTTP_OK);
				}
			}
			
	}
	public  function test_addtocart_post(){
		$a_u_id=$this->post('a_u_id');
		$test_id=$this->post('l_id');
		if($a_u_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($test_id==''){
			$message = array('status'=>0,'message'=>'Test Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$cart_items=$this->Diagnosticapp_model->get_package_cart_item_list($a_u_id);
			if(isset($cart_items)  && count($cart_items)>0){
				foreach($cart_items as $list){
				  $this->Diagnosticapp_model->delete_cart_items_data($list['c_id']);
				}
			}
		$detail=$this->Diagnosticapp_model->get_lab_test_details($test_id);
		$add=array(
			'a_id'=>$a_u_id,
			'test_id'=>isset($test_id)?$test_id:'',
			'l_id'=>isset($detail['lab_id'])?$detail['lab_id']:'',
			'test_duartion'=>isset($detail['test_duartion'])?$detail['test_duartion']:'',
			'delivery_charge'=>isset($detail['delivery_charge'])?$detail['delivery_charge']:'',
			'discount'=>isset($detail['discount'])?$detail['discount']:'',
			'amount'=>isset($detail['test_amount'])?$detail['test_amount']:'',
			'qty'=>1,
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$a_u_id
			);
		$check=$this->Diagnosticapp_model->check_item_exits($a_u_id,$test_id,$detail['lab_id']);
		if(count($check)>0){
				$message = array('status'=>0,'message'=>'Test already added to cart.');
			    $this->response($message, REST_Controller::HTTP_OK);
			}else{
				$save=$this->Diagnosticapp_model->save_item_cart($add);
				if(count($save)>0){
						$message = array('status'=>1,'cart_id'=>$save,'message'=>'Test successfully added to cart.');
						$this->response($message, REST_Controller::HTTP_OK);
				}else{
					    $message = array('status'=>0,'message'=>'Technical problem will occurred. Please try again once');
						$this->response($message, REST_Controller::HTTP_OK);
				}
			}

	}
	public  function cart_post(){
		$a_u_id=$this->post('a_u_id');
		if($a_u_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$cart_details=$this->Diagnosticapp_model->get_cart_package_details_list($a_u_id);
			if(count($cart_details)>0){
				foreach($cart_details as $list){
					$d_list[]=$list;
			}
		}else{
				$d_list=array();
		}
		if(isset($d_list) && count($d_list)>0){
			$message = array('status'=>1,'list'=>$d_list,'message'=>'Cart item list.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			 $message = array('status'=>0,'message'=>'Cart having no items');
			$this->response($message, REST_Controller::HTTP_OK);
		}
			//echo '<pre>';print_r($d_list);exit;
	}
	public  function remove_cartitem_post(){
		$a_u_id=$this->post('a_u_id');
		$cart_id=$this->post('c_id');
		if($a_u_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if($cart_id==''){
			$message = array('status'=>0,'message'=>'Cart Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$check=$this->Diagnosticapp_model->check_cart_item_exists_orbot($a_u_id,$cart_id);
		if(count($check)>0){
			$delete=$this->Diagnosticapp_model->removecart_item_details($a_u_id,$cart_id);
			if(count($delete)>0){
				$message = array('status'=>1,'message'=>'Cart item successfully removed.');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'Technical problem will occurred. Please try again once');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		}else{
			$message = array('status'=>0,'message'=>'Invalid cart id or user id. Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		
	}
	public  function patientdetails_post(){
		$a_u_id=$this->post('a_u_id');
		$time=$this->post('time');
		$date=$this->post('date');
		$name=$this->post('name');
		$mobile=$this->post('mobile');
		$age=$this->post('age');
		$email=$this->post('email');
		$gender=$this->post('gender');
		if($a_u_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if($time==''){
			$message = array('status'=>0,'message'=>'Time is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if($date==''){
			$message = array('status'=>0,'message'=>'Date is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($name==''){
			$message = array('status'=>0,'message'=>'Name is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($mobile==''){
			$message = array('status'=>0,'message'=>'Mobile is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($age==''){
			$message = array('status'=>0,'message'=>'Age is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($email==''){
			$message = array('status'=>0,'message'=>'Email id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}if($gender==''){
			$message = array('status'=>0,'message'=>'Gender is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) 
		{
			$message = array('status'=>0,'message'=>'Date formate not correct. example:1992-07-14');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$add=array(
			'a_id'=>$a_u_id,
			'time'=>isset($time)?$time:'',
			'date'=>isset($date)?$date:'',
			'name'=>isset($name)?$name:'',
			'mobile'=>isset($mobile)?$mobile:'',
			'age'=>isset($age)?$age:'',
			'email'=>isset($email)?$email:'',
			'gender'=>isset($gender)?$gender:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$a_u_id
			);
		$save=$this->Diagnosticapp_model->save_patient_details($add);
		if(count($save)>0){
				$message = array('status'=>1,'patient_details_id'=>$save,'message'=>'Patient details successfully added');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'Technical problem will occurred. Please try again once');
				$this->response($message, REST_Controller::HTTP_OK);
			}
			//echo '<pre>';print_r($add);exit;
	}
	public  function address_list_post(){
		$a_u_id=$this->post('a_u_id');
		if($a_u_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$billing_list=$this->Diagnosticapp_model->get_billing_address_list($a_u_id);
		if(count($billing_list)>0){
				$message = array('status'=>1,'list'=>$billing_list,'message'=>'User billing address details are found');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'User having no billing address');
				$this->response($message, REST_Controller::HTTP_OK);
			}
	}
	public  function billing_address_post(){
		$a_u_id=$this->post('a_u_id');
		$mobile=$this->post('mobile');
		$locality=$this->post('locality');
		$address=$this->post('address');
		$pincode=$this->post('pincode');
		$landmark=$this->post('landmark');
		$address_lable=$this->post('address_lable');
			if($a_u_id==''){
				$message = array('status'=>0,'message'=>'User Id is required');
				$this->response($message, REST_Controller::HTTP_OK);
			}
			if($mobile==''){
			   $message = array('status'=>0,'message'=>'Mobile number Id is required');
			   $this->response($message, REST_Controller::HTTP_OK);
			}
			if($locality==''){
			   $message = array('status'=>0,'message'=>'Locality is required');
			  $this->response($message, REST_Controller::HTTP_OK);
			}
			if($address==''){
			   $message = array('status'=>0,'message'=>'Address is required');
			   $this->response($message, REST_Controller::HTTP_OK);
			}
			if($pincode==''){
					$message = array('status'=>0,'message'=>'Pincode is required');
					$this->response($message, REST_Controller::HTTP_OK);
			}
			if($landmark==''){
				$message = array('status'=>0,'message'=>'Landmark is required');
				$this->response($message, REST_Controller::HTTP_OK);
			}
			if($address_lable==''){
			  $message = array('status'=>0,'message'=>'Address  Label is required');
			  $this->response($message, REST_Controller::HTTP_OK);
			}
		
		$add=array(
			'a_id'=>$a_u_id,
			'mobile'=>isset($mobile)?$mobile:'',
			'locality'=>isset($locality)?$locality:'',
			'pincode'=>isset($pincode)?$pincode:'',
			'address'=>isset($address)?$address:'',
			'landmark'=>isset($landmark)?$landmark:'',
			'address_lable'=>isset($address_lable)?$address_lable:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$a_u_id
			);
		$save=$this->Diagnosticapp_model->save_patient_billing($add);
		if(count($save)>0){
				$message = array('status'=>1,'billing_id'=>$save,'message'=>'Patient billing details successfully added');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'Technical problem will occurred. Please try again once');
				$this->response($message, REST_Controller::HTTP_OK);
			}
	}
	public function paymentdetails_post(){
		$a_u_id=$this->post('a_u_id');
		if($a_u_id==''){
				$message = array('status'=>0,'message'=>'User Id is required');
				$this->response($message, REST_Controller::HTTP_OK);
			}
			$cart_item_details=$this->Diagnosticapp_model->get_cart_package_details_list($a_u_id);
			//echo '<pre>';print_r();exit;
			if(isset($cart_item_details) && count($cart_item_details)>0){
				$total='';$delivery_charge='';
				foreach($cart_item_details as $li){
								$total +=$li['amount'];
								$delivery_charge +=$li['delivery_charge'];
				}
				$overall_amount=(($total)+($delivery_charge));
			}
			
			$message = array('status'=>1,'amouont'=>$total,'pickup_charges'=>$delivery_charge,'totalamount'=>$overall_amount,'message'=>'Amount details are found');
			$this->response($message, REST_Controller::HTTP_OK);
	}
	public  function payment_post(){
		
		$a_u_id=$this->post('a_u_id');
		$payment_type=$this->post('payment_type');
		$patient_details_id=$this->post('patient_details_id');
		$billing_id=$this->post('billing_id');
		$razorpay_payment_id=$this->post('razorpay_payment_id');
		$razorpay_order_id=$this->post('razorpay_order_id');
		$razorpay_signature=$this->post('razorpay_signature');
		if($a_u_id==''){
				$message = array('status'=>0,'message'=>'User Id is required');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		if($payment_type==''){
			$message = array('status'=>0,'message'=>'Payment Type is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if($patient_details_id==''){
			$message = array('status'=>0,'message'=>'Patient details id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if($billing_id==''){
			$message = array('status'=>0,'message'=>'Patient billing id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$add=array(
			'a_id'=>$a_u_id,
			'payment_type'=>isset($payment_type)?$payment_type:'',
			'patient_details_id'=>isset($patient_details_id)?$patient_details_id:'',
			'billing_id'=>isset($billing_id)?$billing_id:'',
			'razorpay_payment_id'=>isset($razorpay_payment_id)?$razorpay_payment_id:'',
			'razorpay_order_id'=>isset($razorpay_order_id)?$razorpay_order_id:'',
			'razorpay_signature'=>isset($razorpay_signature)?$razorpay_signature:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$a_u_id,
			);
			$order_save=$this->Diagnosticapp_model->save_orders($add);
			if(count($order_save)>0){
				$cart_items=$this->Diagnosticapp_model->get_cart_item_list($a_u_id);
				//echo '<pre>';print_r($cart_items);exit;
				/* saving  purpose*/
				foreach($cart_items as $list){
					$item_data=array(
					'order_id'=>$order_save,
					'a_id'=>$a_u_id,
					'package_id'=>isset($list['package_id'])?$list['package_id']:'',
					'test_id'=>isset($list['test_id'])?$list['test_id']:'',
					'l_id'=>isset($list['l_id'])?$list['l_id']:'',
					'delivery_charge'=>isset($list['delivery_charge'])?$list['delivery_charge']:'',
					'percentage'=>isset($list['percentage'])?$list['percentage']:'',
					'total_amt'=>(($list['delivery_charge'])+($list['amount'])),
					'amount'=>isset($list['amount'])?$list['amount']:'',
					'org_amount'=>isset($list['org_amount'])?$list['org_amount']:'',
					'percentage'=>isset($list['percentage'])?$list['percentage']:'',
					'payment_type'=>isset($payment_type)?$payment_type:'',
					'created_by'=>$a_u_id,
					);
					
					$this->Diagnosticapp_model->save_order_items($item_data);
				}
				/* saving  purpose*/
				/* deleteing  purpose*/
				foreach($cart_items as $list){
					$this->Diagnosticapp_model->delete_cart_items_data($list['c_id']);
				}
				/* deleteing  purpose*/
			 $message = array('status'=>1,'order_id'=>$order_save,'message'=>'Your payment successfully completed');
			 $this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'Technical problem will occurred. Please try again once');
				$this->response($message, REST_Controller::HTTP_OK);
			}
	}
	public function success_post(){
		$a_u_id=$this->post('a_u_id');
		$order_id=$this->post('order_id');
		if($a_u_id==''){
				$message = array('status'=>0,'message'=>'User Id is required');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		if($order_id==''){
			$message = array('status'=>0,'message'=>'Order id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$address_detail=$this->Diagnosticapp_model->get_order_billing_address($order_id);
		$patient_detail=$this->Diagnosticapp_model->get_order_patient_detail($order_id);
		$test_detail=$this->Diagnosticapp_model->get_order_test_detail($order_id);
		if(count($address_detail)>0){
			$address=$address_detail;
		}else{
			$address='';
		}
		if(count($test_detail)>0){
			$test=$test_detail;
		}else{
			$test='';
		}if(count($patient_detail)>0){
			$patient=$patient_detail;
		}else{
			$patient='';
		}
		 $message = array('status'=>1,'order_id'=>$order_id,'address_details'=>$address,'test_details'=>$test,'patient_details'=>$patient,'message'=>'Order details information');
		 $this->response($message, REST_Controller::HTTP_OK);
	}
	
	public  function orders_list_post(){
		$a_u_id=$this->post('a_u_id');
		if($a_u_id==''){
				$message = array('status'=>0,'message'=>'User Id is required');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		$order_list=$this->Diagnosticapp_model->get_customer_order_list($a_u_id);
		if(count($order_list)>0){
			 $message = array('status'=>1,'list'=>$order_list,'message'=>'Order list are found');
			 $this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'User having no orders');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		
	}
	

}
