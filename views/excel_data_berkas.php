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

$output = array();

foreach ($query as $row) {
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
    } else {
        $txt_permohonan = "";
    }
    if ($row['STATUS_SELESAI'] == 2) {
        $status = 'Terproses';
    } 
    if ($row['STATUS_SELESAI'] == 0) {
        $status = 'Tanpa Keterangan';
    }
    $dataSeksi = $Getdata->_getRefSeksiPenerima($row['KD_SEKSI_BERKAS']);
    $data = array(
        "tgl_masuk" => $row['TGL_TERIMA_DOKUMEN_WP'],
        "jns_kol" => $statkol,
        "no_pelayanan" => $row['THN_PELAYANAN']."-".$row['BUNDEL_PELAYANAN']."-".$row['NO_URUT_PELAYANAN'],
        "jns_pelayanan" => $txt_permohonan,
        "nop" => $row['KD_PROPINSI_PEMOHON'].'.'.$row['KD_DATI2_PEMOHON'].'.'.$row['KD_KECAMATAN_PEMOHON'].'.'.$row['KD_KELURAHAN_PEMOHON'].'.'.$row['KD_BLOK_PEMOHON'].'-'.$row['NO_URUT_PEMOHON'].'.'.$row['KD_JNS_OP_PEMOHON'],
        "nama_pemohon" => $row['NAMA_PEMOHON'],
        "alamat_pemohon" => $row['ALAMAT_PEMOHON'],
        "nop_baru" => "-",
        "tgl_per_selesai" => $row['TGL_PERKIRAAN_SELESAI'],
        "status" => $status,
        "penerima_berkas" => $dataSeksi['NM_SEKSI'],
        "ket" => $row['KETERANGAN_PST'],
        "nip_penerima" => $row['NIP_PENERIMA']
    );
    $output[] = $data;
}

$phpExcel->set_query($output);
$phpExcel->set_header(array('Tgl Masuk', 'Jenis Kol.', 'No. Pelayanan', 'Jenis Pelayanan', 'NOP', 'Nama Pemohon', 'Alamat Pemohon', 'NOP Baru', 'Tgl Perkiraan Selesai', 'Status', 'Seksi Penerima Berkas', 'Ket.', 'NIP Penerima'));
$phpExcel->set_column(array('tgl_masuk', 'jns_kol', 'no_pelayanan', 'jns_pelayanan', 'nop', 'nama_pemohon', 'alamat_pemohon', 'nop_baru', 'tgl_per_selesai', 'status', 'penerima_berkas', 'ket', 'nip_penerima'));
$phpExcel->exportTo2007("Data berkas zona ".$numZona." tahun ".$tahun);

?>