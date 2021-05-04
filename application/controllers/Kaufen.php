<?php
class Kaufen extends CI_Controller {
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Kaufen_model');
        }

        public function mydata($page = "kaeufe")
        {
           if ( ! file_exists(APPPATH.'views/dataview/'.$page.'.php'))
                 {
                     show_404();
                 }
           else
            {    
       
             
               
                 $data["nachname"] = $this->Kaufen_model->get_data();
                 $this->load->library('template');
                 $this->template->set('title', ucfirst($page));
                 $this->template->load('basic_template','dataview/'.$page,$data);
       
       
       
       
        
              }
             
        }

    public function create(){
         $nachname = $this->input->post('nachname');
        $vorname = $this->input->post('vorname');
        $adresse = $this->input->post('adresse');
        $id = $this->Kaufen_model->create($nachname,$vorname,$adresse);
        echo $id;
        }
}