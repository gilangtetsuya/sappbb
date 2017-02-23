<?php 
require_once '../app/init.php';

$phpExcel = new ExcelGenerator;

$numZona = $_GET['zona'];
$tahun = $_GET['tahun'];

$datZona = [
   '1' => [
      'kd_1' => '140',
      'kd_2' => '100',
      'kd_3' => '080',
      'kd_4' => '090'
   ],
   '2' => [
      'kd_1' => '030',
      'kd_2' => '020',
      'kd_3' => '010',
      'kd_4' => '050'
   ],
   '3' => [
      'kd_1' => '110',
      'kd_2' => '060'
   ],
   '4' => [
      'kd_1' => '040',
      'kd_2' => '130',
      'kd_3' => '150',
      'kd_4' => '070'
   ]
];

$zona = $datZona[$numZona];

$query = $Getdata->_dataBerkasMasukByZona( $zona, $tahun );



?>