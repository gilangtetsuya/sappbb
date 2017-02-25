<?php 
require_once '../app/init.php';
$data = array(
    "title" => "Data Pengguna"
);
get_header($data);
get_sidenav();
?>

 <section class="main-content">
  <div class="title-content">
   <i class="fa fa-users"></i> <span>Data Penggua</span>
  </div>
  <div class="main">
  <div class="container">
   <div class="row">
    <div class="col-sm-12">
     <div class="panel panel-primary">
      <div class="panel-heading">
       Detail data pengguna 
      </div>
      <div class="panel-body">
    
      </div>
     </div>
    </div>
   </div>
   </div> 
  </div>
 </section>

<?php get_footer(); ?>