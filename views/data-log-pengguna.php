<?php 
require_once '../app/init.php';
$data = array(
    "title" => "Data log pengguna"
);
get_header($data);
get_sidenav();
?>

  <section class="main-content">
   <div class="title-content">
    <i class="fa fa-clock-o"></i> <span>Data Log Pengguna</span>     
   </div>   
   <div class="container">
    <div class="row">
     <div class="col-md-12">
      <div class="panel panel-primary">
       <div class="panel-heading">
         Detail data log pengguna  
       </div>
       <div class="panel-body">
        <table class="table table-hover table-striped table-bordered table-condensed t_log" cellsapcing="0" width="100%">
         <thead>
          <tr>
           <th>ID</th>
           <th>IP</th>
           <th>Browser</th>
           <th>Log Time</th>
           <th>Log</th>
          </tr>      
         </thead>
         <tfoot>
          <tr>
           <th>ID</th>
           <th>IP</th>
           <th>Browser</th>
           <th>Log Time</th>
           <th>Log</th>
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