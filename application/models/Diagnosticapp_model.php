<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagnosticapp_model extends CI_Model 

{
	
	
	function __construct() 
	{
		parent::__construct();
		$this->db2 = $this->load->database('another', TRUE);
	}
	
	public  function get_city_list(){
		$this->db2->select('city')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->group_by('city');		
        return $this->db2->get()->result_array();
	}
	public function get_packages_list(){
		$this->db2->select('l_t_p_id,lab_id,test_package_name,amount,discount,percentage,instruction,delivery_charge')->from('test_packages');
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
	
	
	public  function get_loication_and_lab_wise_lab_list($city,$test){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->where('role',2);		
		$this->db2->where('city',$city);		
		$this->db2->like('name',$test);
        return $this->db2->get()->result_array();
	}
	public  function get_loication_and_lab_wise_testy_list($city,$test){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('lab_tests');
		$this->db2->join('admin', 'admin.a_id = lab_tests.lab_id', 'left');
		$this->db2->where('admin.status',1);		
		$this->db2->where('admin.role',2);		
		$this->db2->where('admin.city',$city);		
		$this->db2->like('lab_tests.test_name',$test);
        return $this->db2->get()->result_array();
	}
	public  function get_all_loication_wise_lab_list($city){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->where('role',2);		
		$this->db2->like('city',$city);
        return $this->db2->get()->result_array();
	}
	public  function get_all_test_names_list($city){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('lab_tests');
		$this->db2->join('admin', 'admin.a_id = lab_tests.lab_id', 'left');
		$this->db2->where('admin.status',1);		
		$this->db2->where('admin.role',2);		
		$this->db2->like('admin.city',$city);
        return $this->db2->get()->result_array();
	}
	public  function get_lab_name_list($name){
		$this->db2->select('admin.name,admin.a_id,profile_pic')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->where('role',2);		
		$this->db2->like('name',$name);
        return $this->db2->get()->result_array();
	}
	public  function get_test_name_list($test){
		//echo $test;exit;
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('lab_tests');
		$this->db2->join('admin', 'admin.a_id = lab_tests.lab_id', 'left');
		$this->db2->where('admin.status',1);		
		$this->db2->where('admin.role',2);		
		$this->db2->like('lab_tests.test_name',$test);
        return $this->db2->get()->result_array();
	}
	public  function get_lab_test_lists($l_id){
		$this->db2->select('test_name,lab_id,l_id,test_duartion,test_amount,test_type')->from('lab_tests');
		$this->db2->where('status',1);		
		$this->db2->where('lab_id',$l_id);		
        return $this->db2->get()->result_array();
	}
	public  function get_lab_details_with_test_list($a_id){
		$this->db2->select('a_id,name,address1,address2,city,state,country,zipcode,profile_pic')->from('admin');
		$this->db2->where('a_id',$a_id);		
        $return=$this->db2->get()->row_array();
		$test_names_list=$this->get_lab_test_lists($return['a_id']);
		$data=$return;
		$data['test_names']=$test_names_list;
		if(!empty($data)){
			return $data;	
		}
	}
	
	
	

}