<?php defined('BASEPATH') OR exit('No direct script access allowed');

class vandar_cl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('SellerDetailsModel','sd');
    }


         function imgfile($filename){
            $config['upload_path']  = './uploads/sellerdetails';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($filename)){
                    $query = array('error' => $this->upload->display_errors());
                    $query['row'] = $this->sd->GetData('state_list');
                    $this->load->view('template/vendersinghup',$query);
                }
            else{
                 $data =  $this->upload->data();
                 return $data['file_name'];
                }
        }    
        
        function docfile($filename){
            $config['upload_path'] = './uploads/sellerdetails';
            $config['allowed_types'] = 'pdf|doc|docx';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($filename)){
                $query = array('error' => $this->upload->display_errors(),
                                'filename' => $filename);
                $query['row'] = $this->sd->GetData('state_list');
                $this->load->view('template/vendersinghup',$query);
                }
            else
            {
                $data = $this->upload->data();
                return $data['file_name'];
            }
        }

	public function index(){
        $this->form_validation->set_rules('fullname', 'fullname', 'required|trim');
        $this->form_validation->set_rules('number', 'number', 'required|trim|exact_length[10]|is_unique[seller.number]');
	    $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[seller.email]');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        $this->form_validation->set_rules('address', 'address', 'required|trim');
        $this->form_validation->set_rules('city', 'city', 'required|trim');
        $this->form_validation->set_rules('state', 'state', 'required|trim');
        $this->form_validation->set_rules('zip', 'zip', 'required|trim');
        if($this->form_validation->run()){
            $seller['fullname'] = $this->input->post('fullname');
            $seller['number'] = $this->input->post('number');
            $seller['email'] = $this->input->post('email');
            $seller['password'] = $this->input->post('password');
            $seller['address'] = $this->input->post('address');
            $seller['city'] = $this->input->post('city');
            $seller['state'] = $this->input->post('state');
            $seller['zip'] = $this->input->post('zip');
                    //  file input And Validate
                    if((!empty($_FILES['adharfile']['name'])) 
                     && (!empty($_FILES['penfile']['name']))
                     && (!empty($_FILES['bankfile']['name']))
                     && (!empty($_FILES['profile']['name']))){
                    // $seller['profile'] = imgupload('adharfile');
                if($seller['adharfile'] = $this->docfile('adharfile')){
                    if($seller['penfile'] = $this->docfile('penfile')){
                        if($seller['bankfile'] = $this->docfile('bankfile')){
                            if($seller['profile'] = $this->imgfile('profile')){
                                if($this->sd->DataAdd($seller,'seller')){
                                    $this->load->view('template/sellerreq',$seller);
                                }
                                else{
                                    $query['allfilereq'] = "Unknon Error Plz Contact Admin";
                                    $query['row'] = $this->sd->GetData('state_list');
                                    $this->load->view('template/vendersinghup',$query);   
                                }
                            }
                        }
                    }  
                }
                
                }
                else{
                    $query['allfilereq'] = "All File is Requrid";
                    $query['row'] = $this->sd->GetData('state_list');
                    $this->load->view('template/vendersinghup',$query);
                } 
                   
        }
            else{
                $query['row'] = $this->sd->GetData('state_list');
                $this->load->view('template/vendersinghup',$query);
        }
    }


    public function SellerLogin(){
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if($this->form_validation->run()){
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            if($query = $this->sd->SlectData($email,'email','seller')){
            $data = $query->row();
                if($data->password == $password ){
                    if($data->status ==1 ){
                   $this->session->set_userdata('seller',$data->id); 
                   redirect('Seller/index');
                }
                else{
                    $error['error'] = "You acount Is Not Active!" ;
                    $this->load->view('template/venderlogin',$error);  
                }
            }
                else{
                    $error['error'] = "Password Not Match!" ;
                    $this->load->view('template/venderlogin',$error);
                }
            }
        }
        else{
            $error['error'] = "Email And Password Not Valid!";
            $this->load->view('template/venderlogin',$error);
        }

    }
 
    public function Logout(){
        $this->session->unset_userdata('seller');
		redirect('Home/venderlogin'); 
    }
     



}