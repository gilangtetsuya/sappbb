<?php 
require_once '../init.php';

$type = $_GET['type'];

if ($type == 1) {
    $tahun = $_GET['tahun'];
    $bundel = $_GET['bundel'];
    $urut = $_GET['urut'];
    $rows = $Getdata->_getDataBerkasLikeNoPelayanan($tahun, $bundel, $urut);
}

if ($type == 2) {
    $nop = $_GET['prov'] . $_GET['dati2'] . $_GET['kec'] . $_GET['kel'] . $_GET['blok'] . $_GET['nourut'] . $_GET['jnsop'];
    $rows = $Getdata->_getDataBerkasLikeNop($nop);        
}

if ($type == 3) {
    $pemohon = strtoupper($_GET['pemohon']);
    $rows = $Getdata->_getDataBerkasLikeNama($pemohon);
}

if ($type == 4) {
    $tgl1 = $_GET['tgl_1'];
    $tgl2 = $_GET['tgl_2'];
    $rows = $Getdata->_getDataBerkasLikeTglMasuk($tgl1, $tgl2);
}

$output = array(
    "data" => array()
);

$no = 1;

foreach ($rows as $row) {
    if ($row['STATUS_KOLEKTIF'] == 0) {
        $statkol = "INDIVIDU";
    } 
    if ($row['STATUS_KOLEKTIF'] == 1) {
        $statkol = "MASSAL/KOLEKTIF";
    }
    if ($row['KD_JNS_PELAYANAN'] == '01') {
        $txt_permohonan = 'pendaftaran data baru';
    } elseif ($row['KD_JNS_PELAYANAN'] == '02') {
        $txt_permohonan = 'mutasi objek/subjek';
    } elseif ($row['KD_JNS_PELAYANAN'] == '03') {
        $txt_permohonan = 'pembetulan sppt/skp/stp';
    } elseif ($row['KD_JNS_PELAYANAN'] == '04') {
        $txt_permohonan = 'pembatalan sppt/skp';
    } elseif ($row['KD_JNS_PELAYANAN'] == '05') {
        $txt_permohonan = 'salinan sppt/skp';
    } elseif ($row['KD_JNS_PELAYANAN'] == '06') {
        $txt_permohonan = 'keberatan penunjukan wajib pajak';
    } elseif ($row['KD_JNS_PELAYANAN'] == '07') {
        $txt_permohonan = 'keberatan atas pajak terhutang';
    } elseif ($row['KD_JNS_PELAYANAN'] == '08') {
        $txt_permohonan = 'pengurangan atas besarnya pajak terhutang';
    } elseif ($row['KD_JNS_PELAYANAN'] == '09') { 
        $txt_permohonan = 'restitusi dan kompensasi';
    } elseif ($row['KD_JNS_PELAYANAN'] == '10') {
        $txt_permohonan = 'pengurangan denda administrasi';
    } elseif ($row['KD_JNS_PELAYANAN'] == '11') {
        $txt_permohonan = 'penentuan kembali tanggal jatuh tempo';
    } elseif ($row['KD_JNS_PELAYANAN'] == '12') {
        $txt_permohonan = 'penundaan tanggal jatuh tempo';
    } elseif ($row['KD_JNS_PELAYANAN'] == '13') {
        $txt_permohonan = 'pemberian informasi pbb';
    } elseif ($row['KD_JNS_PELAYANAN'] == '14') {
        $txt_permohonan = 'pembetulan sk keberatan';
    }
    if ($row['STATUS_SELESAI'] == 2) {
        $status = 'Terproses';
    } 
    if ($row['STATUS_SELESAI'] == 0) {
        $status = 'Tanpa Keterangan';
    }
    $dataSeksi = $Getdata->_getRefSeksiPenerima($row['KD_SEKSI_BERKAS']);
    $data = array(
        $no++,
        $row['TGL_TERIMA_DOKUMEN_WP'],
        $statkol,
        $row['THN_PELAYANAN'].'.'.$row['BUNDEL_PELAYANAN'].'.'.$row['NO_URUT_PELAYANAN'],
        $txt_permohonan,
        $row['KD_PROPINSI_PEMOHON'].'.'.$row['KD_DATI2_PEMOHON'].'.'.$row['KD_KECAMATAN_PEMOHON'].'.'.$row['KD_KELURAHAN_PEMOHON'].'.'.$row['KD_BLOK_PEMOHON'].'-'.$row['NO_URUT_PEMOHON'].'.'.$row['KD_JNS_OP_PEMOHON'],
        $row['NAMA_PEMOHON'],
        $row['ALAMAT_PEMOHON'],
        '<button type="button" id="dokumen" class="btn btn-sm btn-primary" data-id="'.$row['THN_PELAYANAN'].'.'.$row['BUNDEL_PELAYANAN'].'.'.$row['NO_URUT_PELAYANAN'].'" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-text-o"></i></button>',
        '-',
        $row['TGL_PERKIRAAN_SELESAI'],
        $status,
        $dataSeksi['NM_SEKSI'],
        $row['KETERANGAN_PST'],
        $row['NIP_PENERIMA']
    );
    $output['data'][] = $data;
}

echo json_encode($output);
?>