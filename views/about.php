<?php 
require_once '../app/init.php';
$data = array(
    "title" => "About"
);
get_header($data);
get_sidenav();
?>

 <section class="main-content">
  <div class="title-content">
    <i class="fa fa-info-circle"></i> <span>About</span>    
  </div>  
  <div class="container">
   <div class="row">
    <div class="col-sm-7">
     <div class="jumbotron">
       <div class="text-right">
         <img src="../assets/img/logo.png" alt="">    
       </div>  
       <h2>SAP PBB <small>v.1.0</small></h2>    
       <h4>Sistem Administrasi Pelayanan PBB</h4>
       <p>Sistem Administarsi Pelayanan PBB (SAP PBB) adalah pengembaangan dari aplikasi SISMIOP yang saat ini di gunakan di lingkup Administrasi PBB yang kemudian di kembangkan dalam bentuk WEB APP dan mengimplementasikan beberapa menu untuk adaministrasi pelayanan PBB.</p>
     </div>   
     </div>
    <div class="col-sm-5"></div>    
   </div>     
  </div>  
 </section>

<?php get_footer(); ?>