<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Sellerawork extends CI_Controller {

    private  $facilites =  array("Kids Play Area",
                            "Paid Pickup/Drop",
                            "Paid Bus Station Transfers",
                            "Paid Railway Station Transfers",
                            "Paid Airport Transfers",    
                            "Electrical Adapters",
                            "Electrical Chargers",
                            "TV",
                            "Laptops",
                            "Souvenir Shop",
                            "Jewellery Shop",
                            "Shops",
                            "Book Shop",
                            "Emergency Exit Map",
                            "CCTV",
                            "Fire Extinguishers",
                            "Safety and Security",
                            "Electronic Keycard",
                            "24-hour Security",
                            "In-room Safe",
                            "Bar",
                            "Restaurant",
                            "Kids' Meals",
                            "24-hour Coffee Shop",
                            "Facial Treatments",
                            "Hair Treatments",
                            "Manicure/Pedicure",
                            "Spa",
                            "Salon",
                            "Massage",
                            "Steam and Sauna"); //

    function __construct() {
        parent::__construct();
        $this->load->model('SellerDetailsModel','sd');
    }
            public function  imgfile($filename){
                    $config['upload_path']  = './uploads/service/cab';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload($filename)){
                        $query = array('error' => $this->upload->display_errors());
                        $query['allfilereq'] = "All File is Requrid";
                        $query['row'] = $this->sd->GetData('state_list');
                        $this->load->view('template/seller/Addcab',$query);
                    }
                    else{
                        $data =  $this->upload->data();
                        return $data['file_name'];
                        }
            }    
        
            function docfile($filename){
                $config['upload_path'] = './uploads/service/cab';
                $config['allowed_types'] = 'pdf|doc|docx';
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($filename)){
                    $query = array('error' => $this->upload->display_errors(),
                                    'filename' => $filename);
                                    $query['allfilereq'] = "All File is Requrid";
                                    $query['row'] = $this->sd->GetData('state_list');
                                    $this->load->view('template/seller/Addcab',$query);
                    }
                else
                {
                    $data = $this->upload->data();
                    return $data['file_name'];
                }
            }

            public function addcab(){
                $this->form_validation->set_rules('carname', 'carname', 'required|trim');
                $this->form_validation->set_rules('carmodel', 'carmodel', 'required|trim');
                $this->form_validation->set_rules('carnumber', 'carnumber', 'required|trim|is_unique[cab.carnumber]');
                $this->form_validation->set_rules('cartype', 'cartype', 'required|trim');
                $this->form_validation->set_rules('rentcost', 'rentcost', 'required|trim');
                $this->form_validation->set_rules('fullinc', 'fullinc', 'required|trim');
                $this->form_validation->set_rules('carset', 'carset', 'required|trim');
                $this->form_validation->set_rules('drivetype', 'drivetype', 'required|trim');
                $this->form_validation->set_rules('address', 'address', 'required|trim');
                $this->form_validation->set_rules('city', 'city', 'required|trim');
                $this->form_validation->set_rules('state', 'state', 'required|trim');
                $this->form_validation->set_rules('zip', 'zip', 'required|trim');
                $this->form_validation->set_rules('carinfo', 'carinfo', 'trim');
                if($this->form_validation->run()){
                    $seller['carname'] = $this->input->post('carname');
                    $seller['carmodel'] = $this->input->post('carmodel');
                    $seller['carnumber'] = $this->input->post('carnumber');
                    $seller['cartype'] = $this->input->post('cartype');
                    $seller['rentcost'] = $this->input->post('rentcost');
                    $seller['fullinc'] = $this->input->post('fullinc');
                    $seller['carset'] = $this->input->post('carset');
                    $seller['drivetype'] = $this->input->post('drivetype');
                    //new//
                    $seller['address'] = $this->input->post('address');
                    $seller['city'] = $this->input->post('city');
                    $seller['state'] = $this->input->post('state');
                    $seller['zip'] = $this->input->post('zip');
                    $seller['carinfo'] = $this->input->post('carinfo');
                    
                            //  file input And Validate
                            if((!empty($_FILES['carrc']['name'])) 
                            && (!empty($_FILES['carinsurance']['name']))
                            && (!empty($_FILES['documnet']['name']))
                            && (!empty($_FILES['carimg']['name']))){
                            // $seller['profile'] = imgupload('adharfile');
                        if($seller['carrc'] = $this->docfile('carrc')){
                            if($seller['carinsurance'] = $this->docfile('carinsurance')){
                                if($seller['documnet'] = $this->docfile('documnet')){
                                    if($seller['carimg'] = $this->imgfile('carimg')){
                                            $email = $this->session->userdata('seller');
                                            if( $data = $this->sd->SlectData($email,'id','seller')){
                                                $row = $data->row();
                                                $seller['sellerid'] = $row->id;
                                                $seller['selleremail'] = $row->email;
                                                $seller['adddate'] =  date('d-M-Y');

                                                if($this->sd->DataAdd($seller,'cab')){
                                                    $query['datasend'] = "You Data is Add";
                                                    $query['row'] = $this->sd->GetData('state_list');
                                                    $this->load->view('template/seller/Addcab',$query);         
                                                }
                                                else{
                                                    $query['dataerror'] = "Undifine Error plz Contact To admin";
                                                    $query['row'] = $this->sd->GetData('state_list');
                                                    $this->load->view('template/seller/Addcab',$query);   
                                                }
                                            }
                                        }
                                        else{
                                            $query['allfilereq'] = "Unknon Error Plz Contact Admin";
                                            $query['row'] = $this->sd->GetData('state_list');
                                            $this->load->view('template/seller/Addcab',$query);  
                                        }
                                    }
                                }
                            }  
                        
                        }
                        else{
                            $query['allfilereq'] = "All File is Requrid";
                            $query['row'] = $this->sd->GetData('state_list');
                            $this->load->view('template/seller/Addcab',$query);
                        } 
                        
                }
                    else{
                        $query['row'] = $this->sd->GetData('state_list');
                        $this->load->view('template/seller/Addcab',$query);
                }
            }

        // cab-----edditing -------//
        
            public function Edit($id){
                $data['row'] = $this->sd->SlectData($id,'cid','cab');
                $data['state'] = $this->sd->GetData('state_list');
                $this->load->view('template/seller/edit',$data);          
            }

            public function update(){
                $edid = $this->input->post('edid');   
                $this->form_validation->set_rules('carname', 'carname', 'required|trim');
                $this->form_validation->set_rules('carmodel', 'carmodel', 'required|trim');
                $this->form_validation->set_rules('carnumber', 'carnumber', 'required|trim');
                $this->form_validation->set_rules('cartype', 'cartype', 'required|trim');
                $this->form_validation->set_rules('rentcost', 'rentcost', 'required|trim');
                $this->form_validation->set_rules('fullinc', 'fullinc', 'required|trim');
                $this->form_validation->set_rules('carset', 'carset', 'required|trim');
                $this->form_validation->set_rules('drivetype', 'drivetype', 'required|trim');
                $this->form_validation->set_rules('address', 'address', 'required|trim');
                $this->form_validation->set_rules('city', 'city', 'required|trim');
                $this->form_validation->set_rules('state', 'state', 'required|trim');
                $this->form_validation->set_rules('zip', 'zip', 'required|trim');
                $this->form_validation->set_rules('carinfo', 'carinfo', 'trim');
                // foem valid//
                if($this->form_validation->run())
                {
                    $seller['carname'] = $this->input->post('carname');
                    $seller['carmodel'] = $this->input->post('carmodel');
                    $seller['carnumber'] = $this->input->post('carnumber');
                    $seller['cartype'] = $this->input->post('cartype');
                    $seller['rentcost'] = $this->input->post('rentcost');
                    $seller['fullinc'] = $this->input->post('fullinc');
                    $seller['carset'] = $this->input->post('carset');
                    $seller['drivetype'] = $this->input->post('drivetype');
                    //new//
                    $seller['address'] = $this->input->post('address');
                    $seller['city'] = $this->input->post('city');
                    $seller['state'] = $this->input->post('state');
                    $seller['zip'] = $this->input->post('zip');
                    $seller['carinfo'] = $this->input->post('carinfo');
                            //  file input And Validate
                            if($_FILES['carrc']['name']){

                            $seller['carrc'] = $this->docfile('carrc',$edid);
                            }
                            if($_FILES['carinsurance']['name']){
                                $seller['carinsurance'] = $this->docfile('carinsurance',$edid);
                            }
                            if($_FILES['documnet']['name']){
                                $seller['documnet'] = $this->docfile('documnet',$edid);
                            }
                            if($_FILES['carimg']['name']){
                                $config['upload_path']  = './uploads/service/cab';
                                $config['allowed_types'] = 'jpg|png|jpeg';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                if (!$this->upload->do_upload('carimg')){
                                    $data = array('error' => $this->upload->display_errors(),
                                                'filename' => $filename);
                                    $data['row'] = $this->sd->SlectData($edid,'cid','cab');
                                    $data['state'] = $this->sd->GetData('state_list');
                                    $this->load->view('template/seller/edit',$data);
                                }
                                else{
                                    $data =  $this->upload->data();
                                    $seller['carimg'] = $data['file_name'];
                                    }
                            }
                            if($this->sd->UpdateCab($seller,$edid,'cab','cid')){
                                $data['row'] = $this->sd->SlectData($edid,'cid','cab');
                                $data['state'] = $this->sd->GetData('state_list');
                                $data['Success'] ="You Data Add Successfully !";
                                $this->load->view('template/seller/edit',$data);
                            }
                            else{
                                $data['row'] = $this->sd->SlectData($edid,'cid','cab');
                                $data['state'] = $this->sd->GetData('state_list');
                                $data['unknown'] ="Unknown Error Plz Check You Form!";
                                $this->load->view('template/seller/edit',$data);
                            }
                            }
                            else{
                                $data['row'] = $this->sd->SlectData($edid,'cid','cab');
                                $data['state'] = $this->sd->GetData('state_list');
                                $this->load->view('template/seller/edit',$data);
                                // $this->load->view('template/seller/Addcab',$query);
                        }
            }

           
            public  function Delete(){
             
                echo $id = $this->input->post('did');
                if($this->sd->Delete($id,'cid','cab')){
                redirect('Seller/totaldata');
                } 
            }
