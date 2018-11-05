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
	
	public  function profile(){
		if($this->session->userdata('app_user'))
		{	
			$l_id=base64_decode($this->uri->segment(3));
			$data['lab_deatils']=$this->Diagnostic_model->get_diagnostic_lab_deatils($l_id);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('digonstic/lab_profile',$data);
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
			$details['city_list']=$this->Diagnostic_model->get_diagnostic_city_list();
			//echo '<pre>';print_r($post);
			if($post['city']!='' && $post['search_value']!=''){
				$lab_list=$this->Diagnostic_model->get_loication_and_lab_wise_lab_list($post['city'],$post['search_value']);
				$test_list=$this->Diagnostic_model->get_loication_and_lab_wise_testy_list($post['city'],$post['search_value']);
				$all_data=array_merge($lab_list,$test_list);
			}else if($post['city']!='' && $post['search_value']==''){
				$lab_list=$this->Diagnostic_model->get_all_loication_wise_lab_list($post['city']);
				$test_list=$this->Diagnostic_model->get_all_test_names_list($post['city']);
				$all_data=array_merge($lab_list,$test_list);
			}else if($post['city']=='' && $post['search_value']!=''){
				$lab_list=$this->Diagnostic_model->get_lab_name_list($post['search_value']);
				$test_list=$this->Diagnostic_model->get_test_name_list($post['search_value']);
				$all_data=array_merge($lab_list,$test_list);
			}
			if(isset($all_data) && count($all_data)>0){
					
					$pageNos = array();
					foreach($all_data as $el) {
						//echo '<pre>';print_r($el);
					   $pageno = $el['a_id'];
					   if(!in_array($pageno, $pageNos))
					   {
							$deta=$this->Diagnostic_model->get_lab_test_lists($pageno);
							if(count($deta)>0){
								$dd='';
								foreach($deta as $li){
									$dd[]=$li['test_name'];
								}
								$t_n_lists=implode(", ",$dd);
							}
							if($el['a_id']!=''){
								$data[$el['a_id']]=$el;
								$data[$el['a_id']]['test_names']=$t_n_lists;
							}
							//echo '<pre>';print_r($el);exit;							
							//echo $pageno ;
						   array_push($pageNos,$pageno);
					   }
					}
					
					$details['labs_lists']=$data;
				}else{
					$details['labs_lists']=array();
				}
			//echo '<pre>';print_r($lis);exit;
			$this->load->view('digonstic/tests_search',$details);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('users/login');
		}
				
	}
	
	
	
}
