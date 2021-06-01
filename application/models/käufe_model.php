<?php
class käufe_model extends CI_Model {

    public function __construct(){
    
        $this->load->database();
    }

    public function get_kaeufer(){
        $this->db->select('Vorname');
        $this->db->select('Name');
        $this->db->select('Adresse');
        $this->db->select('KID');
        //$this->db->where('KID', $data);
        $result = $this->db->get('Käufe');
        return $result->result_array();
    }

    public function get_kauf_info(){
        $result = $this->db->query('SELECT * FROM Kaufprodukte LEFT JOIN Produkte ON Kaufprodukte.PID = Produkte.PID');
        return $result->result_array();
       
    }
}
?>