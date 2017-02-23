<?php 

require_once 'app/init.php';

$phpExcel = new ExcelGenerator;

$query = $Users->_getAllDataUsers();

$phpExcel->set_query( $query );
$phpExcel->set_header(array('Username', 'NIP', 'Level', 'Status'));
$phpExcel->set_column(array('USERNAME', 'NIP', 'U_LEVEL', 'STATUS'));
$phpExcel->exportTo2007("Data Pengguna");

?>