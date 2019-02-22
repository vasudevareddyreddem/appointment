<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_users_model extends CI_Model

{
	function __construct()
	{
    parent::__construct();
    $this->db2 = $this->load->database('another', TRUE);
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

    $this->db2->select('a_id phar_id,name')->from('admin');
    $this->db2->where('status',1);
    $this->db2->where('role',3);

        return $this->db2->get()->result_array();
  }
	public function get_labs($city){

    $this->db2->select('a_id phar_id,name')->from('admin');
    $this->db2->where('status',1);
    $this->db2->where('role',2);

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

}
