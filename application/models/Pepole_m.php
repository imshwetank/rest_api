<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pepole_m extends CI_Model
{
    public function pepoleInfoGet(){
        $query=$this->db->get('user_detail');
        return $query->result();
    }
    public function pepoleInfoSearch($data){
        $this->db->where('id',$data);
        $query=$this->db->get('user_detail');
        return $query->row();
    }
    
}
