<!DOCTYPE html>
<html>
<head>
     <title>getätigte Käufe</title>
</head>
<body>
     <br>
     <center> <font color=32383E> <h1>getätigte Käufe</h1> </font> </center>
     <br>
   
     
<script>

</script>

<?php   
    foreach ($nachname as $data_item){
 echo '
     <div>
      <div class="card bg-dark text-white"" id="entry'. $data_item['KID'] .'" >
        
          
            <div class="card-body">
            
               <p class="card-text" data-content="'.$data_item["Vorname"].'">'.$data_item["Vorname"].'</p>
               <p class="card-text" data-content="'.$data_item["Nachname"].'">'.$data_item["Nachname"].'</p>
               <p class="card-text" data-content="'.$data_item["Adresse"].'">'.$data_item["Adresse"].'</p>
             
              </div>
            
      </div>
      <div class="pt-3">
      </div>
     </div>';
     }
?>
</body>
</html>