<?php 
require_once '../init.php';
$noPelayanan = $_GET['no_pelayanan'];
$data = $Getdata->_getDataLampiran($noPelayanan);
if ($data['L_PERMOHONAN'] == '1') {
    $l_per['1'] = 'pengajuan permohonan';
} 
if ($data['L_SURAT_KUASA'] == '1') {
    $l_per['2'] = 'surat kuasa';
} 
if ($data['L_KTP_WP'] == '1') {
    $l_per['3'] = 'FC KTP/SIM dan KK';
} 
if ($data['L_SERTIFIKAT_TANAH'] == '1') {
    $l_per['4'] = 'FC sertifikat/kepemilikan';
} 
if ($data['L_SPPT'] == '1') {
    $l_per['5'] = 'asli SPPT';
} 
if ($data['L_IMB'] == '1') {
    $l_per['6'] = 'FC IMB';
} 
if ($data['L_AKTE_JUAL_BELI'] == '1') {
    $l_per['7'] = 'FC AK. jual beli/hibah';
} 
if ($data['L_SK_PENSIUN'] == '1') {
    $l_per['8'] = 'FC SK Pensiun/Vetran';
} 
if ($data['L_SPPT_STTS'] == '1') {
    $l_per['9'] = 'FC SPPT/SSPD/Bukti Lunas';
} 
if ($data['L_STTS'] == '1') {
    $l_per['10'] = 'Asli SSPD/Bukti Lunas PBB';
} 
if ($data['L_SK_PENGURANGAN'] == '1') {
    $l_per['11'] = 'FC SK Pengurangan';
} 
if ($data['L_SK_KEBERATAN'] == '1') {
    $l_per['12'] = 'FC SK Keberatan';
} 
if ($data['L_SKKP_PBB'] == '1') {
    $l_per['13'] = 'FC SSPD BPHTB';
} 
if ($data['L_SPMKP_PBB'] == '1') {
    $l_per['14'] = 'Surat ket. tidak mampu';
} 
if ($data['L_SKET_TANAH'] == '1') {
    $l_per['15'] = 'Sket tanah camat cq lurah';
} 
if ($data['L_SKET_LURAH'] == '1') {
    $l_per['16'] = 'Sket lurah';
} 
if ($data['L_NPWPD'] == '1') {
    $l_per['17'] = 'NPWP/NPWPD';
} 
if ($data['L_PENGHASILAN'] == '1') {
    $l_per['18'] = 'rincian penghasilan';
} 
if ($data['L_CAGAR'] == '1') {
    $l_per['19'] = 'SK Cagar Budaya';
} 
if ($data['L_LAIN_LAIN'] == '1') {
    $l_per['20'] = 'Lain-lain';
}

echo json_encode($l_per);
?>