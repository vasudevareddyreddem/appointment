<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Job extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Jobs_model');
		
	}
	public function index()
	{	
		$this->load->view('html/reg-post');
		$this->load->view('html/footer');
	}
	public function lists()
	{	
		$type=base64_decode($this->uri->segment(3));
		$data['jobs_list']=$this->Jobs_model->get_all_active_joblist($type);
		$data['jobs_category']=$this->Jobs_model->get_all_jobs_category_joblist();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/joblist',$data);
		$this->load->view('html/footer');
	}
	public  function apply(){
		if($this->session->userdata('app_user'))
		{
			
			$post_id=base64_decode($this->uri->segment(3));
			if($post_id==''){
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
				redirect('job/lists');
			}
			$data['post_id']=$post_id;
			$log_details=$this->session->userdata('app_user');
			$payment_details=$this->Jobs_model->check_wallet_amount($log_details['a_u_id']);
			$this->load->view('html/upload-resume',$data);
			$this->load->view('html/footer');	
			
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
			
	}
	public  function uploadresume(){
		if($this->session->userdata('app_user'))
		{
				$post=$this->input->post();
				$this->load->view('html/upload-resume',$post);
				$this->load->view('html/footer');	
				
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
	}
	
	public  function upploadresume_post(){
		if($this->session->userdata('app_user'))
		{
			$post=$this->input->post();
			$log_details=$this->session->userdata('app_user');
			$check=$this->Jobs_model->check_post_appiled($log_details['a_u_id'],$post['post_id']);
			if(count($check)>0){
				$this->session->set_flashdata('error',"you already applied this position. Please try again");
				redirect('job/apply/'.base64_encode($post['post_id']));		
			}
			if(isset($_FILES['resume']['name']) && $_FILES['resume']['name']!=''){
					$temp = explode(".", $_FILES["resume"]["name"]);
					$documents = round(microtime(true)) . '.' . end($temp);
					move_uploaded_file($_FILES['resume']['tmp_name'], "assets/resume/" . $documents);
			}
			$add=array(
			'user_id'=>isset($log_details['a_u_id'])?$log_details['a_u_id']:'',
			'post_id'=>isset($post['post_id'])?$post['post_id']:'',
			'resume'=>isset($documents)?$documents:'',
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$log_details['a_u_id'],
			);
			//echo '<pre>';print_r($add);exit;
			$save=$this->Jobs_model->save_resume($add);
			if(count($save)>0){
				$this->session->set_flashdata('success',"Your job application has been sent successfully");
				redirect('');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
				redirect('job/apply/'.base64_encode($post['post_id']));	
			}
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
		
	}
	
	
	
	
	
	
	
	
}
