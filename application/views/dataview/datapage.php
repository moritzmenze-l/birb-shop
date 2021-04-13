<!DOCTYPE html>
<html>
<head>
     <title>Datapage</title>
</head>
<body>
     <h1>Produkte</h1>
     <br>
     <br>
     
    

<script>




$(document).ready(function(e){

  $("#submit").click(function(){
  
    if($("#id").val()!=""){
       var func = "<?php echo site_url("db/update"); ?>";
       console.log($("#id").val());
    }
    else{
       var func = "<?php echo site_url("db/create"); ?>";
       console.log("test")
    }

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
   $(".edit").click(function(){
          var id = $(this).data("id");
          //alert("EDIT " + id);
          console.log($(this).closest('.card-header').data("headline"));
          // for debug-console
          console.log($(this).parent().next().find("p").data("content"));
          // for debug-console
          $("#headline").val($(this).closest('.card-header').data("headline"));
          $("#content").val($(this).parent().parent().next().find("p").data("content"));
          $("#id").val(id);
     });

});

</script>
<div class="container">
 <?php   
    foreach ($content as $data_item){
      $session = $this->session->userdata('id_user');
      if(!empty($session)){
        $is_admin = '
        <div data-id=" '.$data_item['PID'].' " class="trash float-right" style="cursor:pointer"><i class="fas fa-trash"></i></div>
        <div data-id=" '.$data_item['PID'].' " class="edit float-right" style="cursor:pointer"><i class="fas fa-edit"></i></div>
        <h6 class="card-subtitle mb-2 text-muted">'.$data_item["PID"].'</h6>
        ';
      }
      else{
        $is_admin = '';
      }

    echo '
 
    <div class="card bg-dark text-white"" id="entry'. $data_item['PID'] .'" >
       
           <div class="card-header" data-headline="'.$data_item["Name"].'">
           <h5>'.$data_item ["Name"].$is_admin.'</h5>
    
             
           </div>
          <div class="card-body">
             
             <p class="card-text" data-content="'.$data_item["Beschreibung"].'">'.$data_item["Beschreibung"].'</p>
    
            </div>
          
    </div>';
    }
  ?>
</div>
<?php
  
  if(!empty($session)){
    echo' 
       <div class="container">
        <div class="card bg-dark text-white">
         <form  id="myForm">
          <div class="form-group">
            <label for="exampleFormControlInput1 myForm">Name</label>
            <input type="Name" class="form-control" id="headline" placeholder="Produkt Name" name="headline">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1 myForm">Beschreibung</label>
            <input type="Beschreibung" textarea class="form-control" id="content" rows="3" name="content"></textarea>
          </div>
          <input type="hidden" id="id" name="PID" value="" class="form-control">
          <button id="submit" type="button" class="btn btn-primary">Submit</button>
        </form> 
        </div>
       </div>
      ';
  }

  ?>
 </body>
</html>