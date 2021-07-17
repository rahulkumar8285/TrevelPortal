<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminLogin extends CI_Controller {
	public function index()
	{
		$this->form_validation->set_rules('password', 'password', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
		$this->load->model('AdminModel','AM');
		if($this->form_validation->run()){
			$email = $this->input->post('email');
            $password = $this->input->post('password');
			if($this->AM->AdminLogin($email,$password)){
			    $this->session->set_userdata('adminemail',$email);
			    redirect(base_url().'Admin/Dashbord');
			}
			else{
				$login['error'] = "Username And Password Invalid!";
				$this->load->view('template/admin/login',$login);
			}
		}
		else{
			$this->load->view('template/admin/login');
		}
	}
	public function status(){
		$id=$this->input->post('deleteid');
		$this->load->model('AdminModel','AM');
		 $this->AM->statusch($id);
		redirect('admin/request');
	}


	public function  logout(){
		$this->session->unset_userdata('adminemail');
		redirect(base_url().'Admin');
	}
   
	public function Totalnum(){
		return 10;
	}
	 
}