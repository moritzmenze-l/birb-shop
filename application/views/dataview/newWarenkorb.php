<?php
foreach ($contents as $data_item){
    echo '
    <div>
     <div class="card bg-dark text-white"" id="entry'. $data_item['PID'] .'" >
       
            <div class="card-header" data-headline="'.$data_item["Name"].'">
            
    
             
            </div>
           <div class="card-body">
             
              <p class="card-text" data-content="'.$data_item["Beschreibung"].'">'.$data_item["Beschreibung"].'</p>
    
             </div>
            
     </div>
      <div class="pt-3">
      </div>
    </div>';
}

?>