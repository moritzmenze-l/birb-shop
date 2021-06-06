<!DOCTYPE html>
<html>
<head>
     <title>Produkte</title>
</head>
<body>
     <br>
     <center> <font color=32383E> <h1>Produkte</h1> </font> </center>
     <br>
     
     
    

<script>




$(document).ready(function(e){

  $("#submit").click(function(){
  
    /*if($("#updateid").val()!=""){
      console.log("testup");
       var func = "<?php //echo site_url("db/update"); ?>";
       console.log($("#updateid").val());
    }
    else{*/
       var func = "<?php echo site_url("db/create"); ?>";
       console.log("test");
    //}

   $.ajax({
      type:"POST",
      url: func,
      data:$("#myForm").serialize(),
      success: function (response) {
              $("#myForm").trigger("reset");
              window.location.reload();
       }
    });
  });
  
   $(".trash").click(function(){
      var id = $(this).data("id");
      $.ajax({
          type:"POST",
          url: "<?php echo site_url('db/delete');?>",
          data:"id="+id,
          success: function (response) {
          id = id.trim();
          $("#entry"+id).fadeOut("slow");
          }
       ,})

    });
   /*$(".edit").click(function(){
          var id = $(this).data("id");
          alert("EDIT " + id);
          console.log($(this).closest('.card-header').data("headline"));
          // for debug-console
          console.log($(this).parent().next().find("p").data("content"));
          // for debug-console
          $("#updateheadline").val($(this).closest('.card-header').data("headline"));
          $("#updatecontent").val($(this).parent().parent().next().find("p").data("content"));
          $("#updateid").val(id);
     });*/

});

</script>

<style>
  input[type=submit] {
  background-color: #007BFF;
  border: none;
  border-radius: 7px;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  }
  
  input[type="file"] {
  display: none;
  } 

  .custom-file-upload {
  background-color: #007BFF;
  border: none;
  border-radius: 7px;
  color: white;
  display: inline-block;
  padding: 16px 32px;
  margin: 4px 2px;
  cursor: pointer;

  }
</style>



<div class="container">
 <?php  
    
    foreach ($content as $data_item){
      $session = $this->session->userdata('id_user');
      if(!empty($session)){
        $is_admin = '
        <div data-id=" '.$data_item['PID'].' " class="trash float-right" style="cursor:pointer"><i class="fas fa-trash"></i></div>
        './*<div data-id=" '.$data_item['PID'].' " class="edit float-right" style="cursor:pointer"><i class="fas fa-edit"></i></div>*/'
        <h6 class="card-subtitle mb-2 text-muted">'.$data_item["PID"].'</h6>
        ';
      }
      else{
        $is_admin = '
          <div class="d-flex flex-row-reverse">
          <form action="/warenkorb/add" method="post" class="form-inline my-2 my-lg-0">
          <input name="pid" type="hidden" value="'.$data_item['PID'].'">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Zum Warenkorb hinzufügen</button>
          </form>
        </div>  
        ';
      }

    echo '
    <div>
     <div class="card bg-dark text-white"" id="entry'. $data_item['PID'] .'" >
       
            <div class="card-header" data-headline="'.$data_item["Name"].'">
            <h5>'.$data_item ["Name"].$is_admin.'</h5>
    
             
            </div>
           <div class="card-body">
           <div class="d-flex justify-content-center">
              <img src="'.$data_item["Bild"].'" class="img-fluid" alt="Produktbild" style="width:50%">
            </div>
              <p class="card-text" data-content="'.$data_item["Beschreibung"].'">'.$data_item["Beschreibung"].'</p>
              <p class="card-text" data-preis="'.$data_item["Preis"].'">'.$data_item["Preis"].'€</p>
             
             </div>
            
     </div>
     <div class="pt-3">
     </div>
    </div>';
    }
  
  ?>
</div>
<?php
  
  if(!empty($session)){
    echo' 
       <div class="container">
       
        <div class="card px-4 pt-3 pb-3 bg-dark text-white">
         <form  id="myForm">
          <div class="form-group">
            <label for="exampleFormControlInput1 myForm">Name</label>
            <input type="text" class="form-control" id="updateheadline" placeholder="Produkt Name" name="headline">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1 myForm">Beschreibung</label>
            <input type="text" textarea class="form-control" id="updatecontent" rows="3" name="content"></textarea>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1 myForm">Preis in €</label>
            <input type="number" textarea class="form-control" id="updatepreis" rows="3" name="preis"></textarea>
          </div>

          './* Hier liegt vermutlich der Fehler des Edit-Problems.
          Bei name="PID" müsste nicht "PID" sondern nur "id" stehen. */'
          <input type="hidden" id="updateid" name="PID" value="" class="form-control">
          <button id="submit" type="button" class="btn btn-primary">Submit</button>
        </form> 
        </div>
       
       ';
       // Die Option, ein Bild einzustellen soll nur möglich sein, wenn der letzte Eintrag noch kein Bild hat
       if($_SESSION["existpath"] == "false"){
       echo '
       <div class="pt-3">
       </div>
       
       <div class="card px-4 pt-1 pb-3 bg-dark text-white">

       <div class="pt-3">
       </div>
 
       
            <!DOCTYPE html>
       <html>
       <body>

        <form action="data/upload" method="post" enctype="multipart/form-data">
        Fügen Sie Ihrem Produkt ein Bild hinzu:
        <label for="fileToUpload" class="custom-file-upload">
        Bild auswählen
        <input type="file" name="fileToUpload" id="fileToUpload">
        </label>
        <input type="submit" value="Bild hochladen" name="submit">
        </form>

      </body>
      </html>


      </div>
      </div>
      ';
      };
      echo '
      <div class="pt-3">
      </div>

      ';

     
       
      
      

  }

  


  ?>



 </body>
</html>