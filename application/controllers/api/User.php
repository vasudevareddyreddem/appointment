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

  $data=array('phar_id'=>$phar,
'pat_id'=>$user_id,
'amount'=>$amt,
'paid_date'=>date('Y-m-d'));

  $res= $this->api_users_model->insert_pay_det($data);
  if($res==1){
        $wamt=$this->post('wamt');
    $res= $this->Api_user_checking_model->update_wallet($wamt,$user_id);
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
//echo '<pre>';print_r($data);exit;
 $res= $this->api_users_model->insert_med_list($data);
 if($res==1){
 $message = array('status'=>1,'message'=>'your order is sent ');
 $this->response($message, REST_Controller::HTTP_OK);
}else{
$message = array('status'=>0,'message'=>'your order is not sent ');
$this->response($message, REST_Controller::HTTP_OK);
}


}

//end of lab
    }
