<?php
class Kaufen extends CI_Controller {
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Kaufen_model');
        }

        

        // $this->load->library('template');
        // $this->template->set('title', ucfirst($page));
        // $this->template->load('basic_template','dataview/'.$page,$data);        
    
    public function create(){
        $nachname = $this->input->post('nachname');
        $vorname = $this->input->post('vorname');
        $adresse = $this->input->post('adresse');
        $this->Kaufen_model->create($nachname,$vorname,$adresse);

        $kids = $this->Kaufen_model->getKid($nachname,$vorname,$adresse);

        $this->Kaufen_model->savekauf($kids[0]['KID']);

        if (isset($_SESSION['warenkorb'])){
           $_SESSION['warenkorb'] = array();
        }

        redirect("/");
    }
    
}