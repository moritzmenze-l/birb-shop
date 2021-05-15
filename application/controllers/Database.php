<?php
class Database extends CI_Controller {
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Db_model');
        }
    

    public function mydata($page = "datapage")
 {
    if ( ! file_exists(APPPATH.'views/dataview/'.$page.'.php'))
          {
              show_404();
          }
    else
     {    

      
        
          $data["content"] = $this->Db_model->get_data();
          $this->load->library('template');
          $this->template->set('title', ucfirst($page));
          $this->template->load('basic_template','dataview/'.$page,$data);




 
       }
      
 }

 public function create(){
    $headline = $this->input->post('headline');
    $content = $this->input->post('content');
    $preis = $this->input->post('preis');
    $id = $this->Db_model->create($headline,$content,$preis);
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