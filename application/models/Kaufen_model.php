<?php
class Kaufen_model extends CI_Model {
   public function __construct(){
   $this->load->database();
   }

   public function get_data(){
      $query = $this->kaufen->get('Käufe'); // Produces: SELECT * FROM mytable
      return $query->result_array();
   }

   // nachname,vorname und adresse werden in der Datenbank gespeichert. -Maite

   public function create($nachname, $vorname, $adresse){
     $this->db->set('Name', $nachname);
     $this->db->set('Vorname', $vorname);
     $this->db->set('Adresse', $adresse);
     $this->db->insert('Käufe');
     return $this->db->insert_id();
   }
}