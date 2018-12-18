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
	
}