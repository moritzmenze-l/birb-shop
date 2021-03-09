<?php
class Database extends CI_Controller {
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Db_model');
        }
       
    public function index()
    {
        
    }
    public function mydata($page = "datapage")
 {
    if ( ! file_exists(APPPATH.'views/dataview/'.$page.'.php'))
          {
              show_404();
          }
    else
     {    

          // Load library breadcrumb
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
        
          $data["content"] = $this->Db_model->get_data();
          $this->load->library('template');
          $this->template->set('title', ucfirst($page));
          $this->template->load('basic_template','dataview/'.$page,$data);




 
       }
      
 }

 public function create(){
    $headline = $this->input->post('headline');
    $content = $this->input->post('content');
    $id = $this->Db_model->create($headline,$content);
    echo $id;
    }

    
public function delete(){
    $id = $this->input->post('id');
     $this->Db_model->delete($id);
     }
        
 public function update(){
      $headline = $this->input->post('headline');
      $content = $this->input->post('content');
      $id=$this->input->post('id');
     $this->Db_model->update($id,$headline,$content);
    }
         
   
}