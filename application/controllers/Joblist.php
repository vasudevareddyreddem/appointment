<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class joblist extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Diagnostic_model');
		$this->db2 = $this->load->database('another', TRUE);
		
	}
	public function index()
	{	
		
			$this->load->view('html/joblist');
			$this->load->view('html/footer');
		
				
	}
	
	
	
	
	
	
	
	
}