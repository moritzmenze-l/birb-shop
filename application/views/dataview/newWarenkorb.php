<!DOCTYPE html>
<html>
<head>
     <title>Warenkorb</title>
</head>
<body>
     <br>
     <center> <font color=32383E> <h1>Warenkorb</h1> </font> </center>
     <br>

     
<?php
// Die Buttons um zu Kaufen und den gesamten Warenkorb zu leeren sollen nur sichtbar sein, wenn im Warenkorb auch etwas drin ist. -Moritz
if(!empty($_SESSION['warenkorb'])){?>
<div class="container">
<div class="card bg-dark">
<div class="card-header">
<div class="row">
    <div class="col">
      <form action="/warenkorb/del" method="post" class="form-inline my-2 my-lg-0">
      <input name="pid" type="hidden" value="'.$data_item['PID'].'">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Warenkorb leeren</button>
      </form>
    </div>
    <div class="col">
      <div class="text-center text-white">
        <h5><?php echo "Gesamtpreis: ".$preis."€"; ?></h5>
      </div>
    </div>
    <div class="col">
    <div class=" float-right">
      <form action="/data/kaufen" method="post" class="form-inline my-2 my-lg-0">
      <input name="pid" type="hidden" value="'.$data_item['PID'].'">
        <button id="kaufen" type="submit" class="btn btn-success my-2 my-sm-0">Kauf bestätigen</button>
      </form>
    </div>
    </div>
  </div>
</div>
</div>
<br>
</div>
<?php } ?>





<div class="container">
<?php
foreach ($contents as $item){
    foreach ($item as $data_item){
    echo '
    <div>
     <div class="card bg-dark text-white"" id="entry'. $data_item["PID"] .'" >
       
            <div class="card-header" data-headline="'.$data_item["Name"].'">
            
            <h5>'.$data_item ["Name"].'</h5>
            <form action="/warenkorb/remove" method="post" class="form-inline my-2 my-lg-0">
            <input name="pid" type="hidden" value="'.$data_item['PID'].'">
              <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Entfernen</button>
            </form>
            
             
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