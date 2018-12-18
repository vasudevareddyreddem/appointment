<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public  function check_login($email,$password){
		$this->db->select('*')->from('appointment_users');	
		$this->db->where('email', $email);
		$this->db->where('password', $password);
        return $this->db->get()->row_array();
	}
	public  function get_login_user_details($a_u_id){
		$this->db->select('a_u_id,email')->from('appointment_users');	
		$this->db->where('a_u_id', $a_u_id);
        return $this->db->get()->row_array();
	}
	public  function get_user_details($a_u_id){
		$this->db->select('*')->from('appointment_users');	
		$this->db->where('a_u_id', $a_u_id);
        return $this->db->get()->row_array();
	}
	public function update_user_details($a_u_id,$data){
		$this->db->where('a_u_id',$a_u_id);
    	return $this->db->update("appointment_users",$data);
	}
	
	public function check_email_exits($email){
		$this->db->select('*')->from('appointment_users');	
		$this->db->where('email', $email);
        return $this->db->get()->row_array();
	}
	public  function save_appoinment_user($data){
		$this->db->insert('appointment_users',$data);
		return $this->db->insert_id();
	}
	/* forgot passsword */
	public function get_email_details_check($email){
		$this->db->select('*')->from('appointment_users');	
		$this->db->where('email', $email);
        return $this->db->get()->row_array();
	}
	/* home  page  city list  purpose*/
	public  function get_hospital_city_list(){
		$this->db->select('hospital.hos_bas_city')->from('hospital');
		$this->db->where('hos_status',1);
		$this->db->where('hos_undo',0);
		$this->db->where('hos_bas_city!=','') ;
		$this->db->group_by('hospital.hos_bas_city') ;
		return $this->db->get()->result_array();
	}
	public  function get_city_wise_hospital_list($city){
		$this->db->select('hospital.hos_bas_city,hospital.hos_id')->from('hospital');
		$this->db->where('hos_status',1);
		$this->db->where('hos_undo',0);
		$this->db->where('hos_bas_city',$city);
		return $this->db->get()->result_array();
	}
	public  function get_hospital_list($city,$h_name){
		$this->db->select('hospital.hos_bas_city,hospital.hos_id')->from('hospital');
		$this->db->where('hos_status',1);
		$this->db->where('hos_undo',0);
		$this->db->where('hos_bas_city',$city);
		$this->db->like('hos_bas_name', $h_name);
		return $this->db->get()->result_array();
	}
	public  function get_hospital_department_list($city,$h_name){
		$this->db->select('hospital.hos_bas_city,hospital.hos_id')->from('treament');
		$this->db->join('hospital', 'hospital.hos_id = treament.hos_id', 'left');
		$this->db->where('hospital.hos_bas_city',$city);
		$this->db->where('treament.t_status',1);
		$this->db->like('treament.t_name', $h_name);
		return $this->db->get()->result_array();
	}
	
	public  function get_hospital_details($h_id){
		$this->db->select('hospital.hos_bas_name,hospital.hos_bas_logo,hospital.hos_bas_country,hospital.hos_bas_state,hospital.hos_bas_city,hospital.hos_bas_zipcode,hospital.hos_bas_add1,hospital.hos_bas_add2,hospital.hos_bas_city,hospital.hos_id')->from('hospital');
		$this->db->like('hos_id', $h_id);
		$return=$this->db->get()->row_array();
		$dep_list_with_name=$this->get_department_hos_list_with_names($return['hos_id']);
		$dep_list=$this->get_department_hos_list($return['hos_id']);
		$doctor_list=$this->get_hospital_hos_list($return['hos_id']);
		$data=$return;
		$data['department_list_with_name']=$dep_list_with_name;
		$data['department_list']=isset($dep_list['cnt'])?$dep_list['cnt']:'';
		$data['doctor_list']=isset($doctor_list['cnt'])?$doctor_list['cnt']:'';
		if(!empty($data)){
			return $data;
		}
		//echo '<pre>';print_r($data);exit;
	}
	public  function get_department_hos_list($h_id){
		$this->db->select('COUNT(t_id) as cnt')->from('treament');
		$this->db->like('hos_id', $h_id);
		$this->db->where('t_status',1);
		return $this->db->get()->row_array();
	}
	public  function get_department_hos_list_with_names($h_id){
		$this->db->select('t_name')->from('treament');
		$this->db->join('hospital', 'hospital.hos_id = treament.hos_id', 'left');
		$this->db->where('hospital.hos_undo',0);
		$this->db->like('treament.hos_id', $h_id);
		$this->db->where('treament.t_status',1);
		return $this->db->get()->result_array();
	}
	public  function get_hospital_hos_list($h_id){
		$this->db->select('COUNT(t_d_doc_id) as cnt')->from('treatmentwise_doctors');
		$this->db->like('hos_id', $h_id);
		$this->db->where('t_d_status',1);
		return $this->db->get()->row_array();
	}
	
	public  function get_hospital_count_list(){
		$this->db->select('COUNT(hos_id) as cnt')->from('hospital');
		$this->db->where('hos_undo',0);
		return $this->db->get()->row_array();
	}
	public  function get_clicnic_list_list(){
		$this->db->select('COUNT(treament.hos_id) as cnt')->from('treament');
		$this->db->join('hospital', 'hospital.hos_id = treament.hos_id', 'left');
		$this->db->where('hospital.hos_undo',0);
		$this->db->where('treament.t_status',1);
		return $this->db->get()->row_array();
	}
	public  function get_hospital_doctors_list(){
		$this->db->select('COUNT(resource_list.r_id) as cnt')->from('resource_list');
		$this->db->join('hospital', 'hospital.hos_id = resource_list.hos_id', 'left');
		$this->db->where('hospital.hos_undo',0);
		$this->db->where('resource_list.r_status',1);
		$this->db->where('resource_list.role_id',6);
		return $this->db->get()->row_array();
	}
	/* admin logos list purpoe */
	public  function get_all_logos_list(){
		$this->db->select('image,org_name')->from('logos_list');
		$this->db->where('status',1);
		return $this->db->get()->result_array(); 
	}
	/* get wallet amount  list */
	public  function get_wallet_amount(){
		$this->db->select('*')->from('wallet_amount');
		$this->db->where('status',1);
		return $this->db->get()->row_array(); 
	}

		
		
	
	

}