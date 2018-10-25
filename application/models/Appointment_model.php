<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public  function get_hospital_city_list(){
		$this->db->select('hospital.hos_bas_city')->from('hospital');
		$this->db->where('hos_status',1);
		$this->db->where('hos_undo',0);
		$this->db->where('hos_bas_city!=','') ;
		$this->db->group_by('hospital.hos_bas_city') ;
		return $this->db->get()->result_array();
	}
	
	public  function get_hospital_list($city){
		$this->db->select('hos_id,a_id,hos_bas_name')->from('hospital');
		$this->db->where('hos_status',1);
		$this->db->where('hos_undo',0);
		$this->db->where('hos_bas_city',$city) ;
		return $this->db->get()->result_array();	
	}
	public  function get_consultation_fee($hos_id){
		$this->db->select('hos_id,a_id,appointment_fee')->from('hospital');
		$this->db->where('hos_id',$hos_id) ;
		return $this->db->get()->row_array();	
	}
	public  function get_hospital_departments($h_id){
		$this->db->select('treament.t_name,treament.t_id')->from('treament');
		$this->db->join('hospital', 'hospital.hos_id = treament.hos_id', 'left');
		$this->db->where('hospital.hos_id',$h_id);
		$this->db->group_by('treament.t_id');
		return $this->db->get()->result_array();
	}
	public  function get_hospital_department_specilist($d_id,$hos_id){
		$this->db->select('specialist.specialist_name,specialist.s_id')->from('specialist');
		$this->db->group_by('specialist.s_id');
		$this->db->where('specialist.d_id',$d_id);
		$this->db->where('specialist.hos_id',$hos_id);
		$this->db->where('t_status',1);
		return $this->db->get()->result_array();
	}
	public  function get_hospital_doctors($s_id,$hos_id){
		$this->db->select('resource_list.a_id,resource_list.resource_name')->from('treatmentwise_doctors');		
		$this->db->join('resource_list', 'resource_list.a_id = treatmentwise_doctors.t_d_doc_id', 'left');
		$this->db->where('treatmentwise_doctors.s_id',$s_id);
		$this->db->where('treatmentwise_doctors.hos_id',$hos_id);
		$this->db->where('resource_list.r_status',1);
        return $this->db->get()->result_array();
	}
	public  function get_user_details($a_u_id){
		$this->db->select('a_u_id,name,email,mobile')->from('appointment_users');
		$this->db->where('a_u_id',$a_u_id);
		return $this->db->get()->row_array();
	}
	public  function save_appointments($data){
		$this->db->insert('appointment_bidding_list',$data);
		return $this->db->insert_id();
	}
	public  function get_appointment_confirmation_details($a_id){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,resource_list.resource_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('resource_list', 'resource_list.a_id = appointment_bidding_list.doctor_id', 'left');
		$this->db->where('appointment_bidding_list.b_id',$a_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_appointment_status($a_id,$data){
		$this->db->where('b_id',$a_id);
		return $this->db->update('appointment_bidding_list',$data);
		
	}
	public  function get_user_appointment_list($a_u_id){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,resource_list.resource_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('resource_list', 'resource_list.a_id = appointment_bidding_list.doctor_id', 'left');
		$this->db->where('appointment_bidding_list.create_by',$a_u_id);
		return $this->db->get()->result_array();
	}
	
	public  function update_appointments_details($a_id,$data){
		$this->db->where('b_id',$a_id);
		return $this->db->update('appointment_bidding_list',$data);
		
	}
	
	
	
	

}