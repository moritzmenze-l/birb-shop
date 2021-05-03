<!doctype html>
<html lang="en">
 <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,
shrink-to-fit=no">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
 <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.min.css');?>" />

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
 <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
 <script src="<?php echo base_url('assets/js/fontawesome.min.js');?>"></script>

 
 <title>birb Shop</title>
 </head>

 
 <body style="background-color:grey;">


 

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">birb</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    


      <li class="nav-item">
        <a class="nav-link" href="/">Produkte</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="/warenkorb">Warenkorb</a>
      </li>
      
      
      <li class="nav-item">
          <?php
          $session = $this->session->userdata('id_user');
          if(!empty($session)){ ?>
            <a class="nav-link" href="/login/logout">Logout</a>
          <?php }
          else{?>
            <a class="nav-link" href="/login/view">Login</a>
          <?php } ?>
      </li>
      
    </ul>
    <form action="<?= site_url('Search/search_input') ?>" method="post" class="form-inline my-2 my-lg-0">
      <input name="input" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php echo $content; ?>

 </body>
</html>

