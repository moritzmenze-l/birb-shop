<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Search extends CI_Controller{
    
    function __construct(){
        parent::__construct();//calls the superconstructor 
        $this->load->model('Search_model');
        
    }
    
    public function search_input($page="searchpage"){
        
        
        $search=$this->input->post('input');
        $data['search'] = $this->Search_model->search($search);


        $this->load->library('template');
        $this->template->set('title', ucfirst($page));
        $this->template->load('basic_template','dataview/'.$page,$data);
    }
}