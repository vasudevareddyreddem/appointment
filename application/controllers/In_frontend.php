<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In_frontend extends CI_Controller {

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
		$this->load->model('Users_model');
		
			if($this->session->userdata('app_user'))
			{
				$app_user=$this->session->userdata('app_user');
				$data['user_details']=$this->Users_model->get_user_details($app_user['a_u_id']);
				$this->load->view('html/header',$data);
				if($app_user['role']!=1){
					$this->load->view('html/sidebar',$data);
				}
			}else{
				$this->load->view('html/header');
			}
	}
	
}
