<?php 
require_once 'app/database/db_oci.php';

$numb = $_GET['zona'];
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

$zona = join($datZona[$numb], ',');

$sql = "SELECT a.thn_pelayanan, a.bundel_pelayanan, a.no_urut_pelayanan, b.nama_pemohon, b.alamat_pemohon, b.keterangan_pst, b.catatan_pst, b.status_kolektif, b.tgl_terima_dokumen_wp, b.tgl_perkiraan_selesai, b.nip_penerima, a.kd_propinsi_pemohon, a.kd_dati2_pemohon, a.kd_kecamatan_pemohon, a.kd_kelurahan_pemohon, a.kd_blok_pemohon, a.no_urut_pemohon, a.kd_jns_op_pemohon, a.kd_jns_pelayanan, a.thn_pajak_permohonan, a.status_selesai, a.kd_seksi_berkas FROM pst_detail a JOIN pst_permohonan b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.kd_jns_pelayanan IN ('01','02','03') AND a.kd_kecamatan_pemohon IN ($zona) AND a.thn_pelayanan = :thn ORDER BY a.thn_pelayanan ASC";

$query = $link->prepare($sql);

$query->bindParam(':thn', $tahun);

$query->execute();

$rows = $query->fetchAll(PDO::FETCH_BOTH);

$no = 1;

$output = array(
    "data" => array()    
);

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
        '-',
        $row['KETERANGAN_PST'],
        $row['NIP_PENERIMA']
    );
    $output['data'][] = $data;
} 

echo json_encode($output);

?>