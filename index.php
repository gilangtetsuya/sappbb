<?php 
require_once 'app/init.php';
$Session->_logoutProtect(); 

// if (count($_COOKIE) > 0) {
//   $Users->_delLogSession($_COOKIE['user_id'], $_COOKIE['time']);
// }

if (isset($_POST['login'])) {
    $username = addslashes(strip_tags(trim($_POST['username'])));
    $password = addslashes(strip_tags(trim($_POST['password'])));
    $login = $Users->_cekLogin($username, $password);
    $cekStatus = $Users->_cekStatus($username);
    if ($cekStatus === true) {
        echo '<script>alert("Akun anda telah di nonaktifkan oleh admin!");</script>';
    } else {
        if ($login === false) {
           echo '<script>alert("Masukkan username atau password yang valid!");</script>';
        } else {
           if ($Users->_cekLogExists($login, $username) === true) {
                $Users->_updateLogStatus("off", $login);
                $Users->_delLogByStatus("off", $login);
           }
           $_SESSION['user_sap'] = $login;
           $_SESSION['user_name'] = $username;
           $_SESSION['user_time'] = date('H:i:s');
           $_SESSION['limit_time'] = time();
           $Users->_addLogSession($_SESSION['user_sap'], $_SESSION['user_name'], date('H:i:s'));
           $Users->_logUsers($login, "login ke sistem!");
           header('Location: views/');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>SAP | Login</title>
   <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png">
   <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="./assets/css/style.min.css"> 
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]--> 
 </head>
<body class="login-body">
   
   <div class="container">
    <div class="row">
     <div class="col-sm-4 col-sm-offset-4">
      <div class="panel login-panel">
         <img src="./assets/img/logo.png" class="img-responsive center-block" alt="Login image">   
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
          <button type="submit" name="login" class="btn btn-teal btn-block _login">Log in</button>
        </form>  
       </div>   
      </div>
     </div>    
    </div>   
   </div>

   <footer class="login-footer">
    <span>Support browser : Chrome 51.0.2704.103, Firefox 47.0 & Microsoft Edge 25.10586.0.0</span> 
    <span>Sistem Administrasi Pelayanan PBB v.1.0 &copy; 2016 All rights reserved</span>   
   </footer>

  <script src="./assets/js/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
          const btnLogin = $('._login');
          var username = $('._user');
          var password = $('._pass');

          btnLogin.on('click', function () {
            if (username.val() == '' || password.val() == '') {
                alert("Masukkan username dan password anda!"); 
                username.focus();
                return false;
            } 
          });
    });
  </script>
 </body>
</html>