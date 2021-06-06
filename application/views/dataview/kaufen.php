<!DOCTYPE html>
<html>
<head>
     <title>Produktsuche</title>
</head>
<body>
     <br>
     <center> <font color=32383E> <h1>Persönliche Daten</h1> </font> </center>
     <br>
     

   
    

<?php
  
  
 echo' 
    
  <div class="container">
   <div class="card px-4 pt-1 pb-3 bg-dark text-white">
    <form  id="myForm" action="'.site_url("Kaufen/create").'" method="post">
      <div class="form-group">
        <label for="exampleFormControlInput1 myForm">Vorname</label>
        <input type="Name" class="form-control" id="updateheadline" placeholder="Max" name="vorname">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1 myForm">Nachname</label>
        <input type="Eintrag" textarea class="form-control" id="updatecontent" rows="3" placeholder="Mustermann" name="nachname"></textarea>
      </div>

      <div class="form-group">
      <label for="exampleFormControlTextarea1 myForm">Adresse</label>
      <input type="Eintrag" textarea class="form-control" id="updatecontent" rows="3" name="adresse"></textarea>
    </div>

      <input type="hidden" id="updateid" name="id" value="" class="form-control">
      <button id="kaufen" type="submit" class="btn btn-success">Kauf abschließen</button>
    </form> 
   </div>
   </div>
   <div class="pt-3"> 
   </div>
  ';
   
  
  ?>

</body>
</html>
  
