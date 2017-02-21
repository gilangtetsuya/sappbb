<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Data Berkas Permohonan'
];
get_header($data);
get_sidenav();
?>

  <section class="main-content"> 
   <div class="title-content">
    <i class="fa fa-list-alt fa-fw"></i> <span>Data Berkas Permohonan</span>   
   </div> 
   <div class="container">
    <div class="btn-group pull-right" role="group" aria-label="table-action">
     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button>
     <ul class="dropdown-menu">
      <li><a href="javascript:void(0)"><i class="fa fa-print fa-fw"></i> Print</a></li>   
     </ul>   
    </div>
    <input type="hidden" class="zona" value="<?php echo $_GET['z']; ?>">
    <input type="hidden" class="tahun" value="<?php echo $_GET['t']; ?>">
    <div class="row">
     <div class="col-sm-12">
      <div class="panel panel-primary">
       <div class="panel-heading">
         Detail data berkas permohonan
       </div>
       <div class="panel-body">
        <table class="table table-striped table-bordered table-hover nowrap dataTables_1" cellspacing="0" width="100%">
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
             <th>Seksi Penerima Berkas</th>
             <th>Ket.</th>
             <th>NIP Penerima</th> 
             <th>Edit</th> 
             <th>Hapus</th>  
           </tr>  
         </thead> 
         <tfoot>
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
             <th>Seksi Penerima Berkas</th>
             <th>Ket.</th>
             <th>NIP Penerima</th> 
             <th>Edit</th> 
             <th>Hapus</th>  
           </tr> 
        </tfoot>  
        </table> 
       </div> 
      </div>           
     </div>   
    </div>   
   </div>  
  </section>

<?php get_footer(); ?>