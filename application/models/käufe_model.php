<?php
class käufe_model extends CI_Model {

    public function __construct(){
    
        $this->load->database();
    }

    // Gibt ein array mit allen Käufern (Arrays mit den gesammten käuferinformationen) aus.
    public function get_kaeufer(){
        $this->db->select('Vorname');
        $this->db->select('Name');
        $this->db->select('Adresse');
        $this->db->select('KID');
        $result = $this->db->get('Käufe');
        return $result->result_array();
    }

    /* Gibt alle gekauften Produkte aus
    Dabei kommt eine KID mit einem Produkt, bzw. seinen Informationen zusammen.
    Es können also sowohl KIDs wie auch Produkte doppelt vorkommen.*/
    public function get_kauf_info(){
        $result = $this->db->query('SELECT * FROM Kaufprodukte LEFT JOIN Produkte ON Kaufprodukte.PID = Produkte.PID');
        return $result->result_array();
       
    }
}

// -Moritz
?>