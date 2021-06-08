<?php
class Login_model extends CI_Model {

    public function __construct(){
    
        $this->load->database();
    }

   //gibt Benutzerdaten aus, die den empfangenen Daten entsprechen, sofern welche vorhanden sind 
   public function check_user($data){

       $this->db->where('Benutzername', $data['username']);
       $this->db->where('Passwort', md5($data['password']));
       $result = $this->db->get('Admins')->row();
       return $result;
       
    }
}