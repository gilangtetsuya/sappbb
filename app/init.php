<?php 
ob_start();
session_start();
require 'database/db_oci.php';
// set autolad class model
function _getModel($modelName) {
    $file = "models/".$modelName.".model.php";
    require $file;
}
spl_autoload_register('_getModel');
try {
    $Getdata = new Getdata($link);
    $Insert  = new Insert($link);
    $Update  = new Update($link);
    $Paginate = new Paginate($link); 
} catch (Exception $e) {
    die("Error message: " . $e->getMessage() . "\n");
}
// get template element
function get_header($data) {
    $file = "template/header.php";
    require $file;
}
function get_sidenav() {
    $file = "template/sidenav.php";
    require $file;
}
function get_footer() {
    $file = "template/footer.php";
    require $file;
}
?>