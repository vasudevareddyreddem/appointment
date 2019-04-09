<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->model('Diagnosticapp_model');
    	$this->load->model('Api_user_checking_model');
      	$this->load->model('api_users_model');
		 $this->db2 = $this->load->database('another', TRUE);

    }
    public function get_cities_post(){
      $user_id=$this->post('user_id');

    $result= $this->Api_user_checking_model->user_checking($user_id);
    if(count($result)>0){


    }
    else{
      $message = array('status'=>0,'message'=>'Invalid User');
      $this->response($message, REST_Controller::HTTP_OK);


    }


    $res= $this->api_users_model->get_city_list();

    if(count($res)>0){
    $message = array('status'=>1,'message'=>$res);
    $this->response($message, REST_Controller::HTTP_OK);
  }
  $message = array('status'=>0,'message'=>array());
  $this->response($message, REST_Controller::HTTP_OK);

    }
    public function get_pharmcies_post()
    {
      $user_id=$this->post('user_id');
    $result= $this->Api_user_checking_model->user_checking($user_id);
    if(count($result)>0){


    }
    else{
      $message = array('status'=>0,'message'=>'Invalid User');
      $this->response($message, REST_Controller::HTTP_OK);


    }
    $city=$this->post('city');

    $res= $this->api_users_model->get_pharmcies($city);
    if(count($res)>0){
    $message = array('status'=>1,'message'=>$res);
    $this->response($message, REST_Controller::HTTP_OK);
  }
  $message = array('status'=>0,'message'=>array());
  $this->response($message, REST_Controller::HTTP_OK);

    }
    public function get_qrcode_post(){
      $user_id=$this->post('user_id');
      $result= $this->Api_user_checking_model->user_checking($user_id);
      if(count($result)>0){


      }
      else{
        $message = array('status'=>0,'message'=>'Invalid User');
        $this->response($message, REST_Controller::HTTP_OK);
    }
    $phar=$this->post('phar');
      $res= $this->api_users_model->get_qrcode($phar);
      if(count($res)>0){

        $message = array('status'=>1,'path'=>$res);
        $message['image_path']=base_url();
        $this->response($message, REST_Controller::HTTP_OK);
      }

      }
      public function check_wallet_amount_post(){
        $user_id=$this->post('user_id');
        $result= $this->Api_user_checking_model->user_checking($user_id);
        if(count($result)>0){}
        else{
          $message = array('status'=>0,'message'=>'Invalid User');
          $this->response($message, REST_Controller::HTTP_OK);
      }
        $amt=$this->post('amt');
          $res= $this->Api_user_checking_model->amt_checking($user_id,$amt);

          if(count($res)>0){
            $message = array('status'=>1,'message'=>'amount sufficient');
            $this->response($message, REST_Controller::HTTP_OK);
          }
          $message = array('status'=>0,'message'=>'amount not sufficient');
          $this->response($message, REST_Controller::HTTP_OK);


      }
  public function ins_pay_det_post(){
    $user_id=$this->post('user_id');
    $result= $this->Api_user_checking_model->user_checking($user_id);
    if(count($result)>0){}
    else{
      $message = array('status'=>0,'message'=>'Invalid User');
      $this->response($message, REST_Controller::HTTP_OK);
  }
	  $phar=$this->post('phar');
	  $amt=$this->post('amt');
	  $dis_amt=$this->post('dis_amt');

	  $data=array('phar_id'=>$phar,
		'pat_id'=>$user_id,
		'amount'=>$amt,
		'paid_date'=>date('Y-m-d'));
		$res= $this->api_users_model->insert_pay_det($data);
	  if($res==1){
	  $wallet_details=$this->api_users_model->get_wallet_details($user_id);
	  if(count($wallet_details)>0){
		  if($wallet_details['remaining_wallet_amount']>$dis_amt){
				$t_amt=(($wallet_details['remaining_wallet_amount'])-($dis_amt));
				$u_data=array('remaining_wallet_amount'=>$t_amt);
				$this->api_users_model->update_wallet_amt_details($user_id,$u_data);
				//echo $this->db->last_query();exit;
		  }else{
			 $message = array('status'=>1,'message'=>'Wallet having insufficient amount. Please try again');
			$this->response($message, REST_Controller::HTTP_OK); 
		  }
		
	  }
    $message = array('status'=>1,'message'=>'Amount paid successfully');
    $this->response($message, REST_Controller::HTTP_OK);

  }

  $message = array('status'=>0,'message'=>'Amount not paid');
  $this->response($message, REST_Controller::HTTP_OK);

  }
