<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

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
			$data['city_list']=$this->Diagnostic_model->get_diagnostic_city_list();
			$data['packages_list']=$this->Diagnostic_model->get_packages_test_lists();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/diagnostic_tests',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
				
	}
	public function search()
	{	
		if($this->session->userdata('app_user'))
		{	
			$post=$this->input->post();
			$data['lab_list']=$this->Diagnostic_model->get_loication_wise_lab_list($post['city']);
			$data['packages_list']=$this->Diagnostic_model->get_search_wise_lab_list($post['search_value']);
			$packages_list1=$this->Diagnostic_model->get_search_wise_test_list($post['search_value']);
		
			
			echo '<pre>';print_r($post);exit;
			$this->load->view('digonstic/diagnostic_tests',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
				
	}
	
	
	
}
