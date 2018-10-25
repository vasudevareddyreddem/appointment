<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Users extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->library('zend');
		$this->load->model('Users_model');	
		
	}
	public function index()
	{	
			$data['city_list']=$this->Users_model->get_hospital_city_list();
			$data['hospital_list']=$this->Users_model->get_hospital_count_list();
			$data['doctors_list']=$this->Users_model->get_hospital_doctors_list();
			$data['clicnic_list']=$this->Users_model->get_clicnic_list_list();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/index',$data);
			$this->load->view('html/footer');
		
				
	}
	public  function search(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		if(isset($post['city']) && $post['city']!=''){
				$city_list=$this->Users_model->get_city_wise_hospital_list($post['city']);
				$hospital_list=$this->Users_model->get_hospital_list($post['city'],$post['search_value']);
				$department_list=$this->Users_model->get_hospital_department_list($post['city'],$post['search_value']);
				$total_merge=array_merge($hospital_list,$department_list,$city_list);
				if(isset($total_merge) && count($total_merge)>0){
					
					$pageNos = array();
					foreach($total_merge as $el) {
					   $pageno = $el['hos_id'];
					   if(!in_array($pageno, $pageNos))
					   {
							$deta=$this->Users_model->get_hospital_details($pageno);
							if($el['hos_id']!=''){
								$data[$el['hos_id']]=$el;
								$data[$el['hos_id']]['h_id']=$deta;
							}						  
							//echo $pageno ;
						   array_push($pageNos,$pageno);
					   }
					}
					
					$lis['hospital_lists']=$data;
				}else{
					$lis['hospital_lists']=array();
				}
				
		}else{
			$lis['hospital_lists']=array();
		}
		
			$lis['city_list']=$this->Users_model->get_hospital_city_list();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/search',$lis);
			$this->load->view('html/footer');
		//echo $this->db->last_query();
		//echo '<pre>';print_r($lis);exit;
		
	}
	public function login()
	{	if(!$this->session->userdata('app_user'))
		{
			$this->load->view('html/login');
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
	public function register()
	{	
		if(!$this->session->userdata('app_user'))
		{
			$this->load->view('html/register');
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
	public  function loginpost(){
		if(!$this->session->userdata('app_user'))
		{
			$post=$this->input->post();
			$check_login=$this->Users_model->check_login($post['email_id'],md5($post['password']));
			//echo $this->db->last_query();
			//echo '<pre>';print_r($post);
			//echo '<pre>';print_r($check_login);exit;
			if(count($check_login)>0){
				$login_details=$this->Users_model->get_login_user_details($check_login['a_u_id']);
				$this->session->set_userdata('app_user',$login_details);
				redirect('');
			}else{
				$this->session->set_flashdata('error',"Invalid Email Address or Password!");
				redirect('users/login');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
	public  function registerpost(){
		if(!$this->session->userdata('app_user'))
		{
			$post=$this->input->post();
			//echo '<pre>';print_r($post);
			$check_email=$this->Users_model->check_email_exits($post['email']);
			if(count($check_email)>0){
				$this->session->set_flashdata('error',"Email address already exists. Please another email address.");
				redirect('users/register');
			}
			$add=array(
			'name'=>isset($post['name'])?$post['name']:'',
			'email'=>isset($post['email'])?$post['email']:'',
			'mobile'=>isset($post['mobile'])?$post['mobile']:'',
			'password'=>isset($post['confirmpassword'])?md5($post['confirmpassword']):'',
			'org_password'=>isset($post['confirmpassword'])?$post['confirmpassword']:'',
			'status'=>1,
			'create_at'=>date('Y-m-d H:i:s'),
			);
			$save=$this->Users_model->save_appoinment_user($add);
			//exit;
			if(count($save)>0){
				$login_details=$this->Users_model->get_login_user_details($save);
				$this->session->set_userdata('app_user',$login_details);
				$this->session->set_flashdata('success','You have been successfully registered');
				redirect('profile');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
				redirect('users/register');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
	public function forgotpassword()
	{	
		if(!$this->session->userdata('app_user'))
		{
			$this->load->view('html/header');
			$this->load->view('html/forgotpassword');
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
	public function forgotpasswordpost(){
		$post=$this->input->post();
		$check_login=$this->Users_model->get_email_details_check($post['email']);
		if(count($check_login)>0){
			
					
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->to($check_login['email']);
				$this->email->from('customerservice@medspace.com', 'Medspace'); 
				$this->email->subject('Forgot Password'); 
				$body = "<b> Your Account login Password is </b> : ".$check_login['org_password'];
				$this->email->message($body);
				if ($this->email->send())
				{
					$this->session->set_flashdata('success',"Password sent to your registered email address. Please Check your registered email address");
					
				}else{
					$this->session->set_flashdata('error'," In Localhost mail  didn't sent");
					
				}
				redirect('users/login');
			}else{
				$this->session->set_flashdata('error',"Invalid email id. Please try again once");
				redirect('users/forgotpassword');
			}
		
		//echo "<pre>";print_r($post);exit;
		
	}
	
	
}
