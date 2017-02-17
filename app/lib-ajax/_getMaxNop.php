<?php
require_once '../init.php';
// set variable send data
$prov = $_GET['prov'];
$dati2 = $_GET['dati2'];
$kec = $_GET['kec'];
$kel = $_GET['kel'];
$blok = $_GET['blok'];

$data = $Getdata->_getMaxNop($prov, $dati2, $kec, $kel, $blok);

$maxUrut = $data['MAXURUT'];

echo $maxUrut; 
?>