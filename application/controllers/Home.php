<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  
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
		$this->load->model('SellerDetailsModel','sd'); 

      }

	public function index()
	{   $query = array(  "hotel"=> $this->sd->GetDataByOrder('hotel','hid'),
						 "cab"=> $this->sd->GetDataByOrder('cab','cid'),
						 "room"=>$this->sd->totalcount('rooms'),
						 "vender"=>$this->sd->totalcount('seller'));
		$this->load->view('template/index',$query);
	}

	public function vendersinghup()
	{
		$this->load->view('template/vendersinghup');
	}
    
	public function venderlogin(){
		$this->load->view('template/venderlogin');
	}
   
	public function Hotelview(){
        $query['state'] =  $this->sd->GetData('state_list');
		$this->load->view('template/hotelfind',$query);
	}

	public function hotelsingle($id){
		$data = $this->sd->SlectData($id,'hid','hotel');
		$room = $this->sd->SlectData($id,'selecthotel','rooms');
		if($data->num_rows() == 1){
		$query['data'] = $data;
		$query['rooms'] = $room;		
		$query['facilites'] = $this->facilites;
		$query['Roomtype'] = $this->Roomtype;
		$query['roomservice'] = $this->service;
		$this->load->view('template/hotelsingal',$query);
		}
		else{
			redirect(base_url('Home/Hotelview'));
		}
	}



	function SingalCab($cid){
	 $query =  array( "Cab" => $this->sd->SlectData($cid,'cid','cab'),
	                 "state" =>$this->sd-> GetData('state_list'));
	   $this->load->view('template/singelcab',$query);
	}


    function About(){
		$this->load->view('template/about');
	}

	function Cabs(){
		$data =  array( "cab"=> $this->sd->GetDataByOrder('cab','cid'),
		                "state" =>  $this->sd->GetData('state_list'));
		$this->load->view('template/cab',$data);
	}

	function Contact(){
		$this->load->view('template/contact');
	}
}
