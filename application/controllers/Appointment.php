<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Appointment extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Appointment_model');
		
	}
	public function index()
	{	
		if($this->session->userdata('app_user'))
		{	
			$data['city_list']=$this->Appointment_model->get_hospital_city_list();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/book_appointment',$data);
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
				
	}
	
	public function get_consultation_fee(){
					$post=$this->input->post();
					//echo '<pre>';print_r($post);exit;
					$details=$this->Appointment_model->get_doctor_consultation_fee($post['a_id']);
					//echo '<pre>';print_r($details);exit;
						if(count($details) > 0)
						{
						$data['msg']=1;
						$data['fee']=$details['consultation_fee'];
						echo json_encode($data);exit;	
						}else{
							$data['msg']=2;
							$data['fee']='';
							echo json_encode($data);exit;
						}
	}
	public function get_hospital_list(){
					$post=$this->input->post();
					//echo '<pre>';print_r($post);exit;
					$details=$this->Appointment_model->get_hospital_list($post['city']);
					//echo '<pre>';print_r($details);exit;
						if(count($details) > 0)
						{
						$data['msg']=1;
						$data['list']=$details;
						echo json_encode($data);exit;	
						}else{
							$data['msg']=2;
							echo json_encode($data);exit;
						}
	}
	public function get_hospital_department(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$details=$this->Appointment_model->get_hospital_departments($post['h_id']);
		//echo '<pre>';print_r($details);exit;
			if(count($details) > 0)
			{
			$data['msg']=1;
			$data['list']=$details;
			echo json_encode($data);exit;	
			}else{
				$data['msg']=2;
				echo json_encode($data);exit;
			}
	}	
	public function get_hospital_department_specilist(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$details=$this->Appointment_model->get_hospital_department_specilist($post['d_id'],$post['h_id']);
		//echo '<pre>';print_r($details);exit;
			if(count($details) > 0)
			{
			$data['msg']=1;
			$data['list']=$details;
			echo json_encode($data);exit;	
			}else{
				$data['msg']=2;
				echo json_encode($data);exit;
			}
	}
	public function get_hospital_specilist_doctor(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$details=$this->Appointment_model->get_hospital_doctors($post['s_id'],$post['h_id']);
		//echo '<pre>';print_r($details);exit;
			if(count($details) > 0)
			{
			 $data['msg']=1;
			 $data['list']=$details;
			 echo json_encode($data);exit;	
			}else{
				$data['msg']=2;
				echo json_encode($data);exit;
			}
	}
	public function get_doctors_time_list(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$doctor_list=$this->Appointment_model->get_doctors_time_list($post['d_id'],$post['h_id']);
		
		if(count($doctor_list)>0){
			$time_list=array("12:00 am","12:30 am","01:00 am","01:30 am","02:00 am","02:30 am","03:00 am","03:30 am","04:00 am","04:30 am","05:00 am","05:30 am","06:00 am","06:30 am","07:00 am","07:30 am","08:00 am","08:30 am","09:00 am","09:30 am","10:00 am","10:30 am","11:00 am","11:30 am","12:00 pm","12:30 pm","01:00 pm","01:30 pm","02:00 pm","02:30 pm","03:00 pm","03:30 pm","04:00 pm","04:30 pm","05:00 pm","05:30 pm","06:00 pm","06:30 pm","07:00 pm","07:30 pm","08:00 pm","08:30 pm","09:00 pm","09:30 pm","10:00 pm","10:30 pm","11:00 pm","11:30 pm");
			$start_date =$doctor_list['in_time'];
			$end_date = $doctor_list['out_time'];
			$interval = '30 mins';
			$format = '12';
			$startTime = strtotime($start_date); 
			$endTime   = strtotime($end_date);
			$returnTimeFormat = ($format == '12')?'h:i a':'G:i:s';

			$current   = time(); 
			$addTime   = strtotime('+'.$interval, $current); 
			$diff      = $addTime - $current;

			$times = array(); 
			while ($startTime < $endTime) { 
			$times[] = date($returnTimeFormat, $startTime); 
			$startTime += $diff; 
			} 
			$times[] = date($returnTimeFormat, $startTime);
			
	
		}
	
		//echo '<pre>';print_r($times);exit;
			if(count($times) > 0)
			{
			 $data['msg']=1;
			 $data['list']=$times;
			 echo json_encode($data);exit;	
			}else{
				$data['msg']=2;
				echo json_encode($data);exit;
			}
		}
	
	public  function post(){
		if($this->session->userdata('app_user'))
			{
				$app_user=$this->session->userdata('app_user');
					$post=$this->input->post();
					//echo '<pre>';print_r($post);exit;
					$user_details=$this->Appointment_model->get_user_details($app_user['a_u_id']);
					//$dat=explode('/',$post['date']);
					$add=array(
					'hos_id'=>isset($post['hospital_id'])?$post['hospital_id']:'',
					'city'=>isset($post['city'])?$post['city']:'',
					'patinet_name'=>isset($post['name'])?strtoupper($post['name']):'',
					'age'=>isset($post['age'])?$post['age']:'',
					'mobile'=>isset($user_details['mobile'])?$user_details['mobile']:'',
					'department'=>isset($post['department'])?$post['department']:'',
					'specialist'=>isset($post['specilist'])?$post['specilist']:'',
					'doctor_id'=>isset($post['doctor_id'])?$post['doctor_id']:'',
					'date'=>isset($post['date'])?$post['date']:'',
					'time'=>isset($post['time'])?$post['time']:'',
					'status'=>0,
					'create_at'=>date('Y-m-d H:i:s'),
					'create_by'=>$app_user['a_u_id'],
					'coming_through'=>0,
					);
					//echo '<pre>';print_r($add);exit;
					$save=$this->Appointment_model->save_appointments($add);
					if(count($save)>0){
							$this->session->set_flashdata('success',"Appointment successfully added");
							redirect('appointment/confirmation/'.base64_encode($save));
						}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('appointment');
						}
					//echo '<pre>';print_r($add);exit;
				
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('users/login');
			}
	}
	public  function confirmation(){
		if($this->session->userdata('app_user'))
			{
				$appointment_id=base64_decode($this->uri->segment(3));
				if($appointment_id!=''){
					$data['details']=$this->Appointment_model->get_appointment_confirmation_details($appointment_id);
					$this->load->view('html/appointment_confrimation',$data);
					$this->load->view('html/footer');
					//echo '<pre>';print_r($data);exit;
				}else{
					$this->session->set_flashdata('error',"you have no permission's to  access");
					redirect('dashboard');
				}
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('users/login');
			}
	}
	public  function success(){
		if($this->session->userdata('app_user'))
			{
				$appointment_id=base64_decode($this->uri->segment(3));
				if($appointment_id!=''){
					$update=array('status'=>0);
					$update_status=$this->Appointment_model->update_appointment_status($appointment_id,$update);
					if(count($update_status)>0){
							$data['details']=$this->Appointment_model->get_appointment_confirmation_details($appointment_id);
							$this->load->view('html/appointment_success',$data);
							$this->load->view('html/footer');
					}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('appointment/confirmation/'.base64_encode($appointment_id));
					}
					
					//echo '<pre>';print_r($data);exit;
				}else{
					$this->session->set_flashdata('error',"you have no permission's to  access");
					redirect('dashboard');
				}
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('users/login');
			}
	}
	public  function lists(){
		if($this->session->userdata('app_user'))
			{
					$user_details=$this->session->userdata('app_user');
					$data['app_list']=$this->Appointment_model->get_user_appointment_list($user_details['a_u_id']);
					$this->load->view('html/appointment_list',$data);
					$this->load->view('html/footer');
					//echo '<pre>';print_r($data);exit;
				
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('users/login');
			}
	}
	public function edit()
	{	
		if($this->session->userdata('app_user'))
		{	
			
				$appointment_id=base64_decode($this->uri->segment(3));
				if($appointment_id!=''){
					$data['details']=$this->Appointment_model->get_appointment_confirmation_details($appointment_id);
					$data['city_list']=$this->Appointment_model->get_hospital_city_list();
					$data['hospital_list']=$this->Appointment_model->get_hospital_list($data['details']['city']);
					$data['department_list']=$this->Appointment_model->get_hospital_departments($data['details']['hos_id']);
					$data['specialist_list']=$this->Appointment_model->get_hospital_department_specilist($data['details']['department'],$data['details']['hos_id']);
					$data['doctor_list']=$this->Appointment_model->get_hospital_doctors($data['details']['specialist'],$data['details']['hos_id']);
					//echo '<pre>';print_r($data);exit;
					$this->load->view('html/edit_appointment',$data);
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you have no permission's to  access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error',"Please Login/Register, to continue");
			redirect('users/login');
		}
				
	}
	
	public  function editpost(){
		
		if($this->session->userdata('app_user'))
			{
				$app_user=$this->session->userdata('app_user');
					$post=$this->input->post();
					//echo '<pre>';print_r($post);exit;
					$user_details=$this->Appointment_model->get_user_details($app_user['a_u_id']);
					$add=array(
					'hos_id'=>isset($post['hospital_id'])?$post['hospital_id']:'',
					'city'=>isset($post['city'])?$post['city']:'',
					'patinet_name'=>isset($post['name'])?strtoupper($post['name']):'',
					'age'=>isset($post['age'])?$post['age']:'',
					'mobile'=>isset($user_details['mobile'])?$user_details['mobile']:'',
					'department'=>isset($post['department'])?$post['department']:'',
					'specialist'=>isset($post['specilist'])?$post['specilist']:'',
					'doctor_id'=>isset($post['doctor_id'])?$post['doctor_id']:'',
					'date'=>isset($post['date'])?$post['date']:'',
					'time'=>isset($post['time'])?$post['time']:'',
					'status'=>0,
					'create_at'=>date('Y-m-d H:i:s'),
					'create_by'=>$app_user['a_u_id'],
					'coming_through'=>0,
					);
					//echo '<pre>';print_r($add);exit;
					$update=$this->Appointment_model->update_appointments_details($post['a_id'],$add);
					if(count($update)>0){
							$this->session->set_flashdata('success',"Appointment successfully updated");
							redirect('appointment/confirmation/'.base64_encode($post['a_id']));
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('appointment/confirmation/'.base64_encode($post['a_id']));
						}
					//echo '<pre>';print_r($add);exit;
				
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('users/login');
			}
		
	}
	
	
	
	
	
	
}
