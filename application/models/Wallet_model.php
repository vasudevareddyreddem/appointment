<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wallet_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public  function get_user_appointment_list($a_u_id){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,resource_list.resource_name,resource_list.consultation_fee,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('resource_list', 'resource_list.a_id = appointment_bidding_list.doctor_id', 'left');
		$this->db->where('appointment_bidding_list.create_by',$a_u_id);
		return $this->db->get()->result_array();
	}
	
	public  function get_appointment_details($a_u_id){
		$this->db->select('hospital.hos_bas_name,hospital.hos_id,')->from('appointment_bidding_list');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->where('b_id',$a_u_id);
		return $this->db->get()->row_array();
	}
	public  function check_couponcode_exists_ornot($appointment_id,$hos_id){
		$this->db->select('*')->from('coupon_code_list');
		$this->db->where('appointment_id',$appointment_id);
		$this->db->where('hos_id',$hos_id);
		return $this->db->get()->row_array();
	}
	
	public  function save_couponcode($data){
		$this->db->insert('coupon_code_list',$data);
		return $this->db->insert_id();
		
	}
	
	public  function get_coupon_code_details($b_id){
		$this->db->select('couponcode_name,created_at')->from('coupon_code_list');
		$this->db->where('appointment_id',$b_id);
		return $this->db->get()->row_array();
	}
	
	public  function get_user_wallet_details($a_u_id){
		$this->db->select('a_u_id,ip_wallet_amount,op_wallet_amount,lab_wallet_amount,wallet_amount_id,remaining_ip_wallet,remaining_op_wallet_amount,remaining_lab_wallet')->from('appointment_users');
		$this->db->where('a_u_id',$a_u_id);
		return $this->db->get()->row_array();
	}
	
	public  function get_all_wallet_history($a_u_id){
		$this->db->select('coupon_code_history.*,patients_list_1.name,patients_list_1.mobile,patients_list_1.email,resource_list.resource_name,resource_list.consultation_fee,hospital.hos_bas_name,hospital.hos_bas_city,appointments.date,appointments.time')->from('coupon_code_history');
		$this->db->join('patients_list_1', 'patients_list_1.pid = coupon_code_history.p_id', 'left');
		$this->db->join('patient_billing', 'patient_billing.b_id = coupon_code_history.b_id', 'left');
		$this->db->join('hospital', 'hospital.hos_id = patients_list_1.hos_id', 'left');
		$this->db->join('resource_list', 'resource_list.a_id = patient_billing.doct_id', 'left');
		$this->db->join('appointments', 'appointments.patient_id = coupon_code_history.p_id', 'left');
		$this->db->where('coupon_code_history.appointment_user_id',$a_u_id);
		$this->db->order_by('coupon_code_history.h_id',"desc");
		return $this->db->get()->result_array();
	}
	
	/* ip coupon code  system */
	public  function check_ip_couponcode_exists_ornot($hos_id,$coupon_code){
		$this->db->select('*')->from('coupon_code_list');
		$this->db->where('couponcode_name',$coupon_code);
		$this->db->where('hos_id',$hos_id);
		return $this->db->get()->row_array();
	}
	public  function hospital_details($hos_id){
		$this->db->select('hos_bas_name')->from('hospital');
		$this->db->where('hos_id',$hos_id);
		return $this->db->get()->row_array();
	}
	public  function get_ip_coupon_code_list($a_u_id){
		$this->db->select('coupon_code_list.*,hospital.hos_bas_name,hospital.hos_bas_city')->from('coupon_code_list');
		$this->db->join('hospital', 'hospital.hos_id = coupon_code_list.hos_id', 'left');
		$this->db->where('coupon_code_list.created_by',$a_u_id);
		$this->db->where('coupon_code_list.type',2);
		return $this->db->get()->result_array();
	}
	public  function get_lab_coupon_code_list($a_u_id){
		$this->db->select('coupon_code_list.*,hospital.hos_bas_name,hospital.hos_bas_city')->from('coupon_code_list');
		$this->db->join('hospital', 'hospital.hos_id = coupon_code_list.hos_id', 'left');
		$this->db->where('coupon_code_list.created_by',$a_u_id);
		$this->db->where('coupon_code_list.type',3);
		return $this->db->get()->result_array();
	}
	/* ip coupon code  system */
	
}