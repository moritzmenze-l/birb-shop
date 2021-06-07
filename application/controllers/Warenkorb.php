<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Warenkorb extends CI_Controller{
    
    function __construct(){
        parent::__construct();//calls the superconstructor 
        $this->load->model('warenkorb_model');
        
    }

    public function index(){
        // initialisiert den Warenkorb als leeres Array, falls noch nicht geschehen
        if (!isset($_SESSION['warenkorb'])){
            $_SESSION['warenkorb'] = array();
        }

        /* In der Sessionvariable sind nur die PIDs der Produkte gespeichert.
        Hier werden nun die gesamten Produktinformationen der Produkte im Warenkorb für die view zugänglich gemacht */
        $data['contents'] = array();
        $data['preis'] = 0;
        foreach($_SESSION['warenkorb'] as $item){
            $result = $this->warenkorb_model->get_produkt_info($item);
            array_push($data['contents'], $result);

            //rechnet den Gesamtpreis aller Produkte im Warenkorb zusammen
            $data['preis'] = $data['preis'] + $result[0]['Preis'];
        }



        // lädt die zum controller gehörige view
        $this->load->library('template');
        $this->template->set('title', "Warenkorb");
        $this->template->load('basic_template','dataview/newWarenkorb',$data);
    }
    
    function add(){
        /* Definiert den Warenkorb als leeres Array, falls noch nicht geschehen,
        da man schon Kaufen kann, bevor der Warenkorb geöffnet wurde, also die index-Funktion gelaufen ist.*/
        if (!isset($_SESSION['warenkorb'])){
            $_SESSION['warenkorb'] = array();
        }
        
        // fügt die PID des entsprechenden Produkts in die Sessionvariable ein
        array_push($_SESSION['warenkorb'], $_POST["pid"]);
        redirect("/");
    }
    

    function del(){
        // leert den Warenkorb, indem er neu definiert wird
        if (isset($_SESSION['warenkorb'])){
            $_SESSION['warenkorb'] = array();
        }
        redirect("warenkorb");
    }

    function remove(){
        if (($key = array_search($_POST["pid"], $_SESSION['warenkorb'])) !== false) {
            unset($_SESSION['warenkorb'][$key]);
        }
        
        redirect("warenkorb");
    }
}
// -Moritz