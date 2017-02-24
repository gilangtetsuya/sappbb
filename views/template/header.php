<?php 
require '../app/database/db_oci.php';
require_once '../app/models/Session.model.php';
require_once '../app/models/Users.model.php';
$session = new Session;
$users = new Users($link);
$session->_loginProtect();
$row = $users->_getDataUsersById($_SESSION['user_sap']);
?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="author" content="Gilang Anugrah">
   <meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>SAP | <?php echo $data['title']; ?></title>
   <link rel="icon" type="iamge/x-icon" href="../assets/img/favicon.ico">
   <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../assets/plugin/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="../assets/plugin/data-table/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="../assets/plugin/responsive-datatable/fixedHeader.bootstrap.min.css">
   <link rel="stylesheet" href="../assets/plugin/responsive-datatable/responsive.bootstrap.min.css"> 
   <link rel="stylesheet" href="../assets/plugin/datepicker/css/datepicker.min.css">
   <link rel="stylesheet" href="../assets/css/style.css"> 
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
 </head>
<body>

    <header class="mobile-header">
      <nav class="navbar navbar-default navbar-fixed-top bg-red">
       <div class="container-fluid">
        <a href="javascript:void(0)" class="navbar-brand">
          <img src="../assets/img/favicon.ico" alt="brand">
          <span>SAP PBB</span>
        </a>  
        <button type="button" class="toggle-visible"><i class="fa fa-navicon fa-2x"></i></button>
         <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" role="button" aria-haspopup="true" aria-expanded="false">
             <?php echo ucfirst($row['USERNAME']); ?> <span class="caret"></span>
            </a>
             <ul class="dropdown-menu">
              <li><a href="javascript:void(0)"><i class="fa fa-user"></i> Profile</a></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></li> 
             </ul>
           </li> 
          </ul> 
         </div>  
       </div> 
      </nav> 
    </header> <!-- main header -->