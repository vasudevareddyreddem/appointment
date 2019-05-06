<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employeer_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public  function save_employee($data){
		$this->db->insert('appointment_users',$data);
		return $this->db->insert_id();
	}
	public function check_employee_exist($email){
		$this->db->select('a_u_id')->from('appointment_users');
		$this->db->where('email',$email);
		$this->db->where('status !=',2);
		return $this->db->get()->row_array();
	}
	public  function get_all_emplist($a_u_id){
		$this->db->select('a_u_id,role,name,email,mobile,org_password,status,create_at')->from('appointment_users');
		$this->db->where('created_by',$a_u_id);
		$this->db->where('role',2);
		$this->db->where('status !=', 2);
		return $this->db->get()->result_array();
	}
	public function update_emp_status($id,$data){
		$this->db->where('a_u_id',$id);
		return $this->db->update('appointment_users',$data);
	}
	
	public  function get_employee_details($emp_id){
		$this->db->select('a_u_id,name,email,mobile,profile_pic')->from('appointment_users');
		$this->db->where('a_u_id',$emp_id);
		return $this->db->get()->row_array();
	}
	
	
}