<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Dashboard extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function index()
	{	
		if($this->session->userdata('app_user'))
		{	
			
			$l_details=$this->session->userdata('app_user');
			$details=$this->Users_model->get_login_user_details($l_details['a_u_id']);
			if($details['role']==1){
				redirect('profile/index');
			}else{
				redirect('jobs');
			}
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
				
	}
	
	public function logout(){
		$admindetails=$this->session->userdata('app_user');
		$userinfo = $this->session->userdata('app_user');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('app_user');
		$this->session->unset_userdata('app_user');
        redirect('users/login');
	}
	
	
	
	
}
