<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
       parent::__construct();
       $this->load->model('Login_model');
    }


    public function view(){

         if($_POST){
            // lässt das Login_model überprüfen, ob die durch die login-View übergebenen Daten zu einem Admin gehören
            //Wenn dies nicht der Fall ist ist $result leer
            $result = $this->Login_model->check_user($_POST);

            //überprüft, ob $result leer ist
            if(!empty($result)){

                $data = array(
                        'id_user' => $result->ID,
                        'username' => $result->User

                );

                $this->session->set_userdata($data);
                redirect(''); 
             //Benutzer wird angemeldet
            }
            else{

              //Benutzer erhält eine Fehlermeldung
                $this->session->set_flashdata('flash_data', 'Benutzername oder Passwort falsch');
                redirect('Login/view');
            }
        }

        $this->load->view("login");

    }
    //Meldet den Admin ab.
    public function logout() {
        $data = array('id_user', 'username');
        $this->session->unset_userdata($data);
        redirect('');
        }
       
}
