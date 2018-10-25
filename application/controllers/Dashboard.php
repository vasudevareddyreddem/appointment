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
			redirect('profile/index');
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
