<?php 
require_once '../app/init.php';
$data = array(
    "title" => "Profile pengguna"
);
$user = $Users->_getDataUsersById($_SESSION['user_sap']);
if ($user['U_LEVEL'] == 0) {
    $level = "Administrator";
} elseif ($user['U_LEVEL'] == 1) {
    $level = "Zona 1";
} elseif ($user['U_LEVEL'] == 2) {
    $level = "Zona 2";
} elseif ($user['U_LEVEL'] == 3) {
    $level = "Zona 3";
} elseif ($user['U_LEVEL'] == 4) {
    $level = "Zona 4";
} elseif ($user['U_LEVEL'] == 5) {
    $level = "Pelayanan";
} else {
    $level = "";
}
get_header($data);
get_sidenav();
?>

  <section class="main-content">
   <div class="title-content">
    <i class="fa fa-user"></i> <span>Profile Pengguna</span>     
   </div>   
   <div class="container">
    <div class="row">
     <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Detail profile pengguna  
        </div> 
        <ul class="list-group">
         <li class="list-group-item"><span>Username</span>: <?php echo ucfirst($user['USERNAME']); ?></li>
         <li class="list-group-item"><span>NIP</span>: <?php echo $user['NIP']; ?></li>
         <li class="list-group-item"><span>Level</span>: <?php echo $level; ?></li>
        </ul>  
        <div class="panel-footer">
         <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i> Ganti Password</button>
        </div> 
       </div>   
      </div>
     <div class="col-sm-8"></div>   
    </div>
   </div>
  </section>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-lock"></i> Ganti Password</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
        <input type="password" id="oldpass" class="form-control input-sm" placeholder="Password Lama">   
       </div>
       <div class="form-group">
        <input type="password" id="newpass" class="form-control input-sm" placeholder="Password Baru">   
       </div>
       <div class="form-group">
        <input type="password" id="passconf" class="form-control input-sm" placeholder="Konfirmasi Password Baru">   
       </div>
      </div>
      <div class="modal-footer">
       <button type="button" id="cpass" class="btn btn-sm btn-primary">Submit</button>   
      </div>
     </div>
    </div> 
   </div>

<?php get_footer(); ?>