//for lab
public function get_lcities_post(){
  $user_id=$this->post('user_id');
$result= $this->Api_user_checking_model->user_checking($user_id);
if(count($result)>0){


}
else{
  $message = array('status'=>0,'message'=>'Invalid User');
  $this->response($message, REST_Controller::HTTP_OK);


}

$res= $this->api_users_model->get_lcity_list();
if(count($res)>0){
$message = array('status'=>1,'message'=>$res);
$this->response($message, REST_Controller::HTTP_OK);
}
$message = array('status'=>0,'message'=>array());
$this->response($message, REST_Controller::HTTP_OK);

}
public function get_labs_post()
{
  $user_id=$this->post('user_id');
$result= $this->Api_user_checking_model->user_checking($user_id);
if(count($result)>0){


}
else{
  $message = array('status'=>0,'message'=>'Invalid User');
  $this->response($message, REST_Controller::HTTP_OK);


}
$city=$this->post('city');

$res= $this->api_users_model->get_labs($city);
if(count($res)>0){
$message = array('status'=>1,'message'=>$res);
$this->response($message, REST_Controller::HTTP_OK);
}
$message = array('status'=>0,'message'=>array());
$this->response($message, REST_Controller::HTTP_OK);

}
public function  order_medicine_post(){
	$user_id=$this->post('user_id');
	$result= $this->Api_user_checking_model->user_checking($user_id);
	if(count($result)>0){


	}
	else{
	  $message = array('status'=>0,'message'=>'Invalid User');
	  $this->response($message, REST_Controller::HTTP_OK);


	}
	$address=$this->post('address');
	$phar_id=$this->post('phar_id');
	$config['upload_path']          = './assets/medicine_list';
			 $config['allowed_types']        = 'gif|jpg|png';
		   $this->load->library('upload', $config);
	if ( ! $this->upload->do_upload('img',time()))
			 {
					 $error = array('error' => $this->upload->display_errors());

					 $message=array('status'=>0,'message'=>'Image not uploaded try again');

						$this->response($message, REST_Controller::HTTP_OK);

			 }
	 else{
	   $upload_data = $this->upload->data();
				 $img =   $upload_data['file_name'];


	 }
	 $data=array('cust_id'=>$user_id,
	 'phar_id'=>$phar_id,
	 'med_img'=>$img,
	 'address'=>$address,
	 'created_date'=>date('Y-m-d H:i:s'),
	 'created_by'=>$user_id,
	 'status'=>1,

	);
	//echo '<pre>';print_r($data);
	 $res= $this->api_users_model->insert_med_list($data);
	 //echo $this->db->last_query();exit;
	 if(count($res)>0){
	 $message = array('status'=>1,'message'=>'your order is sent ');
	 $this->response($message, REST_Controller::HTTP_OK);
	}else{
	$message = array('status'=>0,'message'=>'your order is not sent ');
	$this->response($message, REST_Controller::HTTP_OK);
	}


}

public  function orders_list_post(){
	 $user_id=$this->post('user_id');
	 if($user_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
	 }
	 $result= $this->Api_user_checking_model->user_checking($user_id);
		if(count($result)>0){
			$order_list=$this->api_users_model->get_order_list($user_id);
			if(count($order_list)>0){
				$message = array('status'=>1,'details'=>$order_list,'path'=>base_url('assets/medicine_list/'),'message'=>'Orders list found');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'user_id'=>$user_id,'message'=>'Orders not found');
				$this->response($message, REST_Controller::HTTP_OK);
			}


		}else{
			$message = array('status'=>0,'message'=>'Invalid User');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public  function orders_details_post(){
	 $user_id=$this->post('user_id');
	 $id=$this->post('id');
	 if($user_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
	 }
	 if($id==''){
			$message = array('status'=>0,'message'=>'Order Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
	 }
	 $result= $this->Api_user_checking_model->user_checking($user_id);
		if(count($result)>0){
			$order_details=$this->api_users_model->get_order_details($id);
			if(count($order_details)>0){
				$message = array('status'=>1,'user_id'=>$user_id,'id'=>$id,'details'=>$order_details,'message'=>'Order details found');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'user_id'=>$user_id,'id'=>$id,'message'=>'Order details not found');
				$this->response($message, REST_Controller::HTTP_OK);
			}


		}else{
			$message = array('status'=>0,'message'=>'Invalid User Id');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public  function order_track_post(){
	 $user_id=$this->post('user_id');
	 $id=$this->post('id');
	 if($user_id==''){
			$message = array('status'=>0,'message'=>'User Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
	 }
	 if($id==''){
			$message = array('status'=>0,'message'=>'Order Id is required');
			$this->response($message, REST_Controller::HTTP_OK);
	 }
	 $result= $this->Api_user_checking_model->user_checking($user_id);
		if(count($result)>0){
			$order_details=$this->api_users_model->get_order_track_details($id,$user_id);
			if(count($order_details)>0){
				
				$message = array('status'=>1,'user_id'=>$user_id,'id'=>$id,'status_msg'=>$order_details['status'],'message'=>'Track order details found');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'user_id'=>$user_id,'id'=>$id,'status_msg'=>'','message'=>'Track order details not found');
				$this->response($message, REST_Controller::HTTP_OK);
			}


		}else{
			$message = array('status'=>0,'message'=>'Invalid User Id');
			$this->response($message, REST_Controller::HTTP_OK);
		}
	}
	public function  scan_qr_code_post(){
		 $qr_code=$this->post('qr_code');
		 $total_amt=$this->post('total_amt');
		 if($qr_code==''){
				$message = array('status'=>0,'message'=>'Qr code is required');
				$this->response($message, REST_Controller::HTTP_OK);
		 }if($total_amt==''){
				$message = array('status'=>0,'message'=>'Total amount is required');
				$this->response($message, REST_Controller::HTTP_OK);
		 }
		 $q_value=explode(',',$qr_code);
		 if(isset($q_value[1]) && $q_value[1]!=''){
			 $details=$this->api_users_model->get_barcode_details($q_value[1]);
			 if(count($details)>0){
				$per=$details['discount_per'];
				$p_val = ($per*$total_amt)/100;  // 3.333..
				$amt_val=(($total_amt)-($p_val));
				$message = array('status'=>1,'details'=>$details,'total_amt'=>strval($amt_val),'dis_amt'=>strval($p_val),'message'=>'Qr Code  details found');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'details'=>(object)array(),'total_amt'=>'','dis_amt'=>'','message'=>'Qr Code not found');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		 }else{
				$message = array('status'=>0,'message'=>'some technical problem has occurred. please try again');
				$this->response($message, REST_Controller::HTTP_OK);
		 }
	}

//end of lab
    }
