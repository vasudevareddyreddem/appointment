<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Employeer extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Employeer_model');
		$this->db2 = $this->load->database('another', TRUE);
		
	}
	public function index()
	{	
		if($this->session->userdata('app_user'))
		{
			$app_user=$this->session->userdata('app_user');
			$data['emp_list']=$this->Employeer_model->get_all_emplist($app_user['a_u_id']);
			//echo $this->db->last_query();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/employeer/employeers-list',$data);
			$this->load->view('html/footer');
		}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('users/login');
			}
	}
	
	public function add()
	{
		if($this->session->userdata('app_user'))
		{	
			$this->load->view('html/employeer/add-employeer');
			$this->load->view('html/footer');
		}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('users/login');
			}	
	}
	public function edit()
	{
		if($this->session->userdata('app_user'))
		{	
			$emp_id=base64_decode($this->uri->segment(3));
			$data['details']=$this->Employeer_model->get_employee_details($emp_id);
			$this->load->view('html/employeer/edit-employeer',$data);
			$this->load->view('html/footer');
		}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('users/login');
			}	
	}
	public function addpost()
	{
		if($this->session->userdata('app_user'))
		{	
			$post=$this->input->post();
			$app_user=$this->session->userdata('app_user');
			$check=$this->Employeer_model->check_employee_exist($post['email']);
			if(count($check)>0){
				$this->session->set_flashdata('error',"Email id already exist. Use another email id.");
				redirect('employeer/add');	
			}
			if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
				$temp = explode(".", $_FILES["profile_pic"]["name"]);
				$pic = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/profile_pic" . $pic);
			}
			$add=array(
			'role'=>2,
			'name'=>isset($post['name'])?$post['name']:'',
			'email'=>isset($post['email'])?$post['email']:'',
			'mobile'=>isset($post['mobile'])?$post['mobile']:'',
			'password'=>isset($post['confirmpwd'])?md5($post['confirmpwd']):'',
			'org_password'=>isset($post['confirmpwd'])?$post['confirmpwd']:'',
			'create_at'=>date('Y-m-d H:i:s'),
			'profile_pic'=>isset($pic)?$pic:'',
			'created_by'=>isset($app_user['a_u_id'])?$app_user['a_u_id']:'',
			);
			$save=$this->Employeer_model->save_employee($add);
				if(count($save)>0){
					$this->session->set_flashdata('success',"Employee added successfully");
					redirect('employeer/index');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('employeer/add');
				}
		}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('users/login');
			}	
	}
	public function editpost()
	{
		if($this->session->userdata('app_user'))
		{	
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			$app_user=$this->session->userdata('app_user');
			$details=$this->Employeer_model->get_employee_details($post['a_u_id']);
			if($details['email']!=$post['email']){
				$check=$this->Employeer_model->check_employee_exist($post['email']);
				if(count($check)>0){
					$this->session->set_flashdata('error',"Email id already exist. Use another email id.");
					redirect('employeer/edit/'.base64_encode($post['a_u_id']));	
				}	
			}
			if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
				unlink('assets/profile_pic/'.$details['profile_pic']);
				$temp = explode(".", $_FILES["profile_pic"]["name"]);
				$pic = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/profile_pic" . $pic);
			}else{
				$pic =$details['profile_pic'];
			}
			$add=array(
			'name'=>isset($post['name'])?$post['name']:'',
			'email'=>isset($post['email'])?$post['email']:'',
			'mobile'=>isset($post['mobile'])?$post['mobile']:'',
			'updated_at'=>date('Y-m-d H:i:s'),
			'profile_pic'=>isset($pic)?$pic:'',
			);
			$save=$this->Employeer_model->save_employee($add);
				if(count($save)>0){
					$this->session->set_flashdata('success',"Employee details updated successfully");
					redirect('employeer/index');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('employeer/edit/'.base64_encode($post['a_u_id']));	
				}
		}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('users/login');
			}	
	}
	public  function status(){
		if($this->session->userdata('app_user'))
		{
			$a_u_id=base64_decode($this->uri->segment(3));
			$statu=base64_decode($this->uri->segment(4));
			if($statu==1){
				$st=0;
			}else{
				$st=1;
			}
			$u_data=array('status'=>$st,'updated_at'=>date('Y-m-d H:i:s'));
			$update=$this->Employeer_model->update_emp_status($a_u_id,$u_data);
			if(count($update)>0){
					if($statu==1){
						$this->session->set_flashdata('success',"Employee deactivate successfully");
					}else{
						$this->session->set_flashdata('success',"Employee activate successfully");
					}
					redirect('employeer/index');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again.");
				redirect('employeer/index');
			}
			
		}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('users/login');
			}
	}
	public  function delete(){
		if($this->session->userdata('app_user'))
		{
			$a_u_id=base64_decode($this->uri->segment(3));
			$u_data=array('status'=>2,'updated_at'=>date('Y-m-d H:i:s'));
			$update=$this->Employeer_model->update_emp_status($a_u_id,$u_data);
			if(count($update)>0){
				$this->session->set_flashdata('success',"Employee delete successfully");
				redirect('employeer/index');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occurred. Please try again.");
				redirect('employeer/index');
			}
		}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('users/login');
			}
	}
	
	
	
	
	
	
	
	
}
