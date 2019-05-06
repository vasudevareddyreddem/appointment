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
	
	//plans 
	public  function check_plan_exits($amt,$resume,$plan_name){
		$this->db->select('j_p_id')->from('job_plans');
		$this->db->where('p_amt',$amt);
		$this->db->where('no_of_resume_view',$resume);
		$this->db->where('p_name',$plan_name);
		return $this->db->get()->row_array();
	}
	public function save_plans($data){
		$this->db->insert('job_plans',$data);
		return $this->db->insert_id();
	}
	public function get_plans_list($id){
		$this->db->select('j_p_id,p_amt,no_of_resume_view,expiry_date,p_name,status,create_at')->from('job_plans');
		$this->db->where('created_by',$id);
		$this->db->where('status !=',2);
		return $this->db->get()->result_array();
	}
	public function update_plan_status($id,$data){
		$this->db->where('j_p_id',$id);
		return $this->db->update('job_plans',$data);
	}
	public  function get_plan_details($p_id){
		$this->db->select('j_p_id,p_amt,no_of_resume_view,expiry_date,p_name,status,create_at')->from('job_plans');
		$this->db->where('j_p_id',$p_id);
		return $this->db->get()->row_array();
	}
	//dashboard
	public function get_emp_count_list($a_u_id){
		$this->db->select('count(a_u_id) as cnt')->from('appointment_users');
		$this->db->where('role',2);
		$this->db->where('created_by',$a_u_id);
		$this->db->where('status !=',2);
		return $this->db->get()->row_array();  
	}
	
	
}