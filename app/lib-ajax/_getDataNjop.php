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
$data2 = $Getdata->cek_op_bersama($data);
$data3 = $Getdata->jumlah_denda($data);

$nilai_selisih = ($data1['PBB_YG_HARUS_DIBAYAR_SPPT'] + $data3['DENDA']) - $data3['JML_SPPT'];

if ($nilai_selisih == 0) {
    $stat_selisih = "";
} elseif ($nilai_selisih > 0) {
    $stat_selisih = "[ Kurang bayar ]";
} elseif ($nilai_selisih < 0) {
    $stat_selisih = "[ Lebih bayar ]";
}

$njop_bumi = ($data1['NJOP_BUMI'] != 0 && $data1['TOTAL_LUAS_BUMI'] != 0) ? ($data1['NJOP_BUMI'] / $data1['TOTAL_LUAS_BUMI']) : "000";
$njop_bng = ($data1['NJOP_BNG'] != 0 && $data1['TOTAL_LUAS_BNG'] != 0) ? ($data1['NJOP_BNG'] / $data1['TOTAL_LUAS_BNG']) : "000";
$njop_pbb = ($data1['NJOP_BUMI'] + $data1['NJOP_BNG']);
if ($data2['NJOP_BUMI_OP'] != 0 && $data2['L_BUMI_OP'] != 0) {
    $njop_bumi_op = ($data2['NJOP_BUMI_OP'] / $data2['L_BUMI_OP']);
} else {
    $njop_bumi_op = 0;
}
if ($data2['NJOP_BNG_OP'] != 0 && $data2['L_BNG_OP'] != 0) {
    $njop_bng_op = ($data2['NJOP_BNG_OP'] / $data2['L_BNG_OP']);    
} else {
    $njop_bng_op = 0;   
}

if ($data2['OP_KLS_TANAH'] == null) {
    $op_kls_tanah = '000';
} 
if ($data2['OP_KLS_BNG'] == null) {
    $op_kls_bng = '000';
}

$result = [
   'letak_op' => $data1['JALAN_OP'] . " " . $data1['BLOK_KAV_NO_OP'],
   'nama_wp' => $data1['NM_WP'],
   'letak_wp' => $data1['JALAN_WP'] . " " . $data1['BLOK_KAV_NO_WP'],
   'rw_op' => $data1['RW_OP'],
   'rt_op' => $data1['RT_OP'],
   'l_bumi' => number_format($data1['TOTAL_LUAS_BUMI']),
   'l_bng' => number_format($data1['TOTAL_LUAS_BNG']),
   'kls_bumi' => $data1['KD_KLS_TANAH'],
   'kls_bng' => $data1['KD_KLS_BNG'],
   'njop_bumi' => number_format($njop_bumi),
   'njop_bng' => number_format($njop_bng),
   't_njop_bumi' => number_format($data1['NJOP_BUMI']),
   't_njop_bng' => number_format($data1['NJOP_BNG']),
   'l_bumi_op' => number_format($data2['L_BUMI_OP']),
   'op_kls_bumi' => $op_kls_tanah,
   'njop_bumi_op' => number_format($njop_bumi_op),
   't_njop_bumi_op' => number_format($data2['NJOP_BUMI_OP']),
   'l_bng_op' => number_format($data2['L_BNG_OP']),
   'op_kls_bng' => $op_kls_bng,
   'njop_bng_op' => number_format($njop_bng_op),
   't_njop_bng_op' => number_format($data2['NJOP_BNG_OP']),
   'njop_pbb' => number_format($njop_pbb),
   'njoptkp' => number_format($data1['NJOPTKP_SPPT']),
   'pbb_terhutang' => number_format($data1['PBB_TERHUTANG_SPPT']),
   'faktor_pengurang' => number_format($data1['FAKTOR_PENGURANG_SPPT']),
   'pbb_bayar' => number_format($data1['PBB_YG_HARUS_DIBAYAR_SPPT']),
   'denda_bayar' => number_format($data3['DENDA']),
   'pbb_t_bayar' => number_format($data3['JML_SPPT']),
   'selisih' => number_format($nilai_selisih),
   'txt_selisih' => $stat_selisih,
   'tgl_jatuh_tempo' => $data1['TGL_JATUH_TEMPO_SPPT'],
   'tgl_terbit' => $data1['TGL_TERBIT_SPPT'],
   'tgl_cetak' => $data1['TGL_CETAK_SPPT'],
   'nip_pencetak' => $data1['NIP_PENCETAK_SPPT']
];

echo json_encode($result);
?>