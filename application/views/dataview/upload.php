
<!DOCTYPE html>
<html>
<body>



<?php

// Den Code zum hochladen haben wir von https://www.w3schools.com/php/php_file_upload.asp übernommen und entsprechend angepasst. -Maite


$target_dir = "bilder/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($_FILES["fileToUpload"]["name"] != ""){ // Überprüft, ob überhaupt eine Datei durch den Benutzer angegeben wurde. -Moritz

// Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "Die Datei ist ein Bild - " . $check["mime"] . ". ";
      $uploadOk = 1;
    } else {
      echo "Die Datei ist kein Bild. ";
      $uploadOk = 0;
    }
  }

// Check if file already exists
    if (file_exists($target_file)) {
      echo "Eine Datei mit diesem Namen existiert bereits. ";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Die Datei ist zu groß. ";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Es werden nur JPG, JPEG, PNG & GIF Dateien akzeptiert. ";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Die Datei konnte nicht hochgeladen werden. ";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Die Datei ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " wurde hochgeladen.";
      } else {
        echo "Es gab einen Fehler beim Hochladen der Datei.";
      }
    }

    $bild = $_FILES["fileToUpload"]["name"]; 
    $_SESSION['bild'] = $bild; //speichert den Namen des hochgeladenen Bildes in einer Session



    ?>

   
<?php if ($uploadOk == 1) { ?>  //Überprüft, ob die hochgeladene Datei den Anforderungen (Größe, Dateiformat...) entsprochen hat. -Maite
     
    <form action="/db/image" method="post" class="form-inline my-2 my-lg-0">  //ruft die Methode image des Database-Controllers auf 
      <button id="kaufen" type="submit" class="btn btn-success my-2 my-sm-0">Dem Produkt hinzufügen</button>
    </form>
<?php 
    }
    else{
?>
      <form action="/" method="post" class="form-inline my-2 my-lg-0"> //leitet den Benutzer auf die datapage weiter 
      <button id="kaufen" type="submit" class="btn btn-success my-2 my-sm-0">Zurück</button>
    </form>
<?php      
    }
?>    
    </body>
    </html>
<?php
}
else{
  echo "Es wurde kein Bild ausgewählt."; //
}

//Maite
?>
