<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Data Berkas Permohonan'
];
$user = $Users->_getDataUsersById($_SESSION['user_sap']);
get_header($data);
get_sidenav();
?>

  <section class="main-content"> 
   <div class="title-content">
    <i class="fa fa-list-alt fa-fw"></i> <span>Data Berkas Permohonan</span>   
   </div> 
   <div class="container">
   <?php if ($user['U_LEVEL'] == 0 || $user['U_LEVEL'] == 1 || $user['U_LEVEL'] == 2 || $user['U_LEVEL'] == 3 || $user['U_LEVEL'] == 4): ?>  
    <div class="btn-group pull-right" role="group" aria-label="table-action">
     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button>
     <ul class="dropdown-menu">
      <li><a href="javascript:void(0)"><i class="fa fa-print fa-fw"></i> Print</a></li>
      <li><a href="excel_data_berkas.php?zona=<?php echo $_GET['z']; ?>&tahun=<?php echo $_GET['t']; ?>"><i class="fa fa-file-excel-o fa-fw"></i> Export ke Excel</a></li>   
     </ul>   
    </div>
    <?php endif; ?>
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
             <?php if ($user['U_LEVEL'] == 0 || $user['U_LEVEL'] == 1 || $user['U_LEVEL'] == 2 || $user['U_LEVEL'] == 3 || $user['U_LEVEL'] == 4): ?> 
             <th>Edit</th> 
             <th>Hapus</th>  
             <?php endif; ?>
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
             <?php if ($user['U_LEVEL'] == 0 || $user['U_LEVEL'] == 1 || $user['U_LEVEL'] == 2 || $user['U_LEVEL'] == 3 || $user['U_LEVEL'] == 4): ?>
             <th>Edit</th> 
             <th>Hapus</th>  
             <?php endif; ?>
           </tr> 
        </tfoot>  
        </table> 
       </div> 
      </div>           
     </div>   
    </div>   
   </div>  
  </section>
  <!-- modal popup -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lampiran Dokumen</h4>
      </div>
      <div class="modal-body">
        <ol class="js-lampiran">
         
        </ol>
      </div>
     </div>
    </div> 
   </div>

<?php get_footer(); ?>