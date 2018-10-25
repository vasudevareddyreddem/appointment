<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Profile extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		
		
	}
	public function index()
	{	
		if($this->session->userdata('app_user'))
		{
			$app_user=$this->session->userdata('app_user');
			$data['user_details']=$this->Users_model->get_user_details($app_user['a_u_id']);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/my-profile',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
				
	}
	public function edit()
	{	if($this->session->userdata('app_user'))
		{
			$app_user=$this->session->userdata('app_user');
			$data['user_details']=$this->Users_model->get_user_details($app_user['a_u_id']);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/edit-profile',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	public function editpost()
	{	if($this->session->userdata('app_user'))
		{
			$app_user=$this->session->userdata('app_user');
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			$userdetails=$this->Users_model->get_user_details($app_user['a_u_id']);
			if($userdetails['email']!=$post['email']){
				
				$check_email=$this->Users_model->check_email_exits($post['email']);
				if(count($check_email)>0){
					$this->session->set_flashdata('error',"Email address already exists. Please another email address.");
					redirect('profile/edit');
				}
			}
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							if($userdetails['profile_pic']!=''){
							unlink('assets/profile_pic/'.$userdetails['profile_pic']);
							}
							$temp = explode(".", $_FILES["image"]["name"]);
							$image = round(microtime(true)) . '.' . end($temp);
							move_uploaded_file($_FILES['image']['tmp_name'], "assets/profile_pic/" . $image);
						}else{
							$image=$userdetails['profile_pic'];
						}
					$updatedetails=array(
					'name'=>isset($post['name'])?$post['name']:'',
					'email'=>isset($post['email'])?$post['email']:'',
					'mobile'=>isset($post['mobile'])?$post['mobile']:'',
					'profile_pic'=>$image,
					);
				
			$profile_update=$this->Users_model->update_user_details($app_user['a_u_id'],$updatedetails);
			if(count($profile_update)>0){
				$this->session->set_flashdata('success','Profile details successfully updated');
				redirect('profile');
				
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('profile/edit');
			}
					
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	public function changepassword()
	{	if($this->session->userdata('app_user'))
		{
			$app_user=$this->session->userdata('app_user');
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/changepassword');
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
	}
	public  function changepwdpost(){
		if($this->session->userdata('app_user'))
		{
			$app_user=$this->session->userdata('app_user');
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			$admin_details = $this->Users_model->get_user_details($app_user['a_u_id']);
			if($admin_details['password']== md5($post['oldpassword'])){
				if(md5($post['newpassword'])== md5($post['confirmpassword'])){
						$updateuserdata=array(
						'password'=>md5($post['confirmpassword']),
						'org_password'=>$post['confirmpassword'],
						'updated_at'=>date('Y-m-d H:i:s'),
						);
						//echo '<pre>';print_r($updateuserdata);exit;
						$upddateuser = $this->Users_model->update_user_details($app_user['a_u_id'],$updateuserdata);
						if(count($upddateuser)>0){
							$this->session->set_flashdata('success',"Password successfully updated");
							redirect('profile');
						}else{
							$this->session->set_flashdata('error',"Technical problem will occurred. Please try again.");
							redirect('profile/changepassword');
						}
					
				}else{
					$this->session->set_flashdata('error',"Password and Confirm Password are not matched");
					redirect('profile/changepassword');
				}
				
			}else{
				$this->session->set_flashdata('error',"Old password didn't match");
				redirect('profile/changepassword');
			}
				
			
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	
	
	
}
