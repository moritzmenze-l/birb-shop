<?php
class Kaufen_model extends CI_Model {
    public function __construct(){
    $this->load->database();
    }
    public function get_data(){
        $query = $this->kaufen->get('Käufe'); // Produces: SELECT * FROM mytable
        return $query->result_array();
     }

   public function create($nachname, $vorname, $adresse){
      $this->db->set('Name', $nachname);
      $this->db->set('Vorname', $vorname);
      $this->db->set('Adresse', $adresse);
      $this->db->insert('Käufe');
   }

   public function getKid($nachname,$vorname,$adresse){
      $result = $this->db->query('SELECT KID FROM Käufe ORDER BY KID DESC');
      return $result->result_array();
   }

   public function savekauf($kid){
      foreach($_SESSION['warenkorb'] as $item){
         $this->db->set('KID', $kid);
         $this->db->set('PID', $item);
         $this->db->insert('Kaufprodukte');
      }
   }
}
