<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Cari Berkas Permohonan'
];
get_header($data);
get_sidenav();
?>

  <section class="main-content">
   <div class="title-content">
    <i class="fa fa-search fa-fw"></i> <span>Cari Berkas Permohonan</span>   
   </div> 
   <div class="container">
    <div class="row">
     <div class="col-xs-6 col-md-4">
      <form>
       <div class="form-group">
        <select id="method" class="form-control input-sm">
         <option value="">- Cari Berdasarkan -</option>   
         <option value="1">Nomor Pelayanan</option>
         <option value="2">NOP</option>
         <option value="3">Nama Pemohon</option>
         <option value="4">Tanggal Masuk</option>
        </select>     
       </div>
       <div id="input-1" class="form-group none">
        <div class="row">
         <div class="col-xs-3">
          <input type="text" name="thn_p" id="tahun" class="form-control input-sm" placeholder="Tahun" disabled>   
         </div> 
         <div class="col-xs-3">
          <input type="text" name="thn_p" id="bundel" class="form-control input-sm" placeholder="Bundel" disabled>   
         </div> 
         <div class="col-xs-3">
          <input type="text" name="thn_p" id="urut" class="form-control input-sm" placeholder="Urut" disabled>   
         </div>    
        </div>   
       </div>
       <div id="input-2" class="form-group none">
        <div class="row">
         <div class="col-xs-2-7">
          <input type="text" name="kd_prov" maxlength="2" id="prov" class="form-control input-sm" placeholder="Prov" disabled>   
         </div>  
         <div class="col-xs-2-7">
          <input type="text" name="kd_dati2" maxlength="2" id="dati2" class="form-control input-sm" placeholder="Dati2" disabled>   
         </div>     
          <div class="col-xs-2-7">
          <input type="text" name="kd_kec" maxlength="3" id="kec" class="form-control input-sm" placeholder="Kec" disabled>   
         </div>  
          <div class="col-xs-2-7">
          <input type="text" name="kd_kel" maxlength="3" id="kel" class="form-control input-sm" placeholder="Kel" disabled>   
         </div>  
          <div class="col-xs-2-7">
          <input type="text" name="kd_blok" maxlength="3" id="blok" class="form-control input-sm" placeholder="Blok" disabled>   
         </div>  
         <div class="col-xs-3">
          <input type="text" name="no_urut" maxlength="4" id="no_urut" class="form-control input-sm" placeholder="No Urut" disabled>   
         </div>  
         <div class="col-xs-2">
          <input type="text" name="kd_jns_op" maxlength="1" id="jns_op" class="form-control input-sm" placeholder="Kode" disabled>   
         </div>  
        </div>  
       </div>
       <div id="input-3" class="form-group none">
         <input type="text" name="nama_pemohon" id="pemohon" class="form-control input-sm" placeholder="Nama Pemohon" disabled>  
       </div>
       <div id="input-4" class="form-group none">
        <div class="row">
         <div class="col-xs-5">
          <div class="input-group">
           <input type="text" name="tgl1" id="date-1" class="form-control input-sm" placeholder="Tgl Masuk" readonly aria-describedby="addon-1" disabled>
           <span class="input-group-addon" id="addon-1"><i class="fa fa-calendar"></i></span>   
          </div>   
         </div> 
         <div class="col-xs-2">
          <p class="text-center" style="margin-top: 5px;">s/d</p>   
         </div>   
         <div class="col-xs-5">
          <div class="input-group">
            <input type="text" name="tgl2" id="date-2" class="form-control input-sm" placeholder="Tgl Masuk" readonly aria-describedby="addon-2" disabled> 
            <span class="input-group-addon" id="addon-2"><i class="fa fa-calendar"></i></span>       
          </div>
         </div>
        </div>   
       </div>
       <button type="submit" class="btn btn-primary btn-sm">Cari</button>
      </form>   
     </div>
     <div class="col-xs-6 col-md-4"></div>  
     <div class="col-xs-6 col-md-4"></div>
    </div><br>
    <div class="row">
     <div class="col-sm-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
           Detail data berkas permohonan   
          </div>   
          <div class="panel-body">
           <table id="table-1" class="display" cellspacing="0">
             <thead>
              <tr>
               <th>No.</th>
               <th>Tgl Masuk</th>
               <th>Jenis Kol.</th>
               <th>No. Pelayanan</th>
               <th>Jenis Pelayanan</th>
               <th>NOP</th>
               <th>Nama Pemohon</th>
               <th>Letak OP</th>
               <th>Lampiran Dokumen</th>
               <th>NOP Baru</th>
               <th>Tgl Perkiraan (Selesai)</th>
               <th>Status</th>
               <th>Ket.</th>
               <th>NIP Penerima</th>
              </tr>  
             </thead>   
           </table>   
         </div>
        </div>   
     </div>   
    </div>
   </div>  
  </section>

<?php get_footer(); ?>
