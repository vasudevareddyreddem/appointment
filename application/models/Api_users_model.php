<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_users_model extends CI_Model

{
	function __construct()
	{
    parent::__construct();
    $this->db2 = $this->load->database('another', TRUE);
    $this->db = $this->load->database('default', TRUE);
	}
  public function get_city_list(){

    $this->db2->select('city')->from('admin');
    $this->db2->where('status',1);
    $this->db2->where('role',3);
    $this->db2->group_by('city');
        return $this->db2->get()->result_array();
  }
	public function get_lcity_list(){

    $this->db2->select('city')->from('admin');
    $this->db2->where('status',1);
    $this->db2->where('role',2);
    $this->db2->group_by('city');
        return $this->db2->get()->result_array();
  }
  public function get_pharmcies($city){

    $this->db2->select('a_id phar_id,name,email')->from('admin');
    $this->db2->where('status',1);
    $this->db2->where('role',3);
		$this->db2->where('city',$city);

        return $this->db2->get()->result_array();
  }
	public function get_labs($city){

    $this->db2->select('a_id phar_id,name,email')->from('admin');
    $this->db2->where('status',1);
    $this->db2->where('role',2);
    $this->db2->where('city',$city);
        return $this->db2->get()->result_array();
  }
  public function get_qrcode($phar){
    $this->db2->select('qr_path')->from('admin');
    $this->db2->where('status',1);
    $this->db2->where('role',3);
      $this->db2->where('a_id',$phar);
    return $this->db2->get()->row_array();

  }
	public function insert_pay_det($data){
		$this->db2->insert('user_pharmacy_tab',$data);
		return $this->db2->affected_rows()?1:0;

	}
	public function insert_med_list($data){
		$this->db2->insert('cust_orders_tab',$data);
		return $this->db2->insert_id();
	}
	
	// for order list purpose
	
	public function get_order_list($a_id){
		 $this->db2->select('med_img,id,phar_id,address')->from('cust_orders_tab');
		$this->db2->where('cust_id',$a_id);
		return $this->db2->get()->result_array();
	}
	public function get_order_details($id){
		$this->db2->select('mt.medicine_name,po.unit_price,po.quantity,po.discount,po.total,po.created_date,')->from('pharmacy_orders as po');
		$this->db2->join('medicine_tab as mt','mt.id=po.med_id','left');
		$this->db2->where('po.cust_order_id',$id);
		return $this->db2->get()->result_array();
	}
	public function get_order_track_details($id,$u_id){
		$this->db2->select('po.cust_order_id as id,po.status')->from('pharmacy_orders as po');
		$this->db2->join('cust_orders_tab as mt','mt.id=po.cust_order_id','left');
		$this->db2->where('po.cust_order_id',$id);
		$this->db2->where('mt.cust_id',$u_id);
		return $this->db2->get()->row_array();
	}
	
	public  function get_barcode_details($email){
		$this->db2->select('a_id,name,city,discount_per')->from('admin');
		$this->db2->where('email',$email);
		return $this->db2->get()->row_array();
	}
	public  function get_wallet_details($a_u_id){
		$this->db->select('remaining_wallet_amount,wallet_amount')->from('appointment_users');
		$this->db->where('a_u_id',$a_u_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_wallet_amt_details($a_id,$data){
		$this->db->where('a_u_id',$a_id);
		return $this->db->update('appointment_users',$data);
	}

}