// Add Hotel Function --//

                public function AddHotel(){
                    $this->form_validation->set_rules('hotelname', 'hotelname', 'required|trim');
                    $this->form_validation->set_rules('hotelid', 'hotelid', 'required|trim|is_unique[hotel.hotelid]');
                    $this->form_validation->set_rules('hotelconnum', 'hotelconnum', 'required|trim');
                    $this->form_validation->set_rules('hoteladd', 'hoteladd', 'required|trim');
                    $this->form_validation->set_rules('nearlandmark', 'nearlandmark', 'required|trim');
                    $this->form_validation->set_rules('city', 'city', 'required|trim');
                    $this->form_validation->set_rules('state', 'state', 'required|trim');
                    $this->form_validation->set_rules('zip', 'zip', 'required|trim');
                    if($this->form_validation->run())
                    {
                        $seller['hotelname'] = $this->input->post('hotelname');
                        $seller['hotelid'] = $this->input->post('hotelid');
                        $seller['hotelconnum'] = $this->input->post('hotelconnum');
                        $seller['hoteladd']= $this->input->post('hoteladd');
                        $seller['nearlandmark'] = $this->input->post('nearlandmark');
                        $seller['state'] = $this->input->post('state');
                        $seller['city'] = $this->input->post('city');
                        $seller['zip'] = $this->input->post('zip');
                        $seller['hotelinfo'] = $this->input->post('hotelinfo');
                        $facilites =  $this->input->post('facilites');
                                if(!empty($facilites)){
                                    $seller['facilites'] = implode(" ,",$facilites);
                                    if($_FILES['hotlimg']['name'] && $_FILES['hotmullimg']['name']){
                                        $config['upload_path']  = './uploads/service/hotels';
                                        $config['allowed_types'] = 'jpg|png|jpeg';
                                        $this->upload->initialize($config);
                                        $this->load->library('upload', $config);
                                        if (!$this->upload->do_upload('hotlimg')){
                                            $query = array('imgerro' => $this->upload->display_errors(),
                                                        'filename'=>$_FILES['hotlimg']['name']);
                                            $query['row'] = $this->sd->GetData('state_list');
                                            $query['Facilities'] = $this->facilites;
                                            $this->load->view('template/seller/Hoteladd',$query); 
                                        }
                                        else{
                                            $data =  $this->upload->data();
                                            $seller['imgname'] =  $data['file_name'];
                                            //multifile upload//
                                            $dir = './uploads/service/hotels/rooms/';
                                            $con = count($_FILES['hotmullimg']['name']);
                                            $allowed = array('jpeg', 'png', 'jpg');
                                            
                                            if(count($_FILES['hotmullimg']['name'])<=5){
                                            foreach($_FILES['hotmullimg']['name'] as $index=>$value){
                                                $temp = explode(".",$value);
                                                $newfilename = rand(10,100) . '.' . end($temp);
                                                $ext = pathinfo($newfilename, PATHINFO_EXTENSION);
                                                if (in_array($ext, $allowed)) {
                                                    if(move_uploaded_file($_FILES['hotmullimg']['tmp_name'][$index],$dir.$newfilename)){
                                                        $seller['img'.$index] = $newfilename;
                                                        }
                                                        else{
                                                            $query['adminerror'] = "Server Error Contact to Admin ";
                                                            $query['row'] = $this->sd->GetData('state_list');
                                                            $query['Facilities'] =$this->facilites;
                                                            $this->load->view('template/seller/Hoteladd',$query); 
                                                        } 
                                                    }
                                                    else{
                                                        $query['imgselect'] = "Select only jpg jpeg and png  ";
                                                        $query['row'] = $this->sd->GetData('state_list');
                                                        $query['Facilities'] = $this->facilites;
                                                        $this->load->view('template/seller/Hoteladd',$query); 
                                                        break;
                                                    }
                                            }  
                                            }
                                            else{
                                                $query['imgselect'] = "Select Max Five images";
                                                $query['row'] = $this->sd->GetData('state_list');
                                                $query['Facilities'] = $this->facilites;
                                                $this->load->view('template/seller/Hoteladd',$query); 
                                            }
                                            
                                            // Send Data to Data base//
                                            // echo "<pre>";
                                            //  print_r($seller);
                                            // echo "</pre>";
                                            $seller['sellerid'] = $this->session->userdata('seller');
                                            if($this->sd->DataAdd($seller,'hotel')){
                                                $query['succuss'] = "You Data Add Successfull";
                                                $query['row'] = $this->sd->GetData('state_list');
                                                $query['Facilities'] =$this->facilites;
                                                $this->load->view('template/seller/Hoteladd',$query); 
                                            }
                                            else{
                                                $query['error'] = "Server Error Contact to Admin";
                                                $query['row'] = $this->sd->GetData('state_list');
                                                $query['Facilities'] = $this->facilites;
                                                $this->load->view('template/seller/Hoteladd',$query); 
                                            }
                                            
                                        
                                        }
                                    }
                                    else{
                                        $query['imgselect'] = "Plz Select Images ";
                                        $query['row'] = $this->sd->GetData('state_list');
                                        $query['Facilities'] = $this->facilites;
                                        $this->load->view('template/seller/Hoteladd',$query); 
                                        }
                            }
                            else
                            {
                            $query['error'] = "Plz Select Checkbox ";
                            $query['row'] = $this->sd->GetData('state_list');
                            $query['Facilities'] = $this->facilites;
                            $this->load->view('template/seller/Hoteladd',$query); 
                            }
                    }else
                    {
                    $query['row'] = $this->sd->GetData('state_list');
                    $query['Facilities'] = $this->facilites;
                    $this->load->view('template/seller/Hoteladd',$query); 
                    }
                
                }
  
               public function hoteledit($id){
                $query['user'] = $this->sd->SlectData($id,'hid','hotel');
                $query['row'] = $this->sd->GetData('state_list');
                $query['Facilities'] = $this->facilites;
                $this->load->view('template/seller/hoteledit',$query);          
            }
          

            


            public function updateHotel(){
                $eid = $this->input->post('edid');
                $this->form_validation->set_rules('hotelname', 'hotelname', 'required|trim');
                $this->form_validation->set_rules('hotelid', 'hotelid', 'required|trim');
                $this->form_validation->set_rules('hotelconnum', 'hotelconnum', 'required|trim');
                $this->form_validation->set_rules('hoteladd', 'hoteladd', 'required|trim');
                $this->form_validation->set_rules('nearlandmark', 'nearlandmark', 'required|trim');
                $this->form_validation->set_rules('city', 'city', 'required|trim');
                $this->form_validation->set_rules('state', 'state', 'required|trim');
                $this->form_validation->set_rules('zip', 'zip', 'required|trim');
                $this->form_validation->set_rules('hotelinfo', 'hotelinfo', 'required|trim');
                if($this->form_validation->run())
                {   $seller['hotelname'] = $this->input->post('hotelname');
                    $seller['hotelid'] = $this->input->post('hotelid');
                    $seller['hotelconnum'] = $this->input->post('hotelconnum');
                    $seller['hoteladd']= $this->input->post('hoteladd');
                    $seller['nearlandmark'] = $this->input->post('nearlandmark');
                    $seller['state'] = $this->input->post('state');
                    $seller['city'] = $this->input->post('city');
                    $seller['zip'] = $this->input->post('zip');
                    $seller['hotelinfo'] = $this->input->post('hotelinfo');
                    $facilites =  $this->input->post('facilites');
                    $seller['facilites'] = implode(" ,",$facilites);
                    //singel img///
                    if(!empty($_FILES['hotlimg']['name'])){
                            $config['upload_path']  = './uploads/service/hotels';
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                                if (!$this->upload->do_upload('hotlimg')){
                                $query = array('imgerro' => $this->upload->display_errors(),
                                            'filename'=>$_FILES['hotlimg']['name']);
                                $query['user'] = $this->sd->SlectData($eid,'hid','hotel');
                                $query['row'] = $this->sd->GetData('state_list');
                                $query['Facilities'] = $this->facilites;
                            }
                            else{
                                $data =  $this->upload->data();
                                $seller['imgname'] =  $data['file_name'];
                            }
                    }
                    $multig = count($_FILES['hotmullimg']['name']);
                    if($multig!=1 && $multig<=5 ){
                        // multi image upload //
                                            $dir = './uploads/service/hotels/rooms/';
                                            $allowed = array('jpeg', 'png', 'jpg');
                                            if(count($_FILES['hotmullimg']['name'])<=5){
                                            foreach($_FILES['hotmullimg']['name'] as $index=>$value){
                                                $temp = explode(".",$value);
                                                $newfilename = rand(10,100) . '.' . end($temp);
                                                $ext = pathinfo($newfilename, PATHINFO_EXTENSION);
                                                if (in_array($ext, $allowed)) {
                                                    if(move_uploaded_file($_FILES['hotmullimg']['tmp_name'][$index],$dir.$newfilename)){
                                                        $seller['img'.$index] = $newfilename;
                                                        }
                                                        else{
                                                            $query['adminerror'] = "Server Error Contact to Admin ";
                                                            $query['user'] = $this->sd->SlectData($eid,'hid','hotel');
                                                            $query['row'] = $this->sd->GetData('state_list');
                                                            $query['Facilities'] = $this->facilites;
                                                            $this->load->view('template/seller/hoteledit',$query);  
                                                        } 
                                                    }
                                                    else{
                                                        $query['imgselect'] = "Select only jpg jpeg and png  ";
                                                        $query['user'] = $this->sd->SlectData($eid,'hid','hotel');
                                                        $query['row'] = $this->sd->GetData('state_list');
                                                        $query['Facilities'] = $this->facilites;
                                                        $this->load->view('template/seller/hoteledit',$query);  
                                                        break;
                                                    }
                                              }  
                                            }
                                            else{
                                                $query['imgselect'] = "Select Max Five images";
                                                $query['user'] = $this->sd->SlectData($eid,'hid','hotel');
                                                $query['row'] = $this->sd->GetData('state_list');
                                                $query['Facilities'] = $this->facilites;
                                                $this->load->view('template/seller/hoteledit',$query);  
                                            }
                        // code end...//
                    }
                   //data base send the <data>
                    if($this->sd->UpdateCab($seller,$eid,'hotel','hid')){
                        $query['succuss'] = "You Data Add Successfull";
                        $query['user'] = $this->sd->SlectData($eid,'hid','hotel');
                        $query['row'] = $this->sd->GetData('state_list');
                        $query['Facilities'] = $this->facilites;
                        $this->load->view('template/seller/hoteledit',$query);
                    }
                    else{
                        $query['error'] = "Acssess   The Admin ";
                        $query['user'] = $this->sd->SlectData($eid,'hid','hotel');
                        $query['row'] = $this->sd->GetData('state_list');
                        $query['Facilities'] = $this->facilites;
                        $this->load->view('template/seller/hoteledit',$query);  
                    }
                   // end the data sending .///
                }else{
                    $query['user'] = $this->sd->SlectData($eid,'hid','hotel');
                    $query['row'] = $this->sd->GetData('state_list');
                    $query['Facilities'] = $this->facilites;
                    $this->load->view('template/seller/hoteledit',$query); 
                    }
                
              }

          ////hotel Delete //
          public  function HotelDelete(){
              echo $id = $this->input->post('did');
              if($this->sd->Delete($id,'hid','hotel')){
              redirect('Seller/hoteldata');
              } 
          }

         
}