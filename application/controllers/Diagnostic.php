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
			
			$log_details=$this->session->userdata('app_user');
			$cart_items=$this->Diagnostic_model->get_cart_package_item_list($log_details['a_u_id']);
			if(isset($cart_items) && count($cart_items)>0){
				foreach($cart_items as $list){
					$this->Diagnostic_model->delete_cart_items_data($list['c_id']);
				}
			}
			
			$data['city_list']=$this->Diagnostic_model->get_diagnostic_city_list();
			$data['packages_list']=$this->Diagnostic_model->get_packages_test_lists();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/diagnostic_tests',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
				
	}
	
	public  function profile(){
		if($this->session->userdata('app_user'))
		{	
			
			
			/* remove code */
			// $log_details=$this->session->userdata('app_user');
			// $cart_items=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
			// if(isset($cart_items)  && count($cart_items)>0){
				// foreach($cart_items as $list){
				  // $this->Diagnostic_model->delete_cart_items_data($list['c_id']);
				// }
			// }
			/* remove code */
			$log_details=$this->session->userdata('app_user');
			$l_id=base64_decode($this->uri->segment(3));
			$data['lab_id']=base64_decode($this->uri->segment(3));
			$data['lab_deatils']=$this->Diagnostic_model->get_diagnostic_lab_deatils($l_id);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/lab_profile',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
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
								$data[$el['a_id']]['test_names']=isset($t_n_lists)?$t_n_lists:'';
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
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
				
	}
	
	/* add to cart */
	public  function add_to_cart(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$cart_items=$this->Diagnostic_model->get_package_cart_item_list($log_details['a_u_id']);
			if(isset($cart_items)  && count($cart_items)>0){
				foreach($cart_items as $list){
				  $this->Diagnostic_model->delete_cart_items_data($list['c_id']);
				}
			}
			$post=$this->input->post();
			$detail=$this->Diagnostic_model->get_lab_test_details($post['test_id']);
			$add=array(
			'a_id'=>$log_details['a_u_id'],
			'test_id'=>isset($post['test_id'])?$post['test_id']:'',
			'l_id'=>isset($post['lab_id'])?$post['lab_id']:'',
			'test_duartion'=>isset($detail['test_duartion'])?$detail['test_duartion']:'',
			'delivery_charge'=>isset($detail['delivery_charge'])?$detail['delivery_charge']:'',
			'discount'=>isset($detail['discount'])?$detail['discount']:'',
			'amount'=>isset($detail['test_amount'])?$detail['test_amount']:'',
			'qty'=>isset($post['qty'])?$post['qty']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$log_details['a_u_id']
			);
			//echo '<pre>';print_r($add);exit;
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
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
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
	/* cart list */
	public  function cart(){
		if($this->session->userdata('app_user'))
		{
			$log_details=$this->session->userdata('app_user');
			$cart_details=$this->Diagnostic_model->get_cart_package_details_list($log_details['a_u_id']);
			if(count($cart_details)>0){
				foreach($cart_details as $list){
					$d_list[]=$list;
					
				}
			}else{
				$this->session->set_flashdata('error',"Cart having no items");
				redirect('diagnostic');
			}
			$data['cart_details']=$d_list;
			//echo $this->db2->last_query();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/cart',$data);
			$this->load->view('html/footer');
			//echo '<pre>';print_r($order_id);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
		
	}
	public  function addcart(){
		if($this->session->userdata('app_user'))
		{
			$log_details=$this->session->userdata('app_user');
			$package_id=base64_decode($this->uri->segment(3));
			if($package_id==''){
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('diagnostic');	
			}
			/* remove code */
			$log_details=$this->session->userdata('app_user');
			$cart_items=$this->Diagnostic_model->get_cart_item_list($log_details['a_u_id']);
			if(isset($cart_items)  && count($cart_items)>0){
				foreach($cart_items as $list){
				  $this->Diagnostic_model->delete_cart_items_data($list['c_id']);
				}
			}
			/* remove code */
			$item_details=$this->Diagnostic_model->get_package_details_list($package_id);
			$add=array(
			'a_id'=>$log_details['a_u_id'],
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
			'created_by'=>$log_details['a_u_id']
			);
			//echo '<pre>';print_r($add);exit;
			$check=$this->Diagnostic_model->check_package_exist($log_details['a_u_id'],$package_id);
			if(count($check)>0){
				$save=array(1);
			}else{
				$save=$this->Diagnostic_model->save_item_cart($add);
			}
			if(count($save)>0){
				$this->session->set_flashdata('success',"item successfully added to cart");
				redirect('diagnostic/cart');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
				redirect('diagnostic');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
		
	}
	public  function removecartitem(){
		if($this->session->userdata('app_user'))
		{
			$log_details=$this->session->userdata('app_user');
			$c_id=base64_decode($this->uri->segment(3));
			
			$remove=$this->Diagnostic_model->removecart_item_details($log_details['a_u_id'],$c_id);
			if(count($remove)>0){
				$this->session->set_flashdata('success',"Cart item successfully removed");
				redirect('diagnostic/cart/');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
				redirect('diagnostic/cart/');
			}
			
			//echo '<pre>';print_r($order_id);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
		
	}
	/*  check out */
	public  function patient_details(){
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$patient_deetails_id=base64_decode($this->uri->segment(3));
			//echo '<pre>';print_r($data);exit;
			if(isset($patient_deetails_id) && $patient_deetails_id!=''){
				$data['patient_details']=$this->Diagnostic_model->get_current_patient_details($patient_deetails_id);
			}else{
				$data['patient_details']=$this->Diagnostic_model->get_user_details($log_details['a_u_id']);
			}
			$data['cart_details']=$this->Diagnostic_model->get_cart_package_details_list($log_details['a_u_id']);

			//echo '<pre>';print_r($data);exit;
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
			if(isset($post['l_t_a_id']) && $post['l_t_a_id']!=''){
				 $save=$this->Diagnostic_model->update_patient_details($post['l_t_a_id'],$add);
			}else{
		 	  $save=$this->Diagnostic_model->save_patient_details($add);
			}
			if(count($save)>0){
				$this->session->set_flashdata('success',"Patient details successfully updated");
				if(isset($post['l_t_a_id']) && $post['l_t_a_id']!=''){
				  redirect('diagnostic/billing/'.(base64_encode($post['l_t_a_id'])));
				}else{
					redirect('diagnostic/billing/'.(base64_encode($save)));
				}
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again.");
				redirect('diagnostic/patient_details/');
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
			$data['patient_details_id'] =base64_decode($this->uri->segment(3));
			$data['cart_details']=$this->Diagnostic_model->get_cart_package_details_list($log_details['a_u_id']);
			$data['billing_details']=$this->Diagnostic_model->get_billing_address_list($log_details['a_u_id']);
			//echo '<pre>';print_r($data);exit;
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
			if(isset($post['billingaddressid']) && $post['billingaddressid']!=''){
				$save=array($post['billingaddressid']);
			}else{
				$save=$this->Diagnostic_model->save_patient_billing($add);
			}
			if(count($save)>0){
				$this->session->set_flashdata('success',"Patient details successfully updated");
				if(isset($post['billingaddressid']) && $post['billingaddressid']!=''){
					redirect('diagnostic/payment/'.base64_encode($post['billingaddressid']).'/'.base64_encode($post['patient_details_id']));
				}else{
				    redirect('diagnostic/payment/'.base64_encode($save).'/'.base64_encode($post['patient_details_id']));
				}
			
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again.");
				redirect('diagnostic/billing/'.base64_encode($post['patient_details_id']));
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
			$data['patient_details_id']=base64_decode($this->uri->segment(4));
			$data['cart_details']=$this->Diagnostic_model->get_cart_package_details_list($log_details['a_u_id']);

			//echo '<pre>';print_r($data);exit;
			$data['cart_item_details']=$this->Diagnostic_model->get_cart_package_details_list($log_details['a_u_id']);
			$patient_details=$this->Diagnostic_model->get_patient_details($log_details['a_u_id']);
			$billing_details=$this->Diagnostic_model->get_patient_billing_details(base64_decode($this->uri->segment(3)),$log_details['a_u_id']);
			if(isset($data['cart_item_details']) && count($data['cart_item_details'])>0){
				$total='';$delivery_charge='';
				foreach($data['cart_item_details'] as $li){
								$total +=$li['amount'];
								$delivery_charge +=$li['delivery_charge'];
				}
				$overall_amount=(($total)+($delivery_charge));
			}
			//echo $this->db->last_query();
			//echo '<pre>';print_r($data);exit;
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
			//echo '<pre>';print_r($post);exit;
			$add=array(
			'a_id'=>$log_details['a_u_id'],
			'payment_type'=>isset($post['payment'])?$post['payment']:'',
			'patient_details_id'=>isset($post['patient_details_id'])?$post['patient_details_id']:'',
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
				//echo '<pre>';print_r($cart_items);exit;
				/* saving  purpose*/
				foreach($cart_items as $list){
					$item_data=array(
					'order_id'=>$order_save,
					'a_id'=>$log_details['a_u_id'],
					'package_id'=>isset($list['package_id'])?$list['package_id']:'',
					'test_id'=>isset($list['test_id'])?$list['test_id']:'',
					'l_id'=>isset($list['l_id'])?$list['l_id']:'',
					'delivery_charge'=>isset($list['delivery_charge'])?$list['delivery_charge']:'',
					'percentage'=>isset($list['percentage'])?$list['percentage']:'',
					'total_amt'=>(($list['delivery_charge'])+($list['amount'])),
					'amount'=>isset($list['amount'])?$list['amount']:'',
					'org_amount'=>isset($list['org_amount'])?$list['org_amount']:'',
					'percentage'=>isset($list['percentage'])?$list['percentage']:'',
					'payment_type'=>isset($list[''])?$list['']:'',
					'created_by'=>$log_details['a_u_id'],
					);
					
					$this->Diagnostic_model->save_order_items($item_data);
				}
				/* saving  purpose*/
				/* deleteing  purpose*/
				foreach($cart_items as $list){
					$this->Diagnostic_model->delete_cart_items_data($list['c_id']);
				}
				/* deleteing  purpose*/
				$this->session->set_flashdata('success',"Your payment successfully completed.");

				redirect('diagnostic/success/'.base64_encode($order_save));
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");

				redirect('diagnostic/orderpaymenttype');
			}
			//echo '<pre>';print_r($post);exit;
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	/* payment success*/
	public  function success(){
		if($this->session->userdata('app_user'))
		{
			$order_id=base64_decode($this->uri->segment(3));
			$data['address_detail']=$this->Diagnostic_model->get_order_billing_address($order_id);
			$data['patient_detail']=$this->Diagnostic_model->get_order_patient_detail($order_id);
			$data['test_detail']=$this->Diagnostic_model->get_order_test_detail($order_id);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/confirmation',$data);
			$this->load->view('html/footer');
			//echo '<pre>';print_r($order_id);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	
	/* order list */
	public  function orders(){
		if($this->session->userdata('app_user'))
		{
			$log_details=$this->session->userdata('app_user');
			$data['order_list']=$this->Diagnostic_model->get_customer_order_list($log_details['a_u_id']);
			//g104
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/order_list',$data);
			$this->load->view('html/footer');
			//echo '<pre>';print_r($order_id);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
		
	}
	
	
	
}
