<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once '../app/init.php';
$noPelayanan = $_GET['thn_p'] . '.' . $_GET['bundel_p'] . '.' .$_GET['no_urut_p'];
$row1 = $Getdata->_getDataBerkasByNoPelayanan($noPelayanan);
$row2 = $Getdata->_getDataLampiran($noPelayanan);
$data = array(
     'thn_pelayanan' => $_GET['thn_p'],
     'bundel_pelayanan' => $_GET['bundel_p'],
     'no_urut_pelayanan' => $_GET['no_urut_p'],
     'tgl_terima_dok' => $row1['TGL_TERIMA_DOKUMEN_WP'],
     'tgl_selesai_dok' => $row1['TGL_PERKIRAAN_SELESAI'],
     'kd_jns_pelayanan' => $row1['KD_JNS_PELAYANAN'],
     'kd_prov' => $row1['KD_PROPINSI_PEMOHON'],
     'kd_dati2' => $row1['KD_DATI2_PEMOHON'],
     'kd_kec' => $row1['KD_KECAMATAN_PEMOHON'],
     'kd_kel' => $row1['KD_KELURAHAN_PEMOHON'],
     'kd_blok' => $row1['KD_BLOK_PEMOHON'],
     'no_urut' => $row1['NO_URUT_PEMOHON'],
     'kd_jns_op' => $row1['KD_JNS_OP_PEMOHON'],
     'ket_pst' => $row1['KETERANGAN_PST'],
     'nm_wp' => $row1['NAMA_PEMOHON'],
     'letak_op' => $row1['ALAMAT_PEMOHON'],
     'l_permohonan' => $row2['L_PERMOHONAN'],
     'l_surat_kuasa' => $row2['L_SURAT_KUASA'],
     'l_ktp_wp' => $row2['L_KTP_WP'],
     'l_sertifikat_tanah' => $row2['L_SERTIFIKAT_TANAH'],
     'l_sppt' => $row2['L_SPPT'],
     'l_imb' => $row2['L_IMB'],
     'l_akte_jual_beli' => $row2['L_AKTE_JUAL_BELI'],
     'l_sk_pensiun' => $row2['L_SK_PENSIUN'],
     'l_sppt_stts' => $row2['L_SPPT_STTS'],
     'l_stts' => $row2['L_STTS'],
     'l_sk_pengurangan' => $row2['L_SK_PENGURANGAN'],
     'l_sk_keberatan' => $row2['L_SK_KEBERATAN'],
     'l_skkp_pbb' => $row2['L_SKKP_PBB'],
     'l_spmkp_pbb' => $row2['L_SPMKP_PBB'],
     'l_sket_tanah' => $row2['L_SKET_TANAH'],
     'l_sket_lurah' => $row2['L_SKET_LURAH'],
     'l_npwpd' => $row2['L_NPWPD'],
     'l_penghasilan' => $row2['L_PENGHASILAN'],
     'l_cagar' => $row2['L_CAGAR'],
     'l_lain_lain' => $row2['L_LAIN_LAIN'],
     'catatan' => $row1['CATATAN_PST'],
     'nip_penerima' => $row1['NIP_PENERIMA']
);
$dat_kec = $Getdata->_getRefKecamatan($data['kd_kec']);
$dat_kel = $Getdata->_getRefKelurahan($data['kd_kec'], $data['kd_kel']);
$dat_user = $Users->_getDataUserLikeNip($data['nip_penerima']);
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
?>
<html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1">
   <meta name="viewport" content="width=device-width, minimum-scale=1">
   <title>Tanda Terima</title>
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
     <label>&nbsp;&nbsp;&nbsp;&nbsp;kelurahan</label> <span>: <?= $dat_kel['NM_KELURAHAN'] ?></span><br>		
     <label>&nbsp;&nbsp;&nbsp;&nbsp;kecamatan</label> <span>: <?= $dat_kec['NM_KECAMATAN'] ?></span>		
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
     <label>10. catatan</label> : <span><?= $data['catatan'] ?></span><br>
     <label>petugas penerima berkas</label> : <span><?= $dat_user['USERNAME'] ?></span> 
     <label style="float: right;">nip : <?= $data['nip_penerima'] ?></label>
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
       <label>14. tgl. selesai (perkiraan)</label> : <span><?= $data['tgl_selesai_dok'] ?></span>
       <br><br>
       <label style="width: 250px; margin-bottom: 40px;">15. petugas penerima berkas</label>
       <label><?= $dat_user['USERNAME'] ?></label>
       <label>nip : <?= $data['nip_penerima'] ?></label>
      </div>
      <div class="cf"></div>
    </div>
    <label class="end-menu">17. catatan</label> : <span class="text"><?= $data['catatan'] ?></span>
    <div class="btn-area">
     <button type="button" id="btn-print" onclick="window.print()">Print</button>	
     <button type="button" id="btn-print" onclick="load_back()">Kembali</button>
    </div>
	<script>
	  function load_back() {
		  window.document.location="cetak-tanda-terima.php";
	  }
	</script>
   </div>
 </body>
</html>