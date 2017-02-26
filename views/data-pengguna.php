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
  <div class="container">
   <div class="row">
    <div class="col-sm-12">
     <div class="panel panel-primary">
      <div class="panel-heading">
       Detail data pengguna 
      </div>
      <div class="panel-body">
       <table class="table table-hover table-condensed table-striped table-bordered t_users" cellspacing="0" width="100%">
        <thead>
         <tr>
          <th>No</th>
          <th>Username</th>
          <th>NIP</th>
          <th>Level</th>    
          <th>Status</th>
          <th>Edit</th>
          <th>Hapus</th>
         </tr>    
        </thead>   
        <tfoot>
          <tr>
          <th>No</th>
          <th>Username</th>
          <th>NIP</th>
          <th>Level</th>    
          <th>Status</th>
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

 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <input type="hidden" class="uid" value="">   
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button> 
      <h4 class="modal-title">Edit data pengguna</h4>   
    </div>     
    <div class="modal-body">
     <div class="form-group">
      <input type="text" class="form-control user" placeholder="Username">    
     </div>
     <div class="form-group">
      <input type="text" class="form-control nip" placeholder="NIP">     
     </div> 
     <div class="form-group">
      <select class="form-control level">
        <option value="">- Level -</option>
        <option value="0">Administrator</option>
        <option value="1">Zona 1</option>
        <option value="2">Zona 2</option>
        <option value="3">Zona 3</option>
        <option value="4">Zona 4</option>
        <option value="5">Pelayanan</option>    
      </select>    
     </div>  
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-primary upUsers">Update</button>   
    </div>
   </div>    
  </div>    
 </div> 

<?php get_footer(); ?>