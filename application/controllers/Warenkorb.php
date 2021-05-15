<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Warenkorb extends CI_Controller{
    
    function __construct(){
        parent::__construct();//calls the superconstructor 
        $this->load->model('warenkorb_model');
        
    }

    public function index(){
        if (!isset($_SESSION['warenkorb'])){
            $_SESSION['warenkorb'] = array();
        }
        $data['contents'] = array();
        foreach($_SESSION['warenkorb'] as $item){
            $result = $this->warenkorb_model->get_produkt_info($item);
            array_push($data['contents'], $result);

        }

        $this->load->library('template');
        $this->template->set('title', "Warenkorb");
        $this->template->load('basic_template','dataview/newWarenkorb',$data);
    }
    
    function add(){
        if (!isset($_SESSION['warenkorb'])){
            $_SESSION['warenkorb'] = array();
        }
        
        echo $_POST["pid"];
        array_push($_SESSION['warenkorb'], $_POST["pid"]);
        redirect("/");
    }
    function test(){
        $_SESSION['warenkorb'] = array("test1", "test2");
        array_push($_SESSION['warenkorb'], "test123434");

    }

    function del(){
        if (isset($_SESSION['warenkorb'])){
            $_SESSION['warenkorb'] = array();
        }
        redirect("warenkorb");
    }

    function remove(){
        
        print_r($_SESSION['warenkorb']);
        print_r($_POST["pid"]);

        if (($key = array_search($_POST["pid"], $_SESSION['warenkorb'])) !== false) {
            unset($_SESSION['warenkorb'][$key]);
        }
        
        redirect("warenkorb");
    }
}