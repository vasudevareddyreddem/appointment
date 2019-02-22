<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_user_checking_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
		$this->load->database("default");
	}
  public function user_checking($user_id){
    $this->db->select('*')->from('appointment_users');

      $this->db->where('a_u_id',$user_id);
    return $this->db->get()->result_array();

  }
	public function amt_checking($user_id,$amt){
		$this->db->select('*')->from('appointment_users');
$this->db->where('remaining_wallet_amount >=',$amt);
			$this->db->where('a_u_id',$user_id);
		return $this->db->get()->result_array();
	}
	public function update_wallet($wamt,$user_id){
		$this->db->select('remaining_wallet_amount')->from('appointment_users')->where('a_u_id',$user_id);
	$row=	$this->db->get()->row_array();
	$amt=$row['remaining_wallet_amount']-$wamt;




		$this->db->where('a_u_id',$user_id);
			$this->db->set('remaining_wallet_amount',$amt);
			$this->db->update('appointment_users');

return $this->db->affected_rows()?1:0;

	}
}
