<!DOCTYPE html>
<html>
<head>
     <title>Datapage</title>
</head>
<body>
     <h1>Datapage</h1>
     <br>
     <br>
     
    

<script>




$(document).ready(function(e){

  $("#submit").click(function(){
  
    if($("#updateid").val()!=""){
       var func = "<?php echo site_url("db/update"); ?>";
    }
    else{
       var func = "<?php echo site_url("db/create"); ?>";
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
          $("#updateheadline").val($(this).closest('.card-header').data("headline"));
          $("#updatecontent").val($(this).parent().parent().next().find("p").data("content"));
          $("#updateid").val(id);
     });

});

</script>
<div class="container">
 <?php   
    foreach ($content as $data_item){
      $session = $this->session->userdata('id_user');
      if(!empty($session)){
        $is_admin = '
        <div data-id=" '.$data_item['id'].' " class="trash float-right" style="cursor:pointer"><i class="fas fa-trash"></i></div>
        <div data-id=" '.$data_item['id'].' " class="edit float-right" style="cursor:pointer"><i class="fas fa-edit"></i></div>';
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
  

 echo'    
  <div class="container">
  <form  id="myForm">
    <div class="form-group">
      <label for="exampleFormControlInput1 myForm">Name</label>
      <input type="Name" class="form-control" id="updateheadline" placeholder="Produkt Name" name="headline">
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1 myForm">Beschreibung</label>
      <input type="Beschreibung" textarea class="form-control" id="updatecontent" rows="3" name="content"></textarea>
    </div>
    <input type="hidden" id="updateid" name="PID" value="" class="form-control">
    <button id="submit" type="button" class="btn btn-primary">Submit</button>
  </form> 
  </div>
  ';

  ?>
 </body>
</html>