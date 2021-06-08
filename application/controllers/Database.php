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
            $data["content"] = $this->Db_model->get_data();

            //Zur Error-Verhinderung, sollte kein Produkt existieren
            if(!empty($data["content"])){

            /* Es wird überprüft, ob der letzte Eintrag in "Produkte" ein Bild hat,
            damit das einstellen eines Bildes nur erlaubt ist, wenn dem nicht so ist. */
            $path = $this->Db_model->getPath();
            $_SESSION["existpath"] = "false";
            if ($path[0]['Bild'] != ""){
            $_SESSION["existpath"] = "true";
            }

            }
      
        
          
          $this->load->library('template');
          $this->template->set('title', ucfirst($page));
          $this->template->load('basic_template','dataview/'.$page,$data);
        }

    }

    // übergibt dem Db_model die von der datapage empfangenen Daten
 public function create(){
    
    $headline = $this->input->post('headline');
    $content = $this->input->post('content');
    $preis = $this->input->post('preis');
    $id = $this->Db_model->create($headline,$content,$preis);
    echo $id;
    }

  //speichert den Bildnamen aus der session und fügt diesen dem Produkt mit der höchsten PID hinzu -Maite 

 public function image(){
    $bild = $_SESSION['bild'];
    $pids = $this->Db_model->getPID();
    $this->Db_model->image($bild, $pids[0]['PID']);
    redirect("/");   
        
        }

  //Empfängt die PID des zu löschenden Produkts und übergibt diese dem Db_model. 

 public function delete(){

    $id = $this->input->post('id');
    $name = $this->Db_model->getBild($id); //übergibt die PID des zu löschenden Produkts an die getBild()-Methode und erhält ein Array mit Produktdaten des entsprechenden Produkts
    unlink("bilder\\".$name[0]['Bild']); //löscht das Bild aus dem bilder-Ordner, welches zu dem zu löschenden Produkt gehört
     $this->Db_model->delete($id);
     redirect("/");
     }
        
 /*public function update(){
      $headline = $this->input->post('headline');
      $content = $this->input->post('content');
      $preis = $this->input->post('preis');
      $id=$this->input->post('id');
     $this->Db_model->update($id,$headline,$content,$preis);
    }*/
    
   
}

