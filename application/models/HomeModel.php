<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model{
 
    public function __construct() {
        parent::__construct();
        //  print_r($this->db->last_query()); 
    }

    public function GelAllData($id,$fild,$tablename){
          $this->db->where($fild,$id);
          $query =  $this->db->get($tablename);
          return $query; 
    } 
       
    function HotelData($city,$state){
         $this->db->where("city", $city);
         $this->db->where("state", $state);
         $query =  $this->db->get('hotel');
        //  print_r($query);
        return $query;     
    }

    function GetData($tablename){
        $query =  $this->db->get($tablename);
        return $query;
    }
}
?>