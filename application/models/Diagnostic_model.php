<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagnostic_model extends CI_Model 

{
	
	
	function __construct() 
	{
		parent::__construct();
		$this->db2 = $this->load->database('another', TRUE);
	}
	
	public  function get_diagnostic_city_list(){
		$this->db2->select('city')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->group_by('city');		
        return $this->db2->get()->result_array();
	}
	public function get_packages_test_lists(){
		$this->db2->select('*')->from('test_packages');
		$this->db2->where('status',1);
		$return=$this->db2->get()->result_array();
		foreach($return as $lis){
			$test_list=$this->get_package_test_name($lis['l_t_p_id']);
			//echo $this->db->last_query();
			//echo '<pre>';print_r($test_list);exit;
			$data[$lis['l_t_p_id']]=$lis;
			$data[$lis['l_t_p_id']]['package_test_list']=$test_list;
		}
		if(!empty($data)){
			return $data;
			
		}
	}
	
	public  function get_package_test_name($package_name){
		$this->db2->select('packages_test_list.*,lab_tests.test_name,lab_tests.test_type,lab_tests.test_duartion')->from('packages_test_list');
		$this->db2->join('lab_tests', 'lab_tests.l_id = packages_test_list.test_id', 'left');
		$this->db2->where('packages_test_list.status !=',2);
		$this->db2->where('packages_test_list.l_t_p_id',$package_name);
		return $this->db2->get()->result_array();
	}
	
	public  function get_loication_wise_lab_list($location){
		$this->db2->select('*')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->where('city',$location);		
        return $this->db2->get()->result_array();
	}
	public  function get_search_wise_test_list($test){
		$this->db2->select('*')->from('lab_tests');
		$this->db2->where('status',1);		
		$this->db2->where('test_name',$test);		
        return $this->db2->get()->result_array();
	}
	public  function get_search_wise_lab_list($name){
		$this->db2->select('*')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->like('name',$name);		
        return $this->db2->get()->result_array();
	}
	
	
	

}