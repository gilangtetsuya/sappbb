<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once '../app/init.php';
$user = $Users->_getDataUsersById($_SESSION['user_sap']);
$data = array(
     'thn_pelayanan' => $_POST['thn_pelayanan'],
     'bundel_pelayanan' => $_POST['bundel_pelayanan'],
     'no_urut_pelayanan' => $_POST['urut_pelayanan'],
     'tgl_terima_dok' => $_POST['tgl_masuk'],
     'tgl_selesai_dok' => $_POST['tgl_selesai'],
     'no_srt_permohonan' => $_POST['no_srt_permohonan'],
     'tgl_srt_permohonan' => $_POST['tgl_srt_permohonan'],
     'stat_kol' => $_POST['status_kol'],
     'kd_jns_pelayanan' => $_POST['jns_pelayanan'],
     'kd_prov' => $_POST['kd_prov'],
     'kd_dati2' => $_POST['kd_dati2'],
     'kd_kec' => $_POST['kd_kec'],
     'kd_kel' => $_POST['kd_kel'],
     'kd_blok' => $_POST['kd_blok'],
     'no_urut' => $_POST['no_urut'],
     'kd_jns_op' => $_POST['kd_jns_op'],
     'thn_pajak' => $_POST['thn_pajak'],
     'jns_pengurangan' => $_POST['jns_pengurangan'],
     'pct_permohonan_pengurangan' => $_POST['pct'],
     'ket_pst' => $_POST['ket_pst'],
     'nm_wp' => $_POST['nm_wp'],
     'letak_op' => $_POST['alamat_pemohon'],
     'l_permohonan' => $_POST['l_permohonan'],
     'l_surat_kuasa' => $_POST['l_surat_kuasa'],
     'l_ktp_wp' => $_POST['l_ktp_wp'],
     'l_sertifikat_tanah' => $_POST['l_sertifikat_tanah'],
     'l_sppt' => $_POST['l_sppt'],
     'l_imb' => $_POST['l_imb'],
     'l_akte_jual_beli' => $_POST['l_akte_jual_beli'],
     'l_sk_pensiun' => $_POST['l_sk_pensiun'],
     'l_sppt_stts' => $_POST['l_sppt_stts'],
     'l_stts' => $_POST['l_stts'],
     'l_sk_pengurangan' => $_POST['l_sk_pengurangan'],
     'l_sk_keberatan' => $_POST['l_sk_keberatan'],
     'l_skkp_pbb' => $_POST['l_skkp_pbb'],
     'l_spmkp_pbb' => $_POST['l_spmkp_pbb'],
     'l_sket_tanah' => $_POST['l_sket_tanah'],
     'l_sket_lurah' => $_POST['l_sket_lurah'],
     'l_npwpd' => $_POST['l_npwpd'],
     'l_penghasilan' => $_POST['l_penghasilan'],
     'l_cagar' => $_POST['l_cagar'],
     'l_lain_lain' => $_POST['l_lain_lain'],
     'catatan' => $_POST['catatan_pst'],
     'nip_penerima' => $user['NIP']
);

