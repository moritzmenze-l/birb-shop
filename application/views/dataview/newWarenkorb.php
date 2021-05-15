<!DOCTYPE html>
<html>
<head>
     <title>Warenkorb</title>
</head>
<body>
     <br>
     <center> <font color=32383E> <h1>Warenkorb</h1> </font> </center>
     <br>

     

<form action="/data/kaufen" method="post" class="form-inline my-2 my-lg-0">
<input name="pid" type="hidden" value="'.$data_item['PID'].'">
  <button id="kaufen" type="submit" class="btn btn-success my-2 my-sm-0">Kauf bestätigen</button>
</form>

<form action="/warenkorb/del" method="post" class="form-inline my-2 my-lg-0">
<input name="pid" type="hidden" value="'.$data_item['PID'].'">
  <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Warenkorb löschen</button>
</form>

<br>

<div class="container">
<?php
foreach ($contents as $item){
    foreach ($item as $data_item){
    echo '
    <div>
     <div class="card bg-dark text-white"" id="entry'. $data_item["PID"] .'" >
       
            <div class="card-header" data-headline="'.$data_item["Name"].'">
            
            <h5>'.$data_item ["Name"].'
            <form action="/warenkorb/remove" method="post" class="form-inline my-2 my-lg-0">
            <input name="pid" type="hidden" value="'.$data_item['PID'].'">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Entfernen</button>
            </form>
            </h5>
             
            </div>
           <div class="card-body">
             
           <p class="card-text" data-content="'.$data_item["Beschreibung"].'">'.$data_item["Beschreibung"].'</p>
           <p class="card-text" data-content="'.$data_item["Preis"].'">'.$data_item["Preis"].'</p>
    
             </div>
            
     </div>
      <div class="pt-3">
      </div>
    </div>';
}
}

?>
</div>