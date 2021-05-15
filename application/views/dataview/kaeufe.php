<!DOCTYPE html>
<html>
<head>
     <title>getätigte Käufe</title>
</head>
<body>
     <br>
     <center> <font color=32383E> <h1>getätigte Käufe</h1> </font> </center>
     <br>
   
     


<?php
foreach ($käufer as $data_item){
 echo '
     <div>
      <div class="card bg-dark text-white"" id="entry'. $data_item['KID'] .'" >
        
          
          <div class="card-body">
            
               <p class="card-text" data-content="'.$data_item["Vorname"].'">'.$data_item["Vorname"].'</p>
               <p class="card-text" data-content="'.$data_item["Name"].'">'.$data_item["Name"].'</p>
               <p class="card-text" data-content="'.$data_item["Adresse"].'">'.$data_item["Adresse"].'</p>

               ';
               foreach ($kauf as $data){
                    if ($data['KID']=$data_item['KID']){
                         echo '<p class="card-text" data-content="'.$data["PID"].'">PID: '.$data["PID"].'</p>';
                         echo '<p class="card-text" data-content="'.$data["Name"].'">'.$data["Name"].'</p>';
                         echo '<p class="card-text" data-content="'.$data["Beschreibung"].'">'.$data["Beschreibung"].'</p>';
                         echo '<p class="card-text" data-content="'.$data["Preis"].'">'.$data["Preis"].'</p>';
                    }
               }
               echo '
             
          </div>
            
      </div>
      <div class="pt-3">
      </div>
     </div>';
     }
?>
</body>
</html>