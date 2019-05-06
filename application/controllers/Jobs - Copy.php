<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Jobs extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Jobs_model');
		
	}
	public function index()
	{	
		if($this->session->userdata('app_user'))
		{	
			$this->load->view('html/admin-jobs-dashboard');
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
				
	}
	public function lists()
	{	
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$data['jobs_list']=$this->Jobs_model->get_active_joblist($log_details['a_u_id']);
			$this->load->view('html/posted-joblist',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
				
	}
	public function appliedlist()
	{	
		if($this->session->userdata('app_user'))
		{	
			$log_details=$this->session->userdata('app_user');
			$data['appiled_list']=$this->Jobs_model->get_job_applied_joblist($log_details['a_u_id']);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/applyed-list',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
				
	}
	public function add()
	{	
		if($this->session->userdata('app_user'))
		{
			$this->load->view('html/add-job');
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
	}
	public  function addpost(){
		if($this->session->userdata('app_user'))
		{
			$post=$this->input->post();
			$log_details=$this->session->userdata('app_user');
			$add=array(
			'title'=>isset($post['title'])?$post['title']:'',
			'category'=>isset($post['category'])?$post['category']:'',
			'qualifications'=>isset($post['qualifications'])?$post['qualifications']:'',
			'experience'=>isset($post['experience'])?$post['experience']:'',
			'salary'=>isset($post['salary'])?$post['salary']:'',
			'district'=>isset($post['district'])?$post['district']:'',
			'state'=>isset($post['state'])?$post['state']:'',
			'last_to_apply'=>isset($post['last_to_apply'])?$post['last_to_apply']:'',
			'description'=>isset($post['description'])?$post['description']:'',
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$log_details['a_u_id']
			);
			$save=$this->Jobs_model->save_jobpost($add);
			if(count($save)>0){
				$this->session->set_flashdata('success',"Job added successfully");
				redirect('jobs/lists/');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
				redirect('jobs/add');
			}
			//echo '<pre>';print_r($post);exit;
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
	}
	
	public function status (){
		if($this->session->userdata('app_user'))
		{
			
			$id=base64_decode($this->uri->segment(3));
			$stat=base64_decode($this->uri->segment(4));
			if($stat==1){
				$st=0;
			}else{
				$st=1;
			}
			$update=array(
			'status'=>$st,
			'updated_at'=>date('Y-m-d H:i:s'),
			);
			$update=$this->Jobs_model->update_jobpost($id,$update);
			if(count($update)>0){
				if($stat==1){
					$this->session->set_flashdata('success',"Job deactivate successfully");
				}else{
					$this->session->set_flashdata('success',"Job activate successfully");
				}
				redirect('jobs/lists/');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
				redirect('jobs/lists');
			}
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}	
	}
	public function delete (){
		if($this->session->userdata('app_user'))
		{
			
			$id=base64_decode($this->uri->segment(3));
			
			$update=array(
			'status'=>2,
			'updated_at'=>date('Y-m-d H:i:s'),
			);
			$update=$this->Jobs_model->update_jobpost($id,$update);
			if(count($update)>0){
				$this->session->set_flashdata('success',"Job deleted successfully");
				redirect('jobs/lists/');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
				redirect('jobs/lists');
			}
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}	
	}
	
	
	public function application_status(){
		if($this->session->userdata('app_user'))
		{ 
			$userdetails=$this->session->userdata('ftp_details');
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			$add=array(
			'comment'=>isset($post['comment'])?$post['comment']:'',
			'status'=>isset($post['status'])?$post['status']:'',
			'updated_at'=>date('Y-m-d H:i:s'),
			);
			$update=$this->Jobs_model->update_comment(base64_decode($post['u_a_p_id']),$add);
			//echo $this->db->last_query();exit;
			if(count($update)>0){
				$data['msg']=1;
				echo json_encode($data);exit;
			}else{
				$data['msg']=0;
				echo json_encode($data);exit;
			}
		}else{
				$data['msg']=2;
				echo json_encode($data);exit;
		}
	}
	

	
	
	
	
	
}
