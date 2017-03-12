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

$datKec = $Getdata->_getRefKecamatan($data['kd_kec']);
$datKel = $Getdata->_getRefKelurahan($data['kd_kec'], $data['kd_kel']);
$data1 = $Getdata->cek_data_njop($data);
$data2 = $Getdata->cek_data_sppt($data);
$sppt = $data2->fetch(PDO::FETCH_ASSOC);

$njop_bumi = ($sppt['NJOP_BUMI_SPPT'] != 0 && $sppt['LUAS_BUMI_SPPT'] != 0) ? ($sppt['NJOP_BUMI_SPPT'] / $sppt ['LUAS_BUMI_SPPT']) : "000";
$njop_bng = ($sppt['NJOP_BNG_SPPT'] != 0 && $sppt['LUAS_BNG_SPPT'] != 0) ? ($sppt['NJOP_BNG_SPPT'] / $sppt['LUAS_BNG_SPPT']) : "000";
$njop_pbb = ($sppt['NJOP_BUMI_SPPT'] + $sppt['NJOP_BNG_SPPT']);   

$result = array(
   $data['kd_prov'] . "." . $data['kd_dati2'] . "." . $data['kd_kec'] . "." . $data['kd_kel'] . "." . $data['kd_blok'] . " - " . $data['no_urut'] . "." . $data['kd_jns_op'],
   $data['thn_pajak'],
   $data1['NM_WP'], 
   $data1['JALAN_WP'] . " " . $data1['BLOK_KAV_NO_WP'],
   $data1['JALAN_OP'] . " " . $data1['BLOK_KAV_NO_OP'],
   $datKec['NM_KECAMATAN'],
   $datKel['NM_KELURAHAN'],
   number_format($data1['TOTAL_LUAS_BUMI']) . " <span style='text-transform: none;'>m</span><sup>2</sup>",
   number_format($njop_bumi) . " /<span style='text-transform: none;'>m</span><sup>2</sup>",
   number_format($data1['TOTAL_LUAS_BNG']) . " <span style='text-transform: none;'>m</span><sup>2</sup>",
   number_format($njop_bng) . " /<span style='text-transform: none;'>m</span><sup>2</sup>",
   number_format($sppt['NJOP_BUMI_SPPT']),
   number_format($sppt['NJOP_BNG_SPPT']),
   number_format($njop_pbb)
);


if ($data1['NM_WP'] == "" && $data1['JALAN_WP'] == "" && $data1['JALAN_OP'] == "") {
    echo "false";
} else {
    echo json_encode($result);
}

?>