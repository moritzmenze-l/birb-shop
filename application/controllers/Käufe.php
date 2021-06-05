<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Käufe extends CI_Controller{
    
    function __construct(){
        parent::__construct();//calls the superconstructor 
        $this->load->model('käufe_model');
        
    }

    public function index(){

        // Macht die Informationen über den Käufer und die gekauften produkte für die view zugänglich
        $data["käufer"] = $this->käufe_model->get_kaeufer();
        $data["kauf"] = $this->käufe_model->get_kauf_info();

        // view wird geladen
        $this->load->library('template');
        $this->template->set('title', 'Käufe');
        $this->template->load('basic_template','dataview/kaeufe',$data);

    }
}