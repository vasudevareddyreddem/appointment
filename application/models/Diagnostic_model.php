<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagnostic_model extends CI_Model 

{
	
	
	function __construct() 
	{
		parent::__construct();
		$this->db2 = $this->load->database('another', TRUE);
	}
	
	public  function get_diagnostic_city_list(){
		$this->db2->select('city')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->group_by('city');		
        return $this->db2->get()->result_array();
	}
	public function get_packages_test_lists(){
		$this->db2->select('*')->from('test_packages');
		$this->db2->where('status',1);
		$return=$this->db2->get()->result_array();
		foreach($return as $lis){
			$test_list=$this->get_package_test_name($lis['l_t_p_id']);
			//echo $this->db->last_query();
			//echo '<pre>';print_r($test_list);exit;
			$data[$lis['l_t_p_id']]=$lis;
			$data[$lis['l_t_p_id']]['package_test_list']=$test_list;
		}
		if(!empty($data)){
			return $data;
			
		}
	}
	
	public  function get_package_test_name($package_name){
		$this->db2->select('test_packages.test_package_name,packages_test_list.*,lab_tests.test_name,lab_tests.test_type,lab_tests.test_duartion')->from('packages_test_list');
		$this->db2->join('lab_tests', 'lab_tests.l_id = packages_test_list.test_id', 'left');
		$this->db2->join('test_packages', 'test_packages.l_t_p_id = packages_test_list.l_t_p_id', 'left');
		$this->db2->where('packages_test_list.status !=',2);
		$this->db2->where('packages_test_list.l_t_p_id',$package_name);
		return $this->db2->get()->result_array();
	}
	
	public  function get_loication_wise_lab_list($location){
		$this->db2->select('*')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->where('city',$location);		
        return $this->db2->get()->result_array();
	}
	public  function get_search_wise_test_list($test){
		$this->db2->select('*')->from('lab_tests');
		$this->db2->where('status',1);		
		$this->db2->where('test_name',$test);		
        return $this->db2->get()->result_array();
	}
	public  function get_search_wise_lab_list($name){
		$this->db2->select('*')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->like('name',$name);		
        return $this->db2->get()->result_array();
	}
	public  function get_loication_and_lab_wise_lab_list($city,$test){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->where('role',2);		
		$this->db2->where('city',$city);		
		$this->db2->like('name',$test);
        return $this->db2->get()->result_array();
	}
	public  function get_loication_and_lab_wise_testy_list($city,$test){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('lab_tests');
		$this->db2->join('admin', 'admin.a_id = lab_tests.lab_id', 'left');
		$this->db2->where('admin.status',1);		
		$this->db2->where('admin.role',2);		
		$this->db2->where('admin.city',$city);		
		$this->db2->like('lab_tests.test_name',$test);
        return $this->db2->get()->result_array();
	}
	public  function get_all_loication_wise_lab_list($city){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->where('role',2);		
		$this->db2->like('city',$city);
        return $this->db2->get()->result_array();
	}
	public  function get_all_test_names_list($city){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('lab_tests');
		$this->db2->join('admin', 'admin.a_id = lab_tests.lab_id', 'left');
		$this->db2->where('admin.status',1);		
		$this->db2->where('admin.role',2);		
		$this->db2->like('admin.city',$city);
        return $this->db2->get()->result_array();
	}
	public  function get_test_name_list($test){
		$this->db2->select('admin.name,admin.a_id,admin.profile_pic')->from('lab_tests');
		$this->db2->join('admin', 'admin.a_id = lab_tests.lab_id', 'left');
		$this->db2->where('admin.status',1);		
		$this->db2->where('admin.role',2);		
		$this->db2->like('lab_tests.test_name',$test);
        return $this->db2->get()->result_array();
	}
	public  function get_lab_name_list($name){
		$this->db2->select('admin.name,admin.a_id,profile_pic')->from('admin');
		$this->db2->where('status',1);		
		$this->db2->where('role',2);		
		$this->db2->like('name',$test);
        return $this->db2->get()->result_array();
	}
	
	/* lab test  names purpose*/
	
	public  function get_lab_test_lists($l_id){
		$this->db2->select('test_name,lab_id,l_id,test_duartion,test_amount,test_type')->from('lab_tests');
		$this->db2->where('status',1);		
		$this->db2->where('lab_id',$l_id);		
        return $this->db2->get()->result_array();
	}
	
	public  function get_diagnostic_lab_deatils($a_id){
		$this->db2->select('a_id,role,name,email,mobile,altmobile,gstin,address1,address2,city,state,country,zipcode,profile_pic,status,created_at')->from('admin');
		$this->db2->where('a_id',$a_id);		
        $return=$this->db2->get()->row_array();
		$test_names_list=$this->get_lab_test_lists($return['a_id']);
		$data=$return;
		$data['test_names']=$test_names_list;
		if(!empty($data)){
			return $data;	
		}
	}
	
	public  function save_item_cart($data){
		$this->db2->insert('lab_cart',$data);
		return $this->db2->insert_id();
	}
	
	public  function get_cart_item_list($a_id){
		$this->db2->select('lab_tests.lab_id,lab_cart.l_id,lab_cart.amount,lab_cart.org_amount,lab_cart.percentage,lab_cart.package_id,lab_cart.type,lab_cart.delivery_charge,lab_cart.test_id,lab_tests.test_type,lab_tests.delivery_charge,lab_tests.test_name,lab_tests.test_duartion,lab_tests.test_amount,lab_cart.c_id,admin.name')->from('lab_cart');
		$this->db2->join('lab_tests', 'lab_tests.l_id = lab_cart.test_id', 'left');
		$this->db2->join('admin', 'admin.a_id = lab_tests.lab_id', 'left');
		$this->db2->where('lab_cart.a_id',$a_id);		
        return $this->db2->get()->result_array();
	}
	public  function get_package_cart_item_list($a_id){
		$this->db2->select('lab_tests.lab_id,lab_cart.l_id,lab_cart.delivery_charge,lab_cart.test_id,lab_tests.test_type,lab_tests.delivery_charge,lab_tests.test_name,lab_tests.test_duartion,lab_tests.test_amount,lab_cart.c_id,admin.name')->from('lab_cart');
		$this->db2->join('lab_tests', 'lab_tests.l_id = lab_cart.test_id', 'left');
		$this->db2->join('admin', 'admin.a_id = lab_tests.lab_id', 'left');
		$this->db2->where('lab_cart.a_id',$a_id);		
		$this->db2->where('lab_cart.package_id !=',0);		
        return $this->db2->get()->result_array();
	}
	
	public  function check_item_exits($a_u_id,$test_id,$lab_id){
		$this->db2->select('*')->from('lab_cart');
		$this->db2->where('a_id',$a_u_id);		
		$this->db2->where('test_id',$test_id);		
		$this->db2->like('l_id',$lab_id);
        return $this->db2->get()->row_array();
	}
	
	public  function removecart_item_details($a_id,$c_id){
		$this->db2->where('c_id',$c_id);	
		$this->db2->where('a_id',$a_id);
		return 	$this->db2->delete('lab_cart');	
		
	}
	/* lab test  names purpose*/
	
	/*  checkout */
	
	public function save_patient_details($data){
		$this->db2->insert('lab_patient_details',$data);
		return $this->db2->insert_id();
	}
	public function save_patient_billing($data){
		$this->db2->insert('lab_patient_billing',$data);
		return $this->db2->insert_id();
	}
	public  function get_customer_last_lab_id($a_id){
		$this->db2->select('l_id')->from('lab_cart');
		$this->db2->where('a_id',$a_id);		
		$this->db2->order_by('c_id',"desc");		
        return $this->db2->get()->row_array();	
	}
	/*  checkout */
	
	/* billing  address */
	public  function get_patient_billing_details($b_id,$a_id){
		$this->db2->select('*')->from('lab_patient_billing');
		$this->db2->where('l_t_b_id',$b_id);		
		$this->db2->where('a_id',$a_id);		
        return $this->db2->get()->row_array();
	}
	public  function get_patient_details($a_id){
		$this->db2->select('*')->from('lab_patient_details');
		$this->db2->where('a_id',$a_id);		
		$this->db2->order_by('l_t_a_id','desc');	
		$this->db2->limit(1);
        return $this->db2->get()->row_array();
	}
	public  function get_user_details($a_id){
		$this->db2->select('name,email,mobile,address1 as address')->from('admin');
		$this->db2->where('a_id',$a_id);		
        return $this->db2->get()->row_array();
	}
	
	/* billing  address */
	
	/* orders*/
	public  function save_orders($data){
		$this->db2->insert('lab_orders',$data);
		return $this->db2->insert_id();
		
	}
	public  function save_order_items($data){
		$this->db2->insert('lab_order_items',$data);
		return $this->db2->insert_id();
		
	}
	public function delete_cart_items_data($c_id){
		$this->db2->where('c_id',$c_id);
		return $this->db2->delete('lab_cart');
	}
	/* orders*/
	/* order success*/
	public  function get_order_patient_detail($order_id){
		$this->db2->select('lab_patient_details.*')->from('lab_orders');
		$this->db2->join('lab_patient_details', 'lab_patient_details.l_t_a_id = lab_orders.patient_details_id', 'left');
		$this->db2->where('lab_orders.r_id',$order_id);		
        return $this->db2->get()->row_array();	
	}
	public  function get_order_billing_address($order_id){
		$this->db2->select('lab_patient_billing.*')->from('lab_orders');
		$this->db2->join('lab_patient_billing', 'lab_patient_billing.l_t_b_id = lab_orders.billing_id', 'left');
		$this->db2->where('lab_orders.r_id',$order_id);		
        return $this->db2->get()->row_array();	
	}
	public  function get_order_test_detail($order_id){
		$this->db2->select('lab_order_items.*,lab_tests.test_name,lab_tests.test_duartion')->from('lab_orders');
		$this->db2->join('lab_order_items', 'lab_order_items.order_id = lab_orders.r_id', 'left');
		$this->db2->join('lab_tests', 'lab_tests.l_id = lab_order_items.test_id', 'left');
		$this->db2->where('lab_orders.r_id',$order_id);		
        return $this->db2->get()->result_array();	
	}
	
	/* patient  details purpose*/
	public  function get_current_patient_details($patient_id){
		$this->db2->select('lab_patient_details.*')->from('lab_patient_details');
		$this->db2->where('lab_patient_details.l_t_a_id',$patient_id);		
        return $this->db2->get()->row_array();
	}
	
	public  function update_patient_details($p_b_id,$data){
		$this->db2->where('l_t_a_id',$p_b_id);
		return $this->db2->update('lab_patient_details',$data);
	}
	
	public  function get_billing_address_list($a_id){
		$this->db2->select('*')->from('lab_patient_billing');
		$this->db2->where('lab_patient_billing.created_by',$a_id);		
        return $this->db2->get()->result_array();
	}
	  /* order list purpose */
	  public  function get_customer_order_list($a_id){
		 $this->db2->select('lab_orders.created_at,lab_orders.payment_type,lab_order_items.delivery_charge,lab_order_items.amount,lab_tests.test_name,lab_tests.test_duartion,test_packages.test_package_name,lab_patient_details.name as p_name,lab_patient_details.mobile,')->from('lab_order_items');
		$this->db2->join('lab_orders', 'lab_orders.r_id = lab_order_items.order_id', 'left');
		$this->db2->join('lab_tests', 'lab_tests.l_id = lab_order_items.test_id', 'left');
		$this->db2->join('test_packages', 'test_packages.l_t_p_id = lab_order_items.package_id', 'left');
		$this->db2->join('lab_patient_details', 'lab_patient_details.l_t_a_id = lab_orders.patient_details_id', 'left');
		$this->db2->where('lab_order_items.created_by',$a_id);		
        return $this->db2->get()->result_array();	 
	  }
	  /* order list purpose */
	
	/* cart page  details*/
	public function get_package_details_list($l_t_p_id){
		$this->db2->select('*')->from('test_packages');
		$this->db2->where('l_t_p_id',$l_t_p_id);
		$return=$this->db2->get()->row_array();
			$test_list=$this->get_package_details($return['l_t_p_id']);
			$data=$return;
			$data['package_test_list']=$test_list;
		
		if(!empty($data)){
			return $data;
			
		}
	}
	public  function get_package_details($pack_id){
		$this->db2->select('packages_test_list.test_id,packages_test_list.test_id,lab_tests.test_name,lab_tests.test_type,lab_tests.test_duartion')->from('packages_test_list');
		$this->db2->join('lab_tests', 'lab_tests.l_id = packages_test_list.test_id', 'left');
		$this->db2->where('packages_test_list.status !=',2);
		$this->db2->where('packages_test_list.l_t_p_id',$pack_id);
		return $this->db2->get()->result_array();
	}
	public  function get_cart_package_details_list($a_id){
		$this->db2->select("lab_cart.*,lab_tests.test_name,test_packages.test_package_name")->from('lab_cart');
		$this->db2->join('lab_tests', 'lab_tests.l_id = lab_cart.test_id', 'left');
		$this->db2->join('test_packages', 'test_packages.l_t_p_id = lab_cart.package_id', 'left');

		$this->db2->where('lab_cart.a_id',$a_id);
		$return=$this->db2->get()->result_array();
		foreach($return as $lis){
			if($lis['type']==0){
				$test_list=$this->get_package_test_name($lis['package_id']);
			}
			//echo $this->db->last_query();
			//echo '<pre>';print_r($test_list);exit;
			$data[$lis['c_id']]=$lis;
			$data[$lis['c_id']]['package_test_list']=isset($test_list)?$test_list:'';
		}

		if(!empty($data)){
			return $data;
			
		}
	}


/* package cart */
public  function check_package_exist($a_id,$pack){
		$this->db2->select('*')->from('lab_cart');
		$this->db2->where('a_id',$a_id);		
		$this->db2->where('package_id',$pack);		
        return $this->db2->get()->row_array();
}	

public  function get_cart_package_item_list($a_id){
		$this->db2->select('*')->from('lab_cart');
		$this->db2->where('lab_cart.a_id',$a_id);		
		$this->db2->where('lab_cart.package_id !=',0);		
        return $this->db2->get()->result_array();
	}
/* package cart */	

 public  function get_lab_test_details($l_id){
	$this->db2->select('*')->from('lab_tests');
	$this->db2->where('l_id',$l_id);		
	return $this->db2->get()->row_array();
 }
	

}