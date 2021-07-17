<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookingCl extends CI_Controller {
  
	private  $facilites =  array("Kids Play Area","Paid Pickup/Drop","Paid Bus Station Transfers","Paid Railway Station Transfers",
	"Paid Airport Transfers","Electrical Adapters","Electrical Chargers","TV","Laptops","Souvenir Shop","Jewellery Shop",
	"Shops","Book Shop","Emergency Exit Map","CCTV","Fire Extinguishers","Safety and Security","Electronic Keycard",
	"24-hour Security","In-room Safe","Bar","Restaurant","Kids' Meals","24-hour Coffee Shop","Facial Treatments",
	"Hair Treatments","Manicure/Pedicure","Spa","Salon","Massage",
	"Steam and Sauna"); 
	private $Roomtype = array('room1','room2','room3','room4','room5','room6','room7');
	private $service = array('s1','s2','s3','s4','s5','s6','s7','s8','s9','s10','s11','s12');
	function __construct() {
        parent::__construct();
		$this->load->model('HomeModel','MD'); 
        // if(empty($this->session->userdata('user'))){
        //     echo "Pls Login ";
        // }
      }
       
   function HotelFind(){
    $city = $this->input->post('city');
    $state= $this->input->post('state');
    $checkin = $this->input->post('checkin');
    $checkout = $this->input->post('checkout');
    $in = explode("-",$checkin);
    $out=  explode("-",$checkout);
    $totalday =$out[2] - $in[2];
    $this->session->set_userdata($hoteldata = array('checkin'=> $checkin,
                                                                'checkout'=> $checkout,
                                                                 'totalday'=>$totalday));
    $query =  $this->MD->HotelData($city,$state);
    $data['state'] =  $this->MD->GetData('state_list');

    if($query->num_rows()>0){
     $data['hoteldata'] = $query;
     $this->load->view('template/hotelfind',$data); 
    }
    else{
     $this->load->view('template/hotelfind',$data); 
    }
  }


      
     Function BookingRoom(){
              $rid = $this->input->post('bookid');
              $hotid =  $this->input->post('hoteid');
              $offer =  $this->input->post('Offer');    
              $mainprice =  $this->input->post('mainprice');
              $totalcoust = $this->session->userdata('totalday')*$mainprice;
              $bookprice = $this->input->post('Bookprice');
               if($offer==1){
                 $totalcoust =  $totalcoust-($totalcoust * 20/100);
               }
             $query = array( "rooms"=>$this->MD->GelAllData($rid,'rid','rooms'),
                              "hotel"=> $this->MD->GelAllData($hotid,'hid','hotel'),
                               "rommservice" =>$this->service,
                               "offer" =>  $offer,
                               "holdday"=>$this->session->userdata('totalday'),
                               "totalcoust"=>$totalcoust);
                                // $this->session->unset_userdata('totalday');
                                $this->load->view('template/booking',$query);
                            }   
  
                            function hotelbook(){
                              $this->form_validation->set_rules('fullname', 'fullname', 'required|trim');
                              $this->form_validation->set_rules('mobilnum', 'mobilnum', 'required|trim|exact_length[10]|is_unique[seller.number]');
                              $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[seller.email]');
                              if($this->form_validation->run()){
                                $data['fullname'] =  $this->input->post('fullname');
                                $data['mobilnum'] =  $this->input->post('mobilenumber');
                                $data['email'] =  $this->input->post('email');
                                $data['checkin'] =   $this->session->userdata('checkin');
                                $data['checkout'] =   $this->session->userdata('checkout');
                                $data['totalday'] = $this->session->userdata('totalday'); 
 
                              }
                              else{
                                redirect(base_url('BookingCl/BookingRoom'));
                              }

                              }
  
           
                              function BookingCab(){
                                $data['fullname'] =  $this->input->post('fullname');
                                $data['mobile'] =  $this->input->post('mobile');
                                $data['email'] =  $this->input->post('email');
                                $data['tottalfare'] =  $this->input->post('tottalfare');
                                print_r($data);
                              }
    




}