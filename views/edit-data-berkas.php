<?php 
require_once '../app/init.php';
$data = array(
    "title" => "Edit Data Berkas"
);
$tahun = $_GET['thn'];
$bundel = $_GET['bundel'];
$urut = $_GET['urut'];
get_header($data);
get_sidenav();
?>

  <section class="main-content">
   <div class="title-content">
    <i class="fa fa-edit"></i> <span>Edit Data Pengguna</span>    
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
               <input type="text" name="tgl_masuk" id="date-1" class="form-control input-sm" data-language='en' data-position='right top' placeholder="Tgl Masuk" aria-describedby="addon-1" readonly>
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
             <option value="0">INDIVIDU</option>
             <option value="1">KOLEKTIF</option>
            </select>   
           </div>
           <div class="col-xs-3 pull-right">
            <div class="input-group">
             <input type="text" name="tgl_selesai" id="date-2" class="form-control input-sm" data-language='en' data-position='right top' placeholder="Tgl Perkiraan Selesai" aria-describedby="addon-2" readonly>   
             <span class="input-group-addon" id="addon-2"><i class="fa fa-calendar"></i></span>   
            </div>
           </div>   
          </div>   
         </div>
         <div class="form-group">
          <div class="row">
           <div class="col-xs-5">
            <input type="text" name="no_srt_permohonan" class="form-control input-sm" placeholder="No. Surat">   
           </div> 
           <div class="col-xs-3 pull-right">
            <div class="input-group">
             <input type="text" name="tgl_srt_permohonan" id="date-3" class="form-control input-sm" data-language='en' data-position='right top' placeholder="Tgl Surat" aria-describedby="addon-3" readonly>  
             <span class="input-group-addon" id="addon-3"><i class="fa fa-calendar"></i></span> 
            </div>   
           </div>  
          </div>   
         </div>  
         <div class="form-group">
          <select name="jns_pelayanan" class="form-control input-sm _jnsPelayanan">
           <option value="">- JENIS PELAYANAN -</option>   
           <?php 
             // foreach ($refPelayanan as $row) {
             //    echo '<option value="'.$row['KD_JNS_PELAYANAN'].'">'.$row['NM_JENIS_PELAYANAN'].'</option>';
             // }
            ?>
          </select>
         </div>
         <legend class="small text-muted">Data Wajib / Objek Pajak</legend>
         <div class="form-group">
          <div class="row">
           <div class="col-xs-2-5">
            <input type="text" name="kd_prov" onkeyup="autotab(this,document.f3.kd_dati2)" maxlength="2" class="form-control input-sm" placeholder="Prov">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_dati2" onkeyup="autotab(this,document.f3.kd_kec)" maxlength="2" class="form-control input-sm" placeholder="Dati2">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_kec" onkeyup="autotab(this,document.f3.kd_kel)" maxlength="3" class="form-control input-sm" placeholder="Kec">   
           </div>  
           <div class="col-xs-2-5">
            <input type="text" name="kd_kel" onkeyup="autotab(this,document.f3.kd_blok)" maxlength="3" class="form-control input-sm" placeholder="Kel">   
           </div>
           <div class="col-xs-2-5">
            <input type="text" name="kd_blok" onkeyup="autotab(this,document.f3.no_urut)" maxlength="3" class="form-control input-sm" placeholder="Blok">   
           </div>    
           <div class="col-xs-2-6">
            <input type="text" name="no_urut" onkeyup="autotab(this,document.f3.kd_jns_op)" maxlength="4" class="form-control input-sm" placeholder="No Urut">   
           </div>
           <div class="col-xs-2-5">
            <input type="text" name="kd_jns_op" onkeyup="autotab(this,document.f3.thn_pajak)" maxlength="1" class="form-control input-sm" placeholder="Kode">   
           </div>
           <div class="col-xs-2-6 pull-right">
            <input type="text" name="thn_pajak" onkeyup="autotab(this,document.f3.nama_pemohon)" maxlength="4" class="form-control input-sm" placeholder="Tahun">  
           </div>
          </div>    
         </div>
          <div class="form-group">
           <div class="row">
            <div class="col-xs-5">
             <input type="text" name="nm_wp" class="form-control input-sm" placeholder="Nama Wajib Pajak / Pemohon">   
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
             <input type="text" name="alamat_pemohon" class="form-control input-sm" placeholder="Letak Objek Pajak Pemohon">   
            </div>
            <div class="col-xs-2 pull-right">
             <input type="number" name="pct" class="form-control input-sm _pct" placeholder="PCT (%)" disabled>   
            </div>     
           </div> 
          </div>
          <div class="form-group">
           <textarea name="ket_pst" cols="30" class="form-control input-sm" placeholder="Keterangan"></textarea>   
          </div>
          <legend class="small text-muted">Lampiran Dokumen</legend>
         <div class="form-group">
          <div class="row">
           <div class="col-xs-4">
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_permohonan" value="1"> 1. Pengajuan Permohonan   
            </label>    
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_surat_kuasa" value="1"> 2. Surat Kuasa    
            </label>
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_ktp_wp" value="1"> 3. FC KTP WP 
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sertifikat_tanah" value="1"> 4. FC Sertifikat/Kepemilikan  
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sppt" value="1"> 5. Asli SPPT
            </label> 
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_imb" value="1"> 6. FC IMB 
            </label> 
                <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_akte_jual_beli" value="1"> 7. FC Akte Jual Beli
            </label>        
           </div>
           <div class="col-xs-4">
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sk_pensiun" value="1"> 8. FC SK Pensiun/Vetran   
            </label>    
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sppt_stts" value="1"> 9. FC SPPT/SSPD/Bukti Lunas   
            </label>
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_stts" value="1"> 10. Asli SSPD/Bukti Lunas PBB 
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sk_pengurangan" value="1"> 11. FC SK Pengurangan 
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sk_keberatan" value="1"> 12. FC SK Keberatan 
            </label> 
                <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_skkp_pbb" value="1"> 13. FC SSPD BPHTB  
            </label> 
                <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_spmkp_pbb" value="1"> 14. Surat Ket. Tidak Mampu

            </label>   
           </div>
           <div class="col-xs-4">
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sket_tanah" value="1"> 15. Sket Tanah Camat cq Lurah  
            </label>    
            <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_sket_lurah" value="1"> 16. Sket Lurah   
            </label>
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_npwpd" value="1"> 17. NPWP/NPWPD  
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_penghasilan" value="1"> 18. Rincian Penghasilan   
            </label>    
              <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_cagar" value="1"> 19. SK Cagar Budaya  
            </label> 
                <label class="control-label small text-muted text-normal">
              <input type="checkbox" name="l_lain_lain" value="1"> 20. Lain-Lain 
            </label>  
           </div>   
          </div>     
         </div>
         <div class="form-group">
          <textarea name="catatan_pst" cols="30" class="form-control input-sm" placeholder="Catatan"></textarea>   
         </div>
         <button type="submit" name="submit" class="btn btn-primary _subPer">Update</button>
         <button type="reset" class="btn btn-primary">Cencel</button>
        </form>   
       </div>
      </div>   
     </div>  
     <div class="col-xs-6 col-md-4"></div>     
    </div>   
   </div>
  </section>

<?php get_footer(); ?>