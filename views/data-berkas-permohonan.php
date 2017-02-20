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
    <div class="row">
     <div class="col-sm-12">
      
     </div>   
    </div>   
   </div>  
  </section>

<?php get_footer(); ?>