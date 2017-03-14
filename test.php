<?php
require_once "app/init.php";
$datUsers = $Users->_getAllDataUsers();
?>
<!doctype html>
<html>
  <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Tesing Page</title> 
     <link rel="stylesheet" href="./assets/plugin/font-awesome/css/font-awesome.min.css">    
     <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
     <style>
       .container {
         margin-top: 40px;
       }
       ul {
         list-style: none;
       }
       ul > li {
         display: block;
         padding: 6px;
         font-weight: 600;
       }
       ul > li > i {
         color: #444;
         filter: drop-shadow(0 1px 1px rgba(0,0,0,0.3));
       }
     </style>
  </head>
 <body>

    <div class="container">
         
      <ul>
        <?php 
          foreach ($datUsers as $row) {
             $statusLog = $Users->_getStatusLogByName($row['USERNAME']); 
             
             if ($statusLog == 0) {
                 $status = '<i class="fa fa-circle fa-fw"></i>';
             } else {
                 $status = '<i class="fa fa-circle fa-fw" style="color:#2ecc71;"></i>';
             }

             echo '<ul>
                   <li>'.$status." ".$row['USERNAME'].'</li>
                  </ul>';
          }
        ?>
      </ul>

    </div>
    
 </body>  
</html>