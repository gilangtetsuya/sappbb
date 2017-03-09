<?php 
require_once '../init.php';
// set variable send data
$data = [
   'kd_prov' => $_GET['prov'],
   'kd_dati2' => $_GET['dati2'],
   'kd_kec' => $_GET['kec'],
   'kd_kel' => $_GET['kel'],
   'kd_blok' => $_GET['blok'],
   'no_urut' => $_GET['urut'],
   'kd_jns_op' => $_GET['kode'],
   'thn_pajak' => $_GET['thn']
];

$data1 = $Getdata->cek_data_njop($data);

$njop_bumi = ($data1['NJOP_BUMI'] != 0 && $data1['TOTAL_LUAS_BUMI'] != 0) ? ($data1['NJOP_BUMI'] / $data1['TOTAL_LUAS_BUMI']) : "000";
$njop_bng = ($data1['NJOP_BNG'] != 0 && $data1['TOTAL_LUAS_BNG'] != 0) ? ($data1['NJOP_BNG'] / $data1['TOTAL_LUAS_BNG']) : "000";
$njop_pbb = ($data1['NJOP_BUMI'] + $data1['NJOP_BNG']);

$result = array(
   $data['kd_prov'] . "." . $data['kd_dati2'] . "." . $data['kd_kec'] . "." . $data['kd_kel'] . "." . $data['kd_blok'] . " - " . $data['no_urut'] . "." . $data['kd_jns_op'],
   $data['thn_pajak'],
   $data1['NM_WP'], 
   $data1['JALAN_WP'] . " " . $data1['BLOK_KAV_NO_WP'],
   $data1['JALAN_OP'] . " " . $data1['BLOK_KAV_NO_OP'],
   number_format($data1['TOTAL_LUAS_BUMI']) . " m2",
   number_format($njop_bumi),
   number_format($data1['TOTAL_LUAS_BNG']) . " m2",
   number_format($njop_bng),
   number_format($data1['NJOP_BUMI']),
   number_format($data1['NJOP_BNG']),
   number_format($njop_pbb)
);

echo json_encode($result);
?>