<?php defined('BASEPATH') OR exit('No direct script access allowed');
class VendrRooms extends CI_Controller {
 
  private $Roomtype = array('room1','room2','room3','room4','room5','room6','room7');
  private $service = array('s1','s2','s3','s4','s5','s6','s7','s8','s9','s10','s11','s12');
  private $query;
    function __construct() {
        parent::__construct();
        if($id = $this->session->userdata('seller')){
        $this->load->model('SellerDetailsModel','sd');            
        $this->query= array( "Roomtype" => $this->Roomtype,
                             "service"=>$this->service,
                             "data"=>$this->sd->SlectData($id,'sellerid','hotel'),
                             "row" =>$this->sd->SlectData($id,'sellerid','rooms')
                            );
        }
        else{
          redirect(base_url('Home/venderlogin'));
        }
      }

     function addrooms(){        
        if($id = $this->session->userdata('seller')){
          $this->load->view('template/seller/addrooms',$this->query);
        }
        else{
          redirect(base_url('Vandar_cl/login'));
        }
      } 

      function CreateRooms(){
        $this->form_validation->set_rules('roomtype', 'roomtype', 'required|trim');
        $this->form_validation->set_rules('norooms', 'norooms', 'required|trim');
        $this->form_validation->set_rules('noadults', 'noadults', 'required|trim');
        $this->form_validation->set_rules('nochild', 'nochild', 'required|trim');
        $this->form_validation->set_rules('hotleinfo', 'hotleinfo', 'required|trim');
        $this->form_validation->set_rules('demoprice', 'demoprice', 'required|trim');
        $this->form_validation->set_rules('mainprice', 'mainprice', 'required|trim');
        $this->form_validation->set_rules('copecode', 'copecode', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        $this->form_validation->set_rules('selecthotel', 'selecthotel', 'required|trim');
        $facilites =  $this->input->post('facilites');
        if($this->form_validation->run()){
          if(!empty($facilites)){
          $data['roomtype'] = $this->input->post('roomtype');
          $data['norooms'] = $this->input->post('norooms');
          $data['noadults'] = $this->input->post('noadults');
          $data['nochild']= $this->input->post('nochild');
          $data['demoprice'] = $this->input->post('demoprice');
          $data['mainprice'] = $this->input->post('mainprice');
          $data['copecode'] = $this->input->post('copecode');
          $data['hotleinfo'] = $this->input->post('hotleinfo');
          $data['status'] = $this->input->post('status');
          $data['selecthotel'] = $this->input->post('selecthotel');
          $data['facilites'] = implode(" ",$facilites);
          $data['	sellerid'] = $this->session->userdata('seller');
        
             if($this->sd->DataAdd($data,'rooms')){
              $this->query['success'] = "You Data Add successfully ";
              $this->load->view('template/seller/addrooms',$this->query);
             }
             else{
              $this->query['error'] = "Data Not Add pls Check The Form ";
              $this->load->view('template/seller/addrooms',$this->query);
             }        
          }
          else{
            $this->query['error'] = "Pls Select Check Box ";
            $this->load->view('template/seller/addrooms',$this->query); 
          }
         
        }
        else{
            $this->load->view('template/seller/addrooms',$this->query); 
        }


      }
     
      function UpdataHotel(){

     }

     function RoomsData(){
      $this->load->view('template/seller/roomsdata',$this->query);
      }
   
   public function delete(){
     $id = $this->input->post('did');
        if($this->sd->Delete($id,'rid','rooms')){
        $this->load->view('template/seller/roomsdata',$this->query);
        } 
        else{
          $this->session->
          $this->load->view('template/seller/roomsdata',$this->query);
        }
    }

    public function Edit($id){
      $data = $this->sd->SlectData($id,'rid','rooms');
      if($data->num_rows() == 1){
      $query['eddata'] = $data;
      $query["Roomtype"] =  $this->Roomtype;
      $query["service"]= $this->service;
      $query["data"]= $this->sd->SlectData($this->session->userdata('seller'),'sellerid','hotel');
      $this->load->view('template/seller/roomsedit',$query);
      }
      else{
        $this->load->view('template/seller/roomsdata',$this->query,);
      }
    
    }

    public function Update(){
        echo $id = $this->input->post('edid');
        $edata = $this->sd->SlectData($id,'rid','rooms');
        $DataPass['eddata'] = $edata;
        $DataPass["Roomtype"] =  $this->Roomtype;
        $DataPass["service"]= $this->service;
        $DataPass["data"]= $this->sd->SlectData($this->session->userdata('seller'),'sellerid','hotel');
        $this->form_validation->set_rules('roomtype', 'roomtype', 'required|trim');
        $this->form_validation->set_rules('norooms', 'norooms', 'required|trim');
        $this->form_validation->set_rules('noadults', 'noadults', 'required|trim');
        $this->form_validation->set_rules('nochild', 'nochild', 'required|trim');
        $this->form_validation->set_rules('hotleinfo', 'hotleinfo', 'required|trim');
        $this->form_validation->set_rules('demoprice', 'demoprice', 'required|trim');
        $this->form_validation->set_rules('mainprice', 'mainprice', 'required|trim');
        $this->form_validation->set_rules('copecode', 'copecode', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        $this->form_validation->set_rules('selecthotel', 'selecthotel', 'required|trim');
        $facilites =  $this->input->post('facilites');
        if($this->form_validation->run()){
          if(!empty($facilites)){
            $data['roomtype'] = $this->input->post('roomtype');
            $data['norooms'] = $this->input->post('norooms');
            $data['noadults'] = $this->input->post('noadults');
            $data['nochild']= $this->input->post('nochild');
            $data['demoprice'] = $this->input->post('demoprice');
            $data['mainprice'] = $this->input->post('mainprice');
            $data['copecode'] = $this->input->post('copecode');
            $data['hotleinfo'] = $this->input->post('hotleinfo');
            $data['status'] = $this->input->post('status');
            $data['selecthotel'] = $this->input->post('selecthotel');
            $data['facilites'] = implode(" ",$facilites);
            $data['	sellerid'] = $this->session->userdata('seller');
            //  echo "<pre>";
            //  print_r($data);
            //  echo "</pre>";
             if($this->sd->UpdateCab($data,$id,'rooms','rid')){
              $DataPass['success'] = "You Data Update Successfull";
              $this->load->view('template/seller/roomsedit',$DataPass);
             }
             else{
              $DataPass['error'] = "Contact To Admin DataBase Error!";
              $this->load->view('template/seller/roomsedit',$DataPass);
             }

          }
          else{
            $DataPass['error'] = "Select Check Box ";
            $this->load->view('template/seller/roomsedit',$DataPass);
          }
        }else{
          $this->load->view('template/seller/roomsedit',$DataPass);
       
        }
    }




}