<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('AdminModel','AM');
        $admin = $this->session->userdata('adminemail');
	}
	
	public function index()
	{	
    $this->load->view('template/admin/login');
	}
	
	public function Dashbord()
	{    if($admin = $this->session->userdata('adminemail')){	
            $query = $this->AM->SelectData('email',$admin,'admin');
	    	// $row['data'] = $query->row();
			// $total = $this->AM->GetData('seller');
			// $row['selernum'] =  $total->num_rows();
			$row = array( "data" =>$query->row(),
			               "seller"=> $this->AM->totalcount('seller'),
						   "rooms"=> $this->AM->totalcount('rooms'),
						   "hotel"=> $this->AM->totalcount('hotel'),
						   "cab"=> $this->AM->totalcount('cab'));
			$this->load->view('template/admin/index',$row);


	      }   
		else{
			$this->index();
		}  
    }

	public function request()
	{	if($admin = $this->session->userdata('adminemail')){	    
		$this->load->model('AdminModel','AM');
		$query['data'] = $this->AM->GetData('seller','id');
		$this->load->view('template/admin/request',$query);
		}
		else{
			$this->index();
		}
    }

	function CabData(){
         $data = array("cab" =>  $this->AM->GetData("cab","cid"));
		 $this->load->view('template/admin/cabdata',$data);
	}
   
	function HotelData(){
        $data = array( "hotel" => $this->AM->GetData('hotel','hid'));
		$this->load->view('template/admin/hoteldata',$data);
	}

	function RoomsData(){
        $data = array( "rooms" => $this->AM->GetData('rooms','rid'));
		$this->load->view('template/admin/roomsdata',$data);
	}

	

}