<?php 
require_once 'app/init.php';
?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login Page</title>
   <link rel="icon" type="iamge/x-icon" href="./assets/img/favicon.ico">
   <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="./assets/css/style.css"> 
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]--> 
 </head>
<body>
   
   <div class="container">
    <div class="row">
     <div class="col-sm-4 col-sm-offset-4">
      <div class="panel login-panel">
         <img src="./assets/img/favicon.ico" class="img-responsive center-block" width="70" height="70" alt="Login image">   
       <h2 class="login-title text-center">SAP PBB</h2>
       <p class="text-center">Sistem Administrasi Pelayanan PBB</p>
       <p class="text-center">Badan Pendapatan Daerah Kota Makassar</p>
       <hr>
       <div class="panel-body">
        <form method="post" name="f1" autocomplete="off">
          <div class="form-group">
           <input type="text" name="username" class="form-control form-line _user" placeholder="Username">   
          </div>  
          <div class="form-group">
           <input type="password" name="password" class="form-control form-line _pass" placeholder="Password">   
          </div>
          <button type="submit" class="btn btn-teal _login">Log in</button>
        </form>  
       </div>   
      </div>
     </div>    
    </div>   
   </div>

   <footer class="login-footer">
    <span>Sistem Administrasi Pelayanan PBB &copy; <?php echo date('Y') ?> All rights reserved</span>   
   </footer>

  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/functions.js"></script>
 </body>
</html>