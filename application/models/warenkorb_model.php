<?php
class Warenkorb_model extends CI_Model {

    public function __construct(){
    
        $this->load->database();
    }

    public function get_produkt_info($data){
        $this->db->select('PID');
        $this->db->select('Name');
        $this->db->select('Beschreibung');
        $this->db->select('Preis');
        $this->db->select('Bild');
        $this->db->where('PID', $data);
        $result = $this->db->get('Produkte');
        return $result->result_array();
       
    }
}
?>