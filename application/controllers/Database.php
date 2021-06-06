<?php
class Database extends CI_Controller {
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Db_model');
        }
    


        
    

    public function index($page = "datapage")
    {
        if ( ! file_exists(APPPATH.'views/dataview/'.$page.'.php'))
        {
              show_404();
        }
        else
        {    
            $path = $this->Db_model->getPath();
            $_SESSION["existpath"] = "false";
            if ($path[0]['Bild'] != ""){
            $_SESSION["existpath"] = "true";
            }
      
      
        
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

   

 public function image(){
    $bild = $_SESSION['bild'];
    $pids = $this->Db_model->getPID();
    $this->Db_model->image($bild, $pids[0]['PID']);
    redirect("/");   
        
        }

    
 public function delete(){
    $id = $this->input->post('id');
     $this->Db_model->delete($id);
     }
        
 /*public function update(){
      $headline = $this->input->post('headline');
      $content = $this->input->post('content');
      $preis = $this->input->post('preis');
      $id=$this->input->post('id');
     $this->Db_model->update($id,$headline,$content,$preis);
    }*/
    
   
}