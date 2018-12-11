<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Wallet extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
	}
    
	public function index(){
		if($this->session->userdata('app_user'))
            {
					$this->load->view('html/wallet');
					$this->load->view('html/footer');	
			}
	}
	
	
}
