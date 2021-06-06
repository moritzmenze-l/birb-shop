<?php
class Kaufen extends CI_Controller {
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Kaufen_model');
    }

            
    
    // nachname, vorname und adresse werden an das Kaufen_model weitergegeben. -Maite
        
    public function create(){
        // speichert die Daten des Käufers
        $nachname = $this->input->post('nachname');
        $vorname = $this->input->post('vorname');
        $adresse = $this->input->post('adresse');
        $this->Kaufen_model->create($nachname,$vorname,$adresse);

        // holt die KID des Käufers
        $kids = $this->Kaufen_model->getKid();

        /* übergibt die KID des Käufers, um die gekauften Produkte festzuhalten
        Die allererste KID im Array ist die des Käufers,
        da der momentane Käufer durch die automatisch generierten KIDs die größte haben muss */
        $this->Kaufen_model->savekauf($kids[0]['KID']);

        // leert den Warenkorb
        if (isset($_SESSION['warenkorb'])){
           $_SESSION['warenkorb'] = array();
        }

        // Gibt eine Rückmeldung über den Erfolg des Kaufs
        echo "<script>
        alert('Kauf erfolgreich abgeschlossen');
        window.location.href='/';
        </script>";
    }
}
// -Moritz