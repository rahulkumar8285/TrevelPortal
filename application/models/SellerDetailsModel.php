<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SellerDetailsModel extends CI_Model{
   
    public function DataAdd($seller,$tabelname){
        $this->db->insert($tabelname, $seller);
        if($this->db->affected_rows()==1){
            return true;
        }
     }

     public function SlectData($id,$fild,$table){
        $this->db->where($fild,$id);
        $query =  $this->db->get($table);
        return $query;
        
    } 

    public function GetData($tabelname){
        $query =  $this->db->get($tabelname);
        return $query;
    }

    public function GetAllData($userid){
        $this->db->select('*');
        $this->db->join('state_list', 'state_list.id = cab.state',);
        $this->db->where('sellerid',$userid);
        $this->db->order_by('cid', 'DESC');
        $query =  $this->db->get('cab');
        return $query; 
      }

      public function GetHoteldata($userid){
        $this->db->select('*');
        $this->db->join('state_list', 'state_list.id = hotel.state',);
        $this->db->where('sellerid',$userid);
        $this->db->order_by('hid', 'DESC');
        $query =  $this->db->get('hotel');
        return $query; 
      }

    
      function UpdateCab($data,$id,$tabelname,$fild){
        $this->db->where($fild, $id);
        $this->db->update($tabelname, $data);
        return ($this->db->affected_rows()==1)? true : false ;
    }
    
    function Delete($id,$fild,$tabelname){
        $this->db->where($fild,$id);
        $this->db->delete($tabelname);
        return ($this->db->affected_rows()==1)? true : false ;
    }

    function showdata($data){
        $this->db->where('sellerid',$userid);
        $this->db->order_by('cid', 'DESC');
        $query =  $this->db->get('cab');
        return $query;
      return true;
    }

  Function Increment(){
    $this->db->insert($tabelname, $seller);
  }

  function GetDataByOrder($tabelname,$orderid){
    $this->db->order_by($orderid, 'DESC');
    $this->db->limit(5);
    $query = $this->db->get($tabelname);
    //  print_r($this->db->last_query()); 
    $query->total  = $this->db->count_all($tabelname);
    return $query;
  }

  function totalcount($tabelname){
   return $this->db->count_all($tabelname);
  }

}