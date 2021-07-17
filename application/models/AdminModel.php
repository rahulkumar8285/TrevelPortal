<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model{
    public function AdminLogin($email,$password){
        $this->db->where('email',$email);  
        $this->db->where('password', $password);  
        $query = $this->db->get('admin'); 
        if ($query->num_rows() == 1)  
        {  
          return true;
        }
        else{
            return false;
        }  
    }

    public function SelectData($fild,$data,$tabelname)
    {
      $this->db->where($fild,$data,$tabelname);
      $query = $this->db->get($tabelname);   
      return $query;    
    }

    public function GetData($tabelname,$fild ){
        $this->db->order_by($fild, "desc");
        $query = $this->db->get($tabelname); 
        return $query; 
    }

    public function statusch($id){
        $this->db->where('id', $id);
        $query = $this->db->get('seller');
        $row = $query->row();
        $active = array('status'=>1);
        $deactive = array('status'=>0);
        if($row->status==0){
        $this->db->set($active);
        }
        else{
            $this->db->set($deactive);
        }
        $this->db->where('id', $id); 
        $this->db->update('seller');
    }

    function totalcount($tabelname){
		return $this->db->count_all($tabelname);
	   }
   
    


}