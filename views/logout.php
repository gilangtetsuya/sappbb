<?php 
require_once '../app/init.php';
$Users->_delLogSession($_SESSION['user_sap'], $_SESSION['user_time']);
$Users->_logUsers($_SESSION['user_sap'], "logout ke sistem");
session_destroy();
header('location: ../');
?>