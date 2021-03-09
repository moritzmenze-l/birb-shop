<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Search extends CI_Controller{
    
    function __construct(){
        parent::__construct();//calls the superconstructor 
        $this->load->model('Search_model');
        $this->load->library('breadcrumb');
    }
    
    public function search_input($page="searchpage"){
        
        $this->load->library('breadcrumb');

		// Add items
		$breadcrumb_items = [
			'Dashboard' => '/',
			'Users' => 'users',
			'Add' => 'users/add'
		];

		// Exemple : default style
		//
		// Add items
		$this->breadcrumb->add_item($breadcrumb_items);
		// Generate breadcrumb
		$data['breadcrumb_default_style'] = $this->breadcrumb->generate();

		// Exemple : Bootstrap style
		//
		// Custom style
		$template = [
			'tag_open' => '<ol class="breadcrumb">',
			'crumb_open' => '<li class="breadcrumb-item">',
			'crumb_active' => '<li class="breadcrumb-item active" aria-current="page">'
		];
		$this->breadcrumb->set_template($template);
		// Add items
		$this->breadcrumb->add_item($breadcrumb_items);
		// Generate breadcrumb
		$data['breadcrumb_bootstrap_style'] = $this->breadcrumb->generate();
      
        $search=$this->input->post('input');
        $data['search'] = $this->Search_model->search($search);


        $this->load->library('template');
        $this->template->set('title', ucfirst($page));
        $this->template->load('basic_template','dataview/'.$page,$data);
    }
}