<?php
class Search_model extends CI_Model {
    
    public function __construct(){
        
        $this->load->database();
    }
    
    function search($input){
        
 
        
        $array = array('Name'=>$input, 'Beschreibung' => $input);
        $this->db->or_like($array);
        
        $query = $this->db->get('Produkte');
        return $query->result_array();

        //Gibt alle Produkte aus, in deren Namen oder Beschreibung der empfangene String vorkommt.
    }
}