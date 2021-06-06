<?php
class Db_model extends CI_Model {
 public function __construct(){
 $this->load->database();
 }
 public function get_data(){
    $query = $this->db->get('Produkte'); // Produces: SELECT * FROM mytable
    return $query->result_array();
 }
 public function create($headline, $content, $preis){
   $this->db->set('Name', $headline);
   $this->db->set('Beschreibung', $content);
   $this->db->set('Preis', $preis);
   $this->db->insert('Produkte');
   return $this->db->insert_id();
   }

public function getPID(){
  $result = $this->db->query('SELECT PID FROM Produkte ORDER BY PID DESC');
  return $result->result_array();
}

 public function image($bild,$PID){
   $this->db->set('Bild', $bild);
   $this->db->where('PID', $PID);
   $this->db->update('Produkte');
 }

public function delete($id){
    $this->db->where('PID', intval($id));
    $this->db->delete('Produkte');
      }

/*public function update($id, $headline, $content, $preis)
   {
    $this->db->set('Name', $headline);
    $this->db->set('Beschreibung', $content);
    $this->db->set('Preis', $preis);
    $this->db->where('PID', intval($id));
    $this->db->update('Produkte');
   }*/
      
  public function getPath(){
    $result = $this->db->query('SELECT Bild FROM Produkte ORDER BY PID DESC');
    return $result->result_array();
  }
   
}