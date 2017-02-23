<?php 
require_once '../app/init.php';
$data = array(
    "title" => "Edit Data Berkas"
);
$tahun = $_GET['thn'];
$bundel = $_GET['bundel'];
$urut = $_GET['urut'];
$noPelayanan = $tahun.'.'.$bundel.'.'.$urut;
$dataB = $Getdata->_getDataBerkasByNoPelayanan( $noPelayanan );
$dataL = $Getdata->_getDataLampiran( $noPelayanan );
$refPelayanan = $Getdata->_getRefPelayanan();
get_header($data);
get_sidenav();
?>

  <section class="main-content">
   <div class="title-content">
    <i class="fa fa-edit"></i> <span>Edit Data Berkas</span>    
   </div> 
   <div class="container">
    <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-8">
      <div class="panel panel-success">
       <div class="panel-heading">
         Edit detail data berkas permohonan
       </div>     
       <div class="panel-body">
        <form name="f3" method="post">
         <div class="form-group">
          <div class="row">
           <div class="col-xs-2-6">
             <input type="text" name="thn_pelayanan" class="form-control input-sm" placeholder="Tahun" value="<?= $tahun ?>" readonly>   
           </div>
            <div class="col-xs-2-6">
             <input type="text" name="bundel_pelayanan" class="form-control input-sm" placeholder="Bundel" value="<?= $bundel ?>" readonly>   
           </div> 
            <div class="col-xs-2-6">
             <input type="text" name="urut_pelayanan" class="form-control input-sm" placeholder="Urut" value="<?= $urut ?>" readonly>   
            </div>  
            <div class="col-sm-3 pull-right">
             <div class="input-group">
               <input type="text" name="tgl_masuk" id="date-1" class="form-control input-sm" data-language='en' data-position='right top' placeholder="Tgl Masuk" aria-describedby="addon-1" value="<?= $dataB['TGL_TERIMA_DOKUMEN_WP'] ?>" readonly>
               <span class="input-group-addon" id="addon-1"><i class="fa fa-calendar"></i></span>   
             </div>    
            </div>
          </div>
         </div> 
         <div class="form-group">
          <div class="row">
           <div class="col-xs-5">
            <select name="status_kol" class="form-control input-sm _statKol">
             <option value="">- STATUS KOLEKTIF -</option>   
             <option value="0" <?php if ($dataB['STATUS_KOLEKTIF'] == 0) { echo "selected"; } ?>>INDIVIDU</option>
             <option value="1" <?php if ($dataB['STATUS_KOLEKTIF'] == 1) { echo "selected"; } ?>>KOLEKTIF</option>
            </select>   
           </div>
           <div class="col-xs-3 pull-right">
            <div class="input-group">
             <input type="text" name="tgl_selesai" id="date-2" class="form-control input-sm" data-language='en' data-position='right top' placeholder="Tgl Perkiraan Selesai" aria-describedby="addon-2" value="<?php echo $dataB['TGL_PERKIRAAN_SELESAI']; ?>" readonly>   
             <span class="input-group-addon" id="addon-2"><i class="fa fa-calendar"></i></span>   
            </div>
           </div>   
          </div>   
         </div> 
         <div class="form-group">
          <select name="jns_pelayanan" class="form-control input-sm _jnsPelayanan">
           <option value="">- JENIS PELAYANAN -</option>   
           <?php 
              foreach ($refPelayanan as $row) {
                 if ($row['KD_JNS_PELAYANAN'] == $dataB['KD_JNS_PELAYANAN']) {
                     $selected = "selected";
                 } else {
                     $selected = "";
                 }     
                 echo '<option value="'.$row['KD_JNS_PELAYANAN'].'" '.$selected.'>'.$row['NM_JENIS_PELAYANAN'].'</option>';
              }
            ?>
          </select>
         </div>
         <legend class="small text-muted">Data Wajib / Objek Pajak</legend>
         <div class="form-group">
          <div class="row">
           <div class="col-xs-2-5">
            <input type="text" name="kd_prov" onkeyup="autotab(this,document.f3.kd_dati2)" maxlength="2" class="form-control input-sm" placeholder="Prov" value="<?php echo $dataB['KD_PROPINSI_PEMOHON']; ?>">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_dati2" onkeyup="autotab(this,document.f3.kd_kec)" maxlength="2" class="form-control input-sm" placeholder="Dati2" value="<?php echo $dataB['KD_DATI2_PEMOHON']; ?>">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_kec" onkeyup="autotab(this,document.f3.kd_kel)" maxlength="3" class="form-control input-sm" placeholder="Kec" value="<?php echo $dataB['KD_KECAMATAN_PEMOHON']; ?>">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_kel" onkeyup="autotab(this,document.f3.kd_blok)" maxlength="3" class="form-control input-sm" placeholder="Kel" value="<?php echo $dataB['KD_KELURAHAN_PEMOHON']; ?>">   
           </div>
           <div class="col-xs-2-5">
            <input type="text" name="kd_blok" onkeyup="autotab(this,document.f3.no_urut)" maxlength="3" class="form-control input-sm" placeholder="Blok" value="<?php echo $dataB['KD_BLOK_PEMOHON']; ?>">   
           </div>    
           <div class="col-xs-2-6">
            <input type="text" name="no_urut" onkeyup="autotab(this,document.f3.kd_jns_op)" maxlength="4" class="form-control input-sm" placeholder="No Urut" value="<?php echo $dataB['NO_URUT_PEMOHON']; ?>">   
           </div>
           <div class="col-xs-2-5">
            <input type="text" name="kd_jns_op" onkeyup="autotab(this,document.f3.thn_pajak)" maxlength="1" class="form-control input-sm" placeholder="Kode" value="<?php echo $dataB['KD_JNS_OP_PEMOHON']; ?>">   
           </div>
           <div class="col-xs-2-6 pull-right">
            <input type="text" name="thn_pajak" onkeyup="autotab(this,document.f3.nama_pemohon)" maxlength="4" class="form-control input-sm" placeholder="Tahun" value="<?php echo $dataB['THN_PAJAK_PERMOHONAN']; ?>" readonly>  
           </div>
          </div>    
         </div>
          <div class="form-group">
           <div class="row">
            <div class="col-xs-5">
             <input type="text" name="nm_wp" class="form-control input-sm" placeholder="Nama Wajib Pajak / Pemohon" value="<?php echo $dataB['NAMA_PEMOHON']; ?>">   
            </div>  
            <div class="col-xs-4 pull-right">
             <select name="jns_pengurangan" class="form-control input-sm _jnsPengurangan" disabled>
              <option value="">- JENIS PENGURANGAN -</option>   
              <option value="1">PENGURANGAN PERMANEN</option>
              <option value="2">PENGURANGAN PST</option>
              <option value="3">PENGURANGAN PENGENAAN JPB</option>
              <option value="5">PENGURANGAN SEBELUM SPPT TERBIT</option>
             </select>   
            </div> 
           </div>   
          </div>
          <div class="form-group">
           <div class="row">
            <div class="col-xs-5">
             <input type="text" name="alamat_pemohon" class="form-control input-sm" placeholder="Letak Objek Pajak Pemohon" value="<?php echo $dataB['ALAMAT_PEMOHON']; ?>">   
            </div>
            <div class="col-xs-2 pull-right">
             <input type="number" name="pct" class="form-control input-sm _pct" placeholder="PCT (%)" disabled>   
            </div>     
           </div> 
          </div>
          <div class="form-group">
           <textarea name="ket_pst" cols="30" class="form-control input-sm" placeholder="Keterangan"><?php echo $dataB['KETERANGAN_PST']; ?></textarea>   
          </div>
          <legend class="small text-muted">Data NOP Baru</legend>
           <div class="form-group">
          <div class="row">
           <div class="col-xs-2-5">
            <input type="text" name="kd_prov_2" maxlength="2" class="form-control input-sm" placeholder="Prov">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_dati2_2" maxlength="2" class="form-control input-sm" placeholder="Dati2">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_kec_2" maxlength="3" class="form-control input-sm" placeholder="Kec">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_kel_2" maxlength="3" class="form-control input-sm" placeholder="Kel">   
           </div>
           <div class="col-xs-2-5">
            <input type="text" name="kd_blok_2" maxlength="3" class="form-control input-sm" placeholder="Blok">   
           </div>    
           <div class="col-xs-2-6">
            <input type="text" name="no_urut_2" maxlength="4" class="form-control input-sm" placeholder="No Urut">   
           </div>
           <div class="col-xs-2-5">
            <input type="text" name="kd_jns_op_2" maxlength="1" class="form-control input-sm" placeholder="Kode">   
           </div>
          </div>    
         </div>
          <legend class="small text-muted"><Lam></Lam>piran Dokumen</legend>
         <div class="form-group">
          <div class="row">
           <div class="col-xs-4">
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_permohonan" value="1" <?php if ($dataL['L_PERMOHONAN'] == '1') { echo "checked"; } ?>> 1. Pengajuan Permohonan   
            </label>    
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_surat_kuasa" value="1" <?php if ($dataL['L_SURAT_KUASA'] == '1') { echo "checked"; } ?>> 2. Surat Kuasa    
            </label>
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_ktp_wp" value="1" <?php if ($dataL['L_KTP_WP'] == '1') { echo "checked"; } ?>> 3. FC KTP WP 
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sertifikat_tanah" value="1" <?php if ($dataL['L_SERTIFIKAT_TANAH'] == '1') { echo "checked"; } ?>> 4. FC Sertifikat/Kepemilikan  
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sppt" value="1" <?php if ($dataL['L_SPPT'] == '1') { echo "checked"; } ?>> 5. Asli SPPT
            </label> 
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_imb" value="1" <?php if ($dataL['L_IMB'] == '1') { echo "checked"; } ?>> 6. FC IMB 
            </label> 
                <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_akte_jual_beli" value="1" <?php if ($dataL['L_AKTE_JUAL_BELI'] == '1') { echo "checked"; } ?>> 7. FC Akte Jual Beli
            </label>        
           </div>
           <div class="col-xs-4">
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sk_pensiun" value="1" <?php if ($dataL['L_SK_PENSIUN'] == '1') { echo "checked"; } ?>> 8. FC SK Pensiun/Vetran   
            </label>    
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sppt_stts" value="1" <?php if ($dataL['L_SPPT_STTS'] == '1') { echo "checked"; } ?>> 9. FC SPPT/SSPD/Bukti Lunas   
            </label>
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_stts" value="1" <?php if ($dataL['L_STTS'] == '1') { echo "checked"; } ?>> 10. Asli SSPD/Bukti Lunas PBB 
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sk_pengurangan" value="1" <?php if ($dataL['L_SK_PENGURANGAN'] == '1') { echo "checked"; } ?>> 11. FC SK Pengurangan 
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sk_keberatan" value="1" <?php if ($dataL['L_SK_KEBERATAN'] == '1') { echo "checked"; } ?>> 12. FC SK Keberatan 
            </label> 
                <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_skkp_pbb" value="1" <?php if ($dataL['L_SKKP_PBB'] == '1') { echo "checked"; } ?>> 13. FC SSPD BPHTB  
            </label> 
                <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_spmkp_pbb" value="1" <?php if ($dataL['L_SPMKP_PBB'] == '1') { echo "checked"; } ?>> 14. Surat Ket. Tidak Mampu

            </label>   
           </div>
           <div class="col-xs-4">
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sket_tanah" value="1" <?php if ($dataL['L_SKET_TANAH'] == '1') { echo "checked"; } ?>> 15. Sket Tanah Camat cq Lurah  
            </label>    
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sket_lurah" value="1" <?php if ($dataL['L_SKET_LURAH'] == '1') { echo "checked"; } ?>> 16. Sket Lurah   
            </label>
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_npwpd" value="1" <?php if ($dataL['L_NPWPD'] == '1') { echo "checked"; } ?>> 17. NPWP/NPWPD  
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_penghasilan" value="1" <?php if ($dataL['L_PENGHASILAN'] == '1') { echo "checked"; } ?>> 18. Rincian Penghasilan   
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_cagar" value="1" <?php if ($dataL['L_CAGAR'] == '1') { echo "checked"; } ?>> 19. SK Cagar Budaya  
            </label> 
                <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_lain_lain" value="1" <?php if ($dataL['L_LAIN_LAIN'] == '1') { echo "checked"; } ?>> 20. Lain-Lain 
            </label>  
           </div>   
          </div>     
         </div>
         <div class="form-group">
          <textarea name="catatan_pst" cols="30" class="form-control input-sm" placeholder="Catatan"><?php echo $dataB['CATATAN_PST']; ?></textarea>   
         </div>
         <button type="submit" name="submit" class="btn btn-primary _subPer">Update</button>
         <button type="button" class="btn btn-primary" onclick="history.back();">Cencel</button>
        </form>   
       </div>
      </div>   
     </div>  
     <div class="col-xs-6 col-md-4"></div>     
    </div>   
   </div>
  </section>

<?php get_footer(); ?>