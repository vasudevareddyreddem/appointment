<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public  function save_jobpost($data){
		$this->db->insert('job_posts',$data);
		return $this->db->insert_id();
		
	}
	public  function update_jobpost($id,$data){
		$this->db->where('j_p_id',$id);
		return $this->db->update('job_posts',$data);
	}
	public  function get_active_joblist($a_u_id){
		$this->db->select('j_p_id,title,qualifications,experience,district,last_to_apply,status')->from('job_posts');
		$this->db->where('created_by',$a_u_id);
		$this->db->where('status !=',2);
		return $this->db->get()->result_array();
	}
	
	
	public  function check_ip_couponcode_exists_ornot($hos_id,$coupon_code){
		$this->db->select('*')->from('coupon_code_list');
		$this->db->where('couponcode_name',$coupon_code);
		$this->db->where('hos_id',$hos_id);
		return $this->db->get()->row_array();
	}
	// carrer page purposer
	 public function get_all_active_joblist($type){
		$this->db->select('TIMEDIFF( jp.created_at, now() ) as df_time,jp.j_p_id,jp.description,jp.category,jp.title,jp.qualifications,jp.experience,jp.district,jp.last_to_apply,jp.status,au.name as postedby')->from('job_posts as jp');
		$this->db->join('appointment_users as au','au.a_u_id=jp.created_by','left');
		if(isset($type) && $type!=''){
			$this->db->where('jp.category',$type);
		}
		$this->db->where('jp.status',1);
		return $this->db->get()->result_array(); 
	 }
	 
	 public function get_all_jobs_category_joblist(){
		$this->db->select('count(jp.j_p_id) as cnt ,category')->from('job_posts as jp');
		$this->db->where('jp.status',1);
		$this->db->group_by('jp.category');
		return $this->db->get()->result_array();  
	 }
	 // check wallet amount 
	 public  function check_wallet_amount($a_u_id){
		$this->db->select('a_u_id,remaining_wallet_amount')->from('appointment_users');
		$this->db->where('a_u_id',$a_u_id);
		return $this->db->get()->row_array(); 
	 }
	 
	 public  function check_post_appiled($a_u_id,$post_id){
		$this->db->select('u_a_p_id')->from('user_appiled_post_list');
		$this->db->where('created_by',$a_u_id);
		$this->db->where('post_id',$post_id);
		return $this->db->get()->row_array();  
	 }
	 
	 public function save_resume($data){
		 $this->db->insert('user_appiled_post_list',$data);
		 return $this->db->insert_id();
	}
	
	public  function get_job_applied_joblist($a_u_id){
		$this->db->select('u.u_a_p_id,u.cname,u.resume,u.total_exp,u.created_at,j.district,j.qualifications,j.title,j.category')->from('user_appiled_post_list as u');
		$this->db->join('job_posts as j','j.j_p_id=u.post_id','left');
		$this->db->where('j.created_by',$a_u_id);
		return $this->db->get()->result_array();  
	}
	public  function update_comment($u_a_p_id,$data){
		$this->db->where('u_a_p_id',$u_a_p_id);
		return $this->db->update('user_appiled_post_list',$data);	
	}
	
}