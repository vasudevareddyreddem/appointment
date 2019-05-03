<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Admin extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Appointment_model');
		
	}
	public function index()
	{	
		if(!$this->session->userdata('app_user'))
		{	
			$this->load->view('html/register');
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('dashboard');
		}
	}
	
	
	
	
	
	
	
}
