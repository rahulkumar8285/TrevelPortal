<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Seller extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('SellerDetailsModel','sd');
    }


    public function index(){
        if($uid = $this->session->userdata('seller')){
        // $qurey =  $this->sd->SlectData($uid,'id','seller');
        // $data['row'] = $qurey->row();
        $qurey = array( 'row'=> $this->sd->SlectData($uid,'id','seller'),
                        'cab'=>$this->sd->SlectData($uid,'sellerid','cab'),
                        'rooms'=>$this->sd->SlectData($uid,'sellerid','rooms'),
                        'hotel'=>$this->sd->SlectData($uid,'sellerid','hotel'));
        $this->load->view('template/seller/index',$qurey);
        }
        else{
            redirect(base_url().'Home/venderlogin');
        }
     }

    public function totaldata(){
       $usid = $this->session->userdata('seller');
       if($qurey = $this->sd->GetAllData($usid)){
         $data['row'] = $qurey; 
        $this->load->view('template/seller/totaldata',$data); 
       }
    }

   public function hoteldata(){
    $usid = $this->session->userdata('seller');
    if($qurey = $this->sd->GetHoteldata($usid)){
      $data['row'] = $qurey; 
      $this->load->view('template/seller/HotelData',$data); 
    }
   }
  
   public function hoteledit($id){
    $data['row'] = $this->sd->SlectData($id,'hid','hotel');
    $data['state'] = $this->sd->GetData('state_list');
    $this->load->view('template/seller/hoteledit',$data);          
   }

 
  


}