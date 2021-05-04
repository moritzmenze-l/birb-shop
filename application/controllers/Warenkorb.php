<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Warenkorb extends CI_Controller{
    
    function __construct(){
        parent::__construct();//calls the superconstructor 
        //$_SESSION['warenkorb'] = array();
        
    }

    public function index(){
        if (!isset($_SESSION['warenkorb'])){
            $_SESSION['warenkorb'] = array();
        }
        $data['contents'] = $_SESSION['warenkorb'];
        //print_r($data['contents']);
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
    }

    function remove(){
        if (isset($_SESSION['warenkorb'])){
            $_SESSION['warenkorb'] = array();
        }
        
        echo $_POST["pid"];
        array_push($_SESSION['warenkorb'], $_POST["pid"]);
        //redirect("/");
    }
}