if ($data['kd_jns_pelayanan'] == '01') {
     $txt_permohonan = 'pendaftaran data baru';
  } elseif ($data['kd_jns_pelayanan'] == '02') {
     $txt_permohonan = 'mutasi objek/subjek';
  } elseif ($data['kd_jns_pelayanan'] == '03') {
     $txt_permohonan = 'pembetulan sppt/skp/stp';
  } elseif ($data['kd_jns_pelayanan'] == '04') {
     $txt_permohonan = 'pembatalan sppt/skp';
  } elseif ($data['kd_jns_pelayanan'] == '05') {
     $txt_permohonan = 'salinan sppt/skp';
  } elseif ($data['kd_jns_pelayanan'] == '06') {
     $txt_permohonan = 'keberatan penunjukan wajib pajak';
  } elseif ($data['kd_jns_pelayanan'] == '07') {
     $txt_permohonan = 'keberatan atas pajak terhutang';
  } elseif ($data['kd_jns_pelayanan'] == '08') {
     $txt_permohonan = 'pengurangan atas besarnya pajak terhutang';
  } elseif ($data['kd_jns_pelayanan'] == '09') {
     $txt_permohonan = 'restitusi dan kompensasi';
  } elseif ($data['kd_jns_pelayanan'] == '10') {
     $txt_permohonan = 'pengurangan denda administrasi';
  } elseif ($data['kd_jns_pelayanan'] == '11') {
     $txt_permohonan = 'penentuan kembali tanggal jatuh tempo';
  } elseif ($data['kd_jns_pelayanan'] == '12') {
     $txt_permohonan = 'penundaan tanggal jatuh tempo';
  } elseif ($data['kd_jns_pelayanan'] == '13') {
     $txt_permohonan = 'pemberian informasi pbb';
  } elseif ($data['kd_jns_pelayanan'] == '14') {
     $txt_permohonan = 'pembetulan sk keberatan';
  }

  $l_per[] = '';

  if ($data['l_permohonan'] == '1') {
      $l_per['1'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_surat_kuasa'] == '1') {
      $l_per['2'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_ktp_wp'] == '1') {
      $l_per['3'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_sertifikat_tanah'] == '1') {
      $l_per['4'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_sppt'] == '1') {
      $l_per['5'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_imb'] == '1') {
      $l_per['6'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_akte_jual_beli'] == '1') {
      $l_per['7'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_sk_pensiun'] == '1') {
      $l_per['8'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_sppt_stts'] == '1') {
      $l_per['9'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_stts'] == '1') {
      $l_per['10'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_sk_pengurangan'] == '1') {
      $l_per['11'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_sk_keberatan'] == '1') {
      $l_per['12'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_skkp_pbb'] == '1') {
      $l_per['13'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_spmkp_pbb'] == '1') {
      $l_per['14'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_sket_tanah'] == '1') {
      $l_per['15'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_sket_lurah'] == '1') {
      $l_per['16'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_npwpd'] == '1') {
      $l_per['17'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_penghasilan'] == '1') {
      $l_per['18'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_cagar'] == '1') {
      $l_per['19'] = '<i class="fa fa-check"></i>';
  } 
  if ($data['l_lain_lain'] == '1') {
      $l_per['20'] = '<i class="fa fa-check"></i>';
  }
  // Get data kecamatan dan kelurahan
  $dataKec = $Getdata->_getRefKecamatan($data['kd_kec']);
  $dataKel = $Getdata->_getRefKelurahan($data['kd_kec'], $data['kd_kel']); 
  // Insert data ke semua tabel pst 
  $Insert->_isiPstPermohonan($data);
  $Insert->_isiPstLampiran($data);
  $Insert->_isiPstDetail($data);
  if ($data['kd_jns_pelayanan'] == '01') {
     $Insert->_isiPstDataOpBaru($data);
  }
  if ($data['kd_jns_pelayanan'] == '08' || $data['kd_jns_pelayanan'] == '10') {
     $Insert->_isiPstPermohonanPengurangan($data);
  }
  if ($data['kd_jns_pelayanan'] == '03' || $data['kd_jns_pelayanan'] == '04' || $data['kd_jns_pelayanan'] == '06' || $data['kd_jns_pelayanan'] == '07' || $data['kd_jns_pelayanan'] == '08' || $data['kd_jns_pelayanan'] == '10' || $data['kd_jns_pelayanan'] == '14') {
     $Insert->_isiTempDataOp($data);
  }
  // update tabel max urut pst
  $Update->_updateNourutPst($data['no_urut_pelayanan']);
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1">
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <title>SAP | Tanda Terima</title>
    <link rel="stylesheet" href="../assets/css/print.css">
    <link rel="stylesheet" href="../assets/plugin/font-awesome/css/font-awesome.min.css">  
  </head> 
 <body>
    <div class="print-content">
    <div class="head-title">
     <img src="../assets/img/logo.png" alt="">
     <h3>Formulir Pelayanan Wajib Pajak Bumi Dan Bangunan</h3>
     <h3>Badan Pendapatan Kota Makassar</h3>
     <h4>Jl. Urip Sumiharjo No.8</h4>   
    </div>      
    <div class="left-area">
      <div class="inner">
       <span><label>1. nomor pelayanan</label>: <?= $data['thn_pelayanan'] . '.' . $data['bundel_pelayanan'] . '.' . $data['no_urut_pelayanan'] ?></span>
       <span><label>2. tanggal pelayanan</label>: <?= $data['tgl_terima_dok'] ?></span>
       <span><label>3. tgl. selesai (perkiraan)</label>: <?= $data['tgl_selesai_dok'] ?></span> 
      </div>
    </div>
    <div class="info-data">
     <label>4. jenis pelayanan</label> <span>: <?= $txt_permohonan ?></span>        
    </div>
    <div class="info-data">
     <label>5. nop</label> <span>: <?= $data['kd_prov'] . '.' . $data['kd_dati2'] . '.' . $data['kd_kec'] . '.' . $data['kd_kel'] . '.' . $data['kd_blok'] . '-' . $data['no_urut'] . '.' . $data['kd_jns_op'] ?></span>    
    </div>
    <div class="info-data" style="text-align: center;">
      <span>a. Data Wajib/Objek Pajak Dan Keterangan</span>
    </div>
    <div class="info-data">
     <label>6. nama pemohon</label> <span>: <?= $data['nm_wp'] ?></span><br>    
     <label>&nbsp;&nbsp;&nbsp;&nbsp;alamat pemohon</label> <span>: <?= $data['letak_op'] ?></span>      
    </div>
    <div class="info-data">
     <label>7. letak objek pajak</label> <span>: <?= $data['letak_op'] ?></span><br>    
     <label>&nbsp;&nbsp;&nbsp;&nbsp;kelurahan</label> <span>: <?= $dataKel['NM_KELURAHAN'] ?></span><br>        
     <label>&nbsp;&nbsp;&nbsp;&nbsp;kecamatan</label> <span>: <?= $dataKec['NM_KECAMATAN'] ?></span>        
    </div>
    <div class="info-data">
     <label>8. keterangan</label> <span>: <?= $data['ket_pst'] ?></span>    
    </div>
    <div class="info-data" style="text-align: center;">
      <span>b. penerimaan berkas</span>
    </div>
    <div class="info-data" style="padding-bottom: 15px;">
     <label>9. dokumen dilampirkan</label> : <br>
     <div class="col-print">
      <div class="main">
        <span>1. pengajuan permohonan <b><?= $l_per['1'] ?></b></span>  
        <span>2. surat kuasa <b><?= $l_per['2'] ?></b></span>
        <span>3. FC KTP/SIM dan KK <b><?= $l_per['3'] ?></b></span> 
        <span>4. FC sertifikat/kepemilikan <b><?= $l_per['4'] ?></b></span>
        <span>5. asli SPPT <b><?= $l_per['5'] ?></b></span> 
        <span>6. FC IMB <b><?= $l_per['6'] ?></b></span>
        <span>7. FC AK. jual beli/hibah <b><?= $l_per['7'] ?></b></span>    
      </div>
      <div class="main">
        <span>8.  FC SK Pensiun/Vetran <b><?= $l_per['8'] ?></b></span> 
        <span>9.  FC SPPT/SSPD/Bukti Lunas <b><?= $l_per['9'] ?></b></span>
        <span>10. Asli SSPD/Bukti Lunas PBB <b><?= $l_per['10'] ?></b></span>   
        <span>11. FC SK Pengurangan <b><?= $l_per['11'] ?></b></span>
        <span>12. FC SK Keberatan <b><?= $l_per['12'] ?></b></span> 
        <span>13. FC SSPD BPHTB <b><?= $l_per['13'] ?></b></span>
        <span>14. Surat ket. tidak mampu <b><?= $l_per['14'] ?></b></span>  
      </div>
      <div class="main">
        <span>15. Sket tanah camat cq lurah <b><?= $l_per['15'] ?></b></span>
        <span>16. Sket lurah <b><?= $l_per['16'] ?></b></span>  
        <span>17. NPWP/NPWPD <b><?= $l_per['17'] ?></b></span>
        <span>18. rincian penghasilan <b><?= $l_per['18'] ?></b></span> 
        <span>19. SK Cagar Budaya <b><?= $l_per['19'] ?></b></span>
        <span>20. Lain-lain <b><?= $l_per['20'] ?></b></span>   
      </div>
     </div>
     <label>10. catatan</label> :  <span><?= $data['catatan'] ?></span><br>
     <label>petugas penerima berkas</label> : <span><?= $user['USERNAME'] ?></span> 
     <label style="float: right;">nip : <?= $user['NIP'] ?></label>
    </div>
    <div class="info-data">
      <div class="head-title">
        <img src="../assets/img/logo.png" alt="">
        <h3>Formulir Pelayanan Wajib Pajak Bumi Dan Bangunan</h3>
        <h3>Badan Pendapatan Kota Makassar</h3>
        <h4>Jl. Urip Sumiharjo No.8</h4>   
       </div>   
      <div class="inner-right">
       <label>11. nop : </label><span style="margin-left: -70px;"><?= $data['kd_prov'] . '.' . $data['kd_dati2'] . '.' . $data['kd_kec'] . '.' . $data['kd_kel'] . '.' . $data['kd_blok'] . '-' . $data['no_urut'] . '.' . $data['kd_jns_op'] ?></span>
       <div class="title-kantor">
        <span>dispenda kota makassar</span>
        <span>jl. urip sumiharjo no.8</span> 
       </div>
       <div class="title-tt">
        tanda pendaftaran pelayanan
       </div>
       <label>16. permohonan</label> : <span><?= $txt_permohonan ?></span>
      </div>
      <div class="inner-left">
       <label>12. nomor pelayanan</label> : <span><?= $data['thn_pelayanan'] . '.' . $data['bundel_pelayanan'] . '.' . $data['no_urut_pelayanan'] ?></span>
       <label>13. tanggal masuk</label> : <span><?= $data['tgl_terima_dok'] ?></span>
       <label>14. tgl. perkiraan (selesai)</label> : <span><?= $data['tgl_selesai_dok'] ?></span>
       <br><br>
       <label style="width: 250px; margin-bottom: 40px;">15. petugas penerima berkas</label>
       <label><?= $user['USERNAME'] ?></label>
       <label>nip : <?= $user['NIP'] ?></label>
      </div>
      <div class="cf"></div>
    </div>
    <label class="end-menu">17. catatan</label> : <span class="text"><?= $data['catatan'] ?></span>
    <div class="btn-area">
     <button type="button" id="btn-print" onclick="window.print()">Print</button>   
     <button type="button" id="btn-print" onclick="load_back()">Kembali</button>
    </div>
   </div> 
 <script>
  function load_back() {
      window.document.location="input-permohonan.php";
  }
</script>  
 </body>  
</html>