<?php
class Pages extends CI_Controller {
    public function index()
    {
        $this->load->view('pages/home');
    }
    public function view($page = "home")
 {
    if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
          {
              show_404();
          }
    else
     {    
          $this->load->library('template');
          $this->template->set('title', ucfirst($page));   
          $this->template->load('basic_template','Pages/'.$page);


     }
 }
}