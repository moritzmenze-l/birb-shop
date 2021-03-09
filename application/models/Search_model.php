<?php
class Search_model extends CI_Model {
    
    public function __construct(){
        
        $this->load->database();
    }
    
    function search($input){
        
        //$this->db->like('Titel',$suchwort);//WHERE'Titel'LIKE'%suchwort%
        
        $array = array('Gaeste'=>$input, 'Eintrag' => $input);
        $this->db->or_like($array);
        
        $query = $this->db->get('Gaestebuch');
        return $query->result_array();
    }
}