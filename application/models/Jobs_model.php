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
		$this->db->select('j_p_id,title,category,qualifications,experience,district,last_to_apply,status')->from('job_posts');
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
		$this->db->select('( jp.created_at ) as df_time,jp.j_p_id,jp.description,jp.category,jp.title,jp.qualifications,jp.experience,jp.district,jp.last_to_apply,jp.status,au.name as postedby')->from('job_posts as jp');
		$this->db->join('appointment_users as au','au.a_u_id=jp.created_by','left');
		if(isset($type) && $type!=''){
			$this->db->where('jp.category',$type);
		}
		$this->db->where('jp.status',1);
		$this->db->where('jp.last_to_apply >=',date('Y-m-d'));
		return $this->db->get()->result_array(); 
	 }
	 
	 public function get_all_jobs_category_joblist(){
		$this->db->select('count(jp.j_p_id) as cnt ,category')->from('job_posts as jp');
		$this->db->where('jp.status',1);
		$this->db->group_by('jp.category');
		$this->db->where('jp.last_to_apply >=',date('Y-m-d'));
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
		$this->db->select('u.u_a_p_id,u.user_id,u.post_id,u.resume,as.name,u.created_at,j.title,j.category,j.qualifications,j.experience,j.district')->from('user_appiled_post_list as u');
		$this->db->join('job_posts as j','j.j_p_id=u.post_id','left');
		$this->db->join('appointment_users as as','as.a_u_id=u.user_id','left');
		$this->db->where('j.created_by',$a_u_id);
		$this->db->where('u.status',0);
		return $this->db->get()->result_array();  
	}
	public  function get_job_user_applied_joblist($a_u_id){
		$this->db->select('u.u_a_p_id,u.user_id,u.status,u.post_id,u.resume,as.name,u.created_at,j.title,j.category,j.qualifications,j.experience,j.district')->from('user_appiled_post_list as u');
		$this->db->join('job_posts as j','j.j_p_id=u.post_id','left');
		$this->db->join('appointment_users as as','as.a_u_id=u.user_id','left');
		$this->db->where('u.user_id',$a_u_id);
		return $this->db->get()->result_array();  
	}
	public  function get_job_applied_joblist_status($a_u_id){
		$this->db->select('u.u_a_p_id,u.status,u.resume,as.name,u.created_at,j.title,j.category,j.qualifications,j.experience,j.district')->from('user_appiled_post_list as u');
		$this->db->join('job_posts as j','j.j_p_id=u.post_id','left');
		$this->db->join('appointment_users as as','as.a_u_id=u.user_id','left');
		$this->db->where('j.created_by',$a_u_id);
		$this->db->where('u.status !=',0);
		return $this->db->get()->result_array();  
	}
	public  function update_comment($u_a_p_id,$data){
		$this->db->where('u_a_p_id',$u_a_p_id);
		return $this->db->update('user_appiled_post_list',$data);	
	}
	//dashboard
	public function get_job_applied_user_list($a_u_id){
		$this->db->select('count(u_a_p_id) as cnt')->from('user_appiled_post_list as u');
		$this->db->join('job_posts as j','j.j_p_id=u.post_id','left');
		$this->db->where('j.created_by',$a_u_id);
		return $this->db->get()->row_array();  
	}
	public function get_post_list_list($a_u_id){
		$this->db->select('count(j_p_id) as cnt')->from('job_posts');
		$this->db->where('created_by',$a_u_id);
		return $this->db->get()->row_array();  
	}
	public function save_resume_cnt($data){
		$this->db->insert('resume_cnt_list',$data);
		return $this->db->insert_id();
	}
	public  function check_resumt_cnt($u_id,$p_id,$a_u_id){
		$this->db->select('r_c_id')->from('resume_cnt_list');
		$this->db->where('r_user_id',$u_id);
		$this->db->where('post_id',$p_id);
		$this->db->where('created_by',$a_u_id);
		return $this->db->get()->row_array(); 	
	}
	public  function get_resumes_cnt($id){
		$this->db->select('sum(resume_cnt) as cnt')->from('plan_payments');
		$this->db->where('created_by',$id);
		return $this->db->get()->row_array();
	}
	public  function get_resumes_count($id){
		$this->db->select('count(r_c_id) as cnt')->from('resume_cnt_list');
		$this->db->where('created_by',$id);
		return $this->db->get()->row_array();
	}
	
	
	/* employer should not be able to apply for job*/
	public  function check_empoyee_applyed_jobs($a_u_id){
		$this->db->select('role,a_u_id')->from('appointment_users');
		$this->db->where('a_u_id',$a_u_id);
		$this->db->where('appointment_users.role',2);
        return $this->db->get()->row_array();	
	}
	/* admin should not be able to apply for job*/
	public function check_admin_applyed_jobs($a_u_id){
	$this->db->select('role,a_u_id')->from('appointment_users');
		$this->db->where('a_u_id',$a_u_id);
		$this->db->where('appointment_users.role',3);
        return $this->db->get()->row_array();	
	}
	public function check_last_date_applyed_jobs($j_p_id){
		$this->db->select('j_p_id,last_to_apply')->from('job_posts');
		$this->db->where('j_p_id',$j_p_id);
		$this->db->where('job_posts.status',1);
        return $this->db->get()->row_array();	
	}
	public  function get_plans_details($a_id){
		$this->db->select('j.p_type,j.p_name,j.no_of_resume_view,pp.user_id,pp.plan_id,pp.p_amt,pp.resume_cnt,pp.created_at')->from('plan_payments as pp');
		$this->db->join('job_plans as j','j.j_p_id=pp.plan_id','left');
		$this->db->where('user_id',$a_id);
        return $this->db->get()->result_array();
	}
	public  function get_resume_cnt(){
		
	}
	
	
	
	
	
}