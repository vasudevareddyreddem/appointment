<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Diagnostic extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->model('Diagnosticapp_model');
		
    }

 
	public function cities_post(){
		$city_list=$this->Diagnosticapp_model->get_city_list();
		if(count($city_list)>0){
			$message = array('status'=>1,'list'=>$city_list,'message'=>'Cities list are found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Cities list are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public function package_post(){
		$packages_list=$this->Diagnosticapp_model->get_packages_list();
		if(isset($packages_list) && count($packages_list)>0){
			foreach($packages_list as $list){
				$p_l_lists[]=$list;
			}
		}
		if(isset($p_l_lists) && count($p_l_lists)>0){
			$message = array('status'=>1,'list'=>$p_l_lists,'message'=>'Packages list are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Packages list are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public function search_post(){
		$city=$this->post('city');
		$search=$this->post('search_value');
		if($city!='' && $search!=''){
				$lab_list=$this->Diagnosticapp_model->get_loication_and_lab_wise_lab_list($city,$search);
				$test_list=$this->Diagnosticapp_model->get_loication_and_lab_wise_testy_list($city,$search);
				$all_data=array_merge($lab_list,$test_list);
			}else if($city!='' && $search==''){
				$lab_list=$this->Diagnosticapp_model->get_all_loication_wise_lab_list($city);
				$test_list=$this->Diagnosticapp_model->get_all_test_names_list($city);
				$all_data=array_merge($lab_list,$test_list);
			}else if($city=='' && $search!=''){
				$lab_list=$this->Diagnosticapp_model->get_lab_name_list($search);
				$test_list=$this->Diagnosticapp_model->get_test_name_list($search);
				$all_data=array_merge($lab_list,$test_list);
			}
			if(isset($all_data) && count($all_data)>0){
					
					$pageNos = array();
					foreach($all_data as $el) {
						//echo '<pre>';print_r($el);
					   $pageno = $el['a_id'];
					   if(!in_array($pageno, $pageNos))
					   {
							$deta=$this->Diagnosticapp_model->get_lab_test_lists($pageno);
							if($el['a_id']!=''){
								$data[$el['a_id']]=$el;
								$data[$el['a_id']]['test_names']=isset($deta)?$deta:'';
							}
							//echo '<pre>';print_r($el);exit;							
							//echo $pageno ;
						   array_push($pageNos,$pageno);
					   }
					}
					
					$all_labs_lists=$data;
					
				}
			if(isset($all_labs_lists) && count($all_labs_lists)>0){
				foreach($all_labs_lists as $lists){
					$labs_lists[]=$lists;
				}
				}else{
					$labs_lists=array();
				}
				
			
		if(isset($labs_lists) && count($labs_lists)>0){
			$message = array('status'=>1,'list'=>$labs_lists,'imgpath'=>'http://mlab.ehealthinfra.com/assets/profile_pic','message'=>'Test list are found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Test list are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		
		
	}
	
	public function test_list_post(){
		$a_id=$this->post('a_id');
		
		if($a_id==''){
			$message = array('status'=>0,'message'=>'Lab Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		$test_list=$this->Diagnosticapp_model->get_lab_details_with_test_list($a_id);
		//echo '<pre>';print_r($test_list);exit;
		
		if(isset($test_list) && count($test_list)>0){
			$message = array('status'=>1,'details'=>$test_list,'message'=>'Test details are found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Test details are not found.');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	
	

}
