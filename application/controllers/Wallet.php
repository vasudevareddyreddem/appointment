<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Wallet extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Appointment_model');
		$this->load->model('Wallet_model');
	}
    
	public function index(){
		if($this->session->userdata('app_user'))
            {
					$userdata=$this->session->userdata('app_user');
					
					$data['wallet_details']=$this->Wallet_model->get_user_wallet_details($userdata['a_u_id']);
					$data['appoinment_list']=$this->Wallet_model->get_user_appointment_list($userdata['a_u_id']);
					$data['wallet_history_list']=$this->Wallet_model->get_all_wallet_history($userdata['a_u_id']);
					$data['ip_couponcode_list']=$this->Wallet_model->get_ip_coupon_code_list($userdata['a_u_id']);
					$data['lab_couponcode_list']=$this->Wallet_model->get_lab_coupon_code_list($userdata['a_u_id']);
					$data['city_list']=$this->Appointment_model->get_hospital_city_list();
					$data['tab']=base64_decode($this->uri->segment(3));
					//echo '<pre>';print_r($data['lab_couponcode_list']);exit;
					//echo '<pre>';print_r($data);exit;
					$this->load->view('html/wallet',$data);
					$this->load->view('html/footer');	
			}
	}
	public function generatecoupon(){
		if($this->session->userdata('app_user'))
            {
				$appoinment_id=base64_decode($this->uri->segment(3));
				$userdata=$this->session->userdata('app_user');
				$appoinment_details=$this->Wallet_model->get_appointment_details($appoinment_id);
				$hos_name=mb_substr($appoinment_details['hos_bas_name'], 0, 2);
				$hos_id=$appoinment_details['hos_id'];
				$op='op';
				$coupon_code=$hos_name.$hos_id.$op.$appoinment_id;
				$wallet_amt_list=$this->Users_model->get_wallet_amount();
				$add=array(
				'hos_id'=>isset($appoinment_details['hos_id'])?$appoinment_details['hos_id']:'',
				'appointment_id'=>isset($appoinment_id)?$appoinment_id:'',
				'couponcode_name'=>isset($coupon_code)?$coupon_code:'',
				'ip_amount_percentage'=>isset($wallet_amt_list['ip_amount_percentage'])?$wallet_amt_list['ip_amount_percentage']:'',
				'op_amount_percentage'=>isset($wallet_amt_list['op_amount_percentage'])?$wallet_amt_list['op_amount_percentage']:'',
				'lab_amount_percentage'=>isset($wallet_amt_list['lab_amount_percentage'])?$wallet_amt_list['lab_amount_percentage']:'',
				'statu'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$userdata['a_u_id'],
				);
				//echo '<pre>';print_r($wallet_amt_list);exit;
				$check=$this->Wallet_model->check_couponcode_exists_ornot($appoinment_id,$appoinment_details['hos_id']);
				if(count($check)>0){
					$this->session->set_flashdata('error',"Your are already created coupon code. Use below code ".$check['couponcode_name']);
					redirect('wallet/index/');
				}else{
					$save=$this->Wallet_model->save_couponcode($add);
					if(count($save)>0){
						$this->session->set_flashdata('success',"Coupon code successfully created. Use below code ".$coupon_code);
						redirect('wallet/index/');
					}else{
						$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
						redirect('wallet/index/');
					}
				}
				
				//echo '<pre>';print_r($add);exit;
					
			}
	}
	public function ipcouponcode(){
		if($this->session->userdata('app_user'))
            {
				$post=$this->input->post();
				$time=time();
				$userdata=$this->session->userdata('app_user');
				$appoinment_details=$this->Wallet_model->hospital_details($post['hospital_id']);
				$hos_name=mb_substr($appoinment_details['hos_bas_name'], 0, 2);
				$hos_id=$post['hospital_id'];
				if($post['type']==2){
					$ip='Ip';
				}else{
					$ip='Lab';
				}
				
				$coupon_code=$hos_name.$hos_id.$ip.$time;
				$wallet_amt_list=$this->Users_model->get_wallet_amount();
				$add=array(
				'hos_id'=>isset($post['hospital_id'])?$post['hospital_id']:'',
				'appointment_id'=>isset($appoinment_id)?$appoinment_id:'',
				'couponcode_name'=>isset($coupon_code)?$coupon_code:'',
				'ip_amount_percentage'=>isset($wallet_amt_list['ip_amount_percentage'])?$wallet_amt_list['ip_amount_percentage']:'',
				'op_amount_percentage'=>isset($wallet_amt_list['op_amount_percentage'])?$wallet_amt_list['op_amount_percentage']:'',
				'lab_amount_percentage'=>isset($wallet_amt_list['lab_amount_percentage'])?$wallet_amt_list['lab_amount_percentage']:'',
				'statu'=>1,
				//'type_id'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$userdata['a_u_id'],
				'type'=>isset($post['type'])?$post['type']:'',
				);
				//echo '<pre>';print_r($add);
				//echo '<pre>';print_r($post);
				//exit;
				$check=$this->Wallet_model->check_ip_couponcode_exists_ornot($post['hospital_id'],$coupon_code);
				if(count($check)>0){
					$this->session->set_flashdata('error',"Your are already created coupon code. Use below code ".$check['couponcode_name']);
					redirect('wallet/index/'.base64_encode($post['tab']));
				}else{
					$save=$this->Wallet_model->save_couponcode($add);
					if(count($save)>0){
						$this->session->set_flashdata('success',"Coupon code successfully created. Use below code ".$coupon_code);
					redirect('wallet/index/'.base64_encode($post['tab']));
					}else{
						$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
						redirect('wallet/index/'.base64_encode($post['tab']));

					}
				}
				
				//echo '<pre>';print_r($add);exit;
					
			}
	}
	public  function get_coupon_code(){
		$post=$this->input->post();
		$coupon_code=$this->Wallet_model->get_coupon_code_details($post['b_id']);

		if(count($coupon_code)>0){
			$times=date(' Y-m-d h:i:s a ', strtotime($coupon_code['created_at']));
			$data['msg']=1;
			$data['coupon_code_name']=$coupon_code['couponcode_name'];
			$data['coupon_c_time']=$times;
			echo json_encode($data);exit;
		}else{
			$data['msg']=0;
			$data['coupon_code_name']='No coupon code';
			$data['coupon_c_time']='';
			echo json_encode($data);exit;
		}
		
		
	}
	
}
