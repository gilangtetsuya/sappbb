<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Cetak Tanda Terima'
];
get_header($data);
get_sidenav();
?>

  <section class="main-content">
   <div class="title-content">
     <i class="fa fa-print fa-fw"></i> <span>Cetak Tanda Terima</span>  
   </div>   
   <div class="container">
    <div class="row">
     <div class="col-xs-6 col-md-3">
      <div class="panel panel-primary">
       <div class="panel-heading">
        Masukkan Nomor Pelayanan   
       </div>
       <div class="panel-body">
        <form action="" method="post">
         <div class="form-group">
          <div class="row">
           <div class="col-xs-4">
            <input type="text" class="form-control input-sm" placeholder="Tahun">   
           </div>   
            <div class="col-xs-4">
            <input type="text" class="form-control input-sm" placeholder="Bundel">   
           </div>   
            <div class="col-xs-4">
            <input type="text" class="form-control input-sm" placeholder="Urut">   
           </div>   
          </div>   
         </div>
         <legend style="margin-bottom: 10px;"></legend>
         <button type="submit" class="btn btn-primary">Cetak</button>    
        </form>   
       </div>   
      </div>        
     </div> 
     <div class="col-xs-6 col-md-5"></div> 
     <div class="col-xs-6 col-md-4"></div>   
    </div>   
   </div>
  </section>

<?php get_footer(); ?>