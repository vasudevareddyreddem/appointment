<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
require_once ('razorpay-php/Razorpay.php');
use Razorpay\Api\Api as RazorpayApi;
class Diagnostic extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Diagnostic_model');
		$this->db2 = $this->load->database('another', TRUE);
		
	}
	public function index()
	{	
		if($this->session->userdata('app_user'))
		{	
			$data['city_list']=$this->Diagnostic_model->get_diagnostic_city_list();
			$data['packages_list']=$this->Diagnostic_model->get_packages_test_lists();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/diagnostic_tests',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
				
	}
	
	public  function profile(){
		if($this->session->userdata('app_user'))
		{	
			$l_id=base64_decode($this->uri->segment(3));
			$data['lab_id']=base64_decode($this->uri->segment(3));
			$data['lab_deatils']=$this->Diagnostic_model->get_diagnostic_lab_deatils($l_id);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/lab_profile',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	public function search()
	{	
		if($this->session->userdata('app_user'))
		{	
			$post=$this->input->post();
			$details['city_list']=$this->Diagnostic_model->get_diagnostic_city_list();
			//echo '<pre>';print_r($post);
			if($post['city']!='' && $post['search_value']!=''){
				$lab_list=$this->Diagnostic_model->get_loication_and_lab_wise_lab_list($post['city'],$post['search_value']);
				$test_list=$this->Diagnostic_model->get_loication_and_lab_wise_testy_list($post['city'],$post['search_value']);
				$all_data=array_merge($lab_list,$test_list);
			}else if($post['city']!='' && $post['search_value']==''){
				$lab_list=$this->Diagnostic_model->get_all_loication_wise_lab_list($post['city']);
				$test_list=$this->Diagnostic_model->get_all_test_names_list($post['city']);
				$all_data=array_merge($lab_list,$test_list);
			}else if($post['city']=='' && $post['search_value']!=''){
				$lab_list=$this->Diagnostic_model->get_lab_name_list($post['search_value']);
				$test_list=$this->Diagnostic_model->get_test_name_list($post['search_value']);
				$all_data=array_merge($lab_list,$test_list);
			}
			if(isset($all_data) && count($all_data)>0){
					
					$pageNos = array();
					foreach($all_data as $el) {
						//echo '<pre>';print_r($el);
					   $pageno = $el['a_id'];
					   if(!in_array($pageno, $pageNos))
					   {
							$deta=$this->Diagnostic_model->get_lab_test_lists($pageno);
							if(count($deta)>0){
								$dd='';
								foreach($deta as $li){
									$dd[]=$li['test_name'];
								}
								$t_n_lists=implode(", ",$dd);
							}
							if($el['a_id']!=''){
								$data[$el['a_id']]=$el;
								$data[$el['a_id']]['test_names']=$t_n_lists;
							}
							//echo '<pre>';print_r($el);exit;							
							//echo $pageno ;
						   array_push($pageNos,$pageno);
					   }
					}
					
					$details['labs_lists']=$data;
				}else{
					$details['labs_lists']=array();
				}
			//echo '<pre>';print_r($lis);exit;
			$this->load->view('digonstic/tests_search',$details);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
				
	}
	
	/* add to cart */
	public  function add_to_cart(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			//echo '<pre>';print_r($log_details);exit;
			$post=$this->input->post();
			$add=array(
			'a_id'=>$log_details['a_u_id'],
			'test_id'=>isset($post['test_id'])?$post['test_id']:'',
			'l_id'=>isset($post['lab_id'])?$post['lab_id']:'',
			'qty'=>isset($post['qty'])?$post['qty']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$log_details['a_u_id']
			);
			$check=$this->Diagnostic_model->check_item_exits($log_details['a_u_id'],$post['test_id'],$post['lab_id']);
			if(count($check)>0){
					$details=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
					$data['msg']=1;
					$data['list']=$details;
			}else{
				$save=$this->Diagnostic_model->save_item_cart($add);
				if(count($save)>0){
					$details=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
					$data['msg']=1;
					$data['list']=$details;
				}else{
					$data['msg']=0;
					$data['list']='';
				}
			}
			$data['lab_id']=isset($post['lab_id'])?$post['lab_id']:'';
			$this->session->set_flashdata('success',"Test successfully added to cart");
			$this->load->view('digonstic/cartpage',$data);
			exit;
			//echo '<pre>';print_r($post);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	
	public  function get_cart_list(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$details=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
			if(count($details)>0){
				$data['msg']=1;
				$data['list']=$details;
			}else{
				$data['msg']=0;
				$data['list']=array();
			}
			$lab_id=$this->Diagnostic_model->get_customer_last_lab_id($log_details['a_u_id']);
			if(count($lab_id)>0){
				$data['lab_id']=$lab_id['l_id'];
			}else{
				$data['lab_id']='';
			}
			
			
			$this->load->view('digonstic/cartpage',$data);
			exit;
			//echo '<pre>';print_r($post);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	
	public  function remove_cart_item_id(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$post=$this->input->post();
			$delete=$this->Diagnostic_model->removecart_item_details($log_details['a_u_id'],$post['c_id']);
			if(count($delete)>0){
				$details=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
				$data['msg']=1;
				$data['list']=$details;
			}else{
				$data['msg']=0;
				$data['list']=array();
			}
			
			$this->load->view('digonstic/cartpage',$data);
			exit;
			//echo '<pre>';print_r($post);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	/* add to cart */
	/*  check out */
	public  function patient_details(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$data['lab_id']=base64_decode($this->uri->segment(3));
			$data['cart_item_details']=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
			$this->load->view('digonstic/patient_details',$data);
			$this->load->view('html/footer');
			//echo '<pre>';print_r($log_details);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	public  function patient_details_post(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			$add=array(
			'a_id'=>$log_details['a_u_id'],
			'time'=>isset($post['time'])?$post['time']:'',
			'date'=>isset($post['date'])?$post['date']:'',
			'name'=>isset($post['name'])?$post['name']:'',
			'mobile'=>isset($post['mobile'])?$post['mobile']:'',
			'age'=>isset($post['age'])?$post['age']:'',
			'email'=>isset($post['email'])?$post['email']:'',
			'gender'=>isset($post['gender'])?$post['gender']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$log_details['a_u_id']
			);
			$save=$this->Diagnostic_model->save_patient_details($add);
			if(count($save)>0){
				$this->session->set_flashdata('success',"Patient details successfully updated");
				redirect('diagnostic/billing/'.base64_encode($save));
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again.");
				redirect('diagnostic/patient_details/'.base64_encode($post['lab_id']));
			}
			//echo '<pre>';print_r($post);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	public  function billing(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$data['lab_id']=base64_decode($this->uri->segment(3));
			$data['cart_item_details']=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
			$this->load->view('digonstic/billing',$data);
			$this->load->view('html/footer');
			//echo '<pre>';print_r($log_details);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	public  function billingpost(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			$add=array(
			'a_id'=>$log_details['a_u_id'],
			'mobile'=>isset($post['mobile'])?$post['mobile']:'',
			'locality'=>isset($post['locality'])?$post['locality']:'',
			'pincode'=>isset($post['pincode'])?$post['pincode']:'',
			'address'=>isset($post['address'])?$post['address']:'',
			'landmark'=>isset($post['landmark'])?$post['landmark']:'',
			'address_lable'=>isset($post['address_lable'])?$post['address_lable']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$log_details['a_u_id']
			);
			$save=$this->Diagnostic_model->save_patient_billing($add);
			if(count($save)>0){
				$this->session->set_flashdata('success',"Patient details successfully updated");
				redirect('diagnostic/payment/'.base64_encode($save));
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again.");
				redirect('diagnostic/billing/'.base64_encode($post['lab_id']));
			}
			//echo '<pre>';print_r($post);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	public  function payment(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$post=$this->input->post();
			$data['billing_id']=base64_decode($this->uri->segment(3));
			$data['cart_item_details']=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
			$patient_details=$this->Diagnostic_model->get_patient_details($log_details['a_u_id']);
			$billing_details=$this->Diagnostic_model->get_patient_billing_details(base64_decode($this->uri->segment(3)),$log_details['a_u_id']);
			if(isset($data['cart_item_details']) && count($data['cart_item_details'])>0){
				$total='';$delivery_charge='';
				foreach($data['cart_item_details'] as $li){
								$total +=$li['test_amount'];
								$delivery_charge +=$li['delivery_charge'];
				}
				$overall_amount=(($total)+($delivery_charge));
			}
			//echo $this->db->last_query();
			//echo '<pre>';print_r($post);exit;
			$log_details=$this->session->userdata('app_user');
			$api_id= $this->config->item('keyId');
			$api_Secret= $this->config->item('API_keySecret');
			$api = new RazorpayApi($api_id,$api_Secret);
				$orderData = [
						'receipt'         => $log_details['a_u_id'],
						'amount'          => $overall_amount * 100, // 2000 rupees in paise
						'currency'        => 'INR',
						'payment_capture' => 1 // auto capture
				];

						$razorpayOrder = $api->order->create($orderData);
						$razorpayOrderId = $razorpayOrder['id'];
						$displayAmount = $amount = $orderData['amount'];
						$displayCurrency=$orderData['currency'];
						$data['details'] = [
							"key"               => $api_id,
							"amount"            => $amount,
							"name"              => $patient_details['name'],
							"description"       => "lab test purchase",
							"image"             => "",
							"prefill"           => [
							"name"              => $patient_details['name'],
							"email"             => $patient_details['email'],
							"contact"           => $patient_details['mobile'],
							],
							"notes"             => [
							"address"           => $billing_details['address'],
							"merchant_order_id" => $log_details['a_u_id'],
							],
							"theme"             => [
							"color"             => "#F37254"
							],
							"order_id"          => $razorpayOrderId,
							"display_currency"          => $orderData['currency'],
						];
			$data['patient_details_id']=$patient_details['l_t_a_id'];
			$this->load->view('digonstic/payment',$data);
			$this->load->view('html/footer');
			//echo '<pre>';print_r($log_details);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	/*  check out */
	/* payment success*/
	public  function orderpaymenttype(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$post=$this->input->post();
			$add=array(
			'a_id'=>$log_details['a_u_id'],
			'payment_type'=>isset($post['payment'])?$post['payment']:'',
			'billing_id'=>isset($post['billing_id'])?$post['billing_id']:'',
			'razorpay_payment_id'=>isset($post['razorpay_payment_id'])?$post['razorpay_payment_id']:'',
			'razorpay_order_id'=>isset($post['razorpay_order_id'])?$post['razorpay_order_id']:'',
			'razorpay_signature'=>isset($post['razorpay_signature'])?$post['razorpay_signature']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$log_details['a_u_id'],
			);
			$order_save=$this->Diagnostic_model->save_orders($add);
			if(count($order_save)>0){
				$cart_items=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
				foreach($cart_items as $list){
					
					$item_data=array(
					''
					
					);
					
				}
				
			}else{
				
			}
			echo '<pre>';print_r($post);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	/* payment success*/
	
	
}
