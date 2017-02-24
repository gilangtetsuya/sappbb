<?php 
require_once '../app/init.php';
$data = array(
    "title" => "Tambah Pengguna"
);
get_header($data);
get_sidenav();
?>

<style>
 .form-group label {
    display: inline;
    margin: 5px;
    padding: 5px; 
 }
</style>

 <section class="main-content">
  <div class="title-content">
   <i class="fa fa-user"></i> <span>Tambah Pengguna</span>
  </div>  
  <div class="container">
   <div class="row">
    <div class="col-sm-5">
     <div class="panel panel-primary">
      <div class="panel-heading">
       Masukkan detail data pengguna
      </div>
      <div class="panel-body">
       <form method="post">
        <div class="form-group">
         <input type="text" name="username" class="form-control input-sm user" placeholder="Username">
        </div>
        <div class="form-group">
         <input type="text" name="nip" class="form-control input-sm nip" placeholder="NIP">
        </div>
        <div class="form-group">
         <input type="password" name="password" class="form-control input-sm pass" placeholder="Password">
        </div>
        <div class="form-group">
         <input type="password" name="passconf" class="form-control input-sm pconf" placeholder="Password Confirmation">
        </div>
        <div class="form-group">
         <select name="level" class="form-control input-sm level">
          <option value="">- Level -</option>
          <option value="0">Administrator</option>
          <option value="1">Zona 1</option>
          <option value="2">Zona 2</option>
          <option value="3">Zona 3</option>
          <option value="4">Zona 4</option>
          <option value="5">Pelayanan</option>
         </select>
        </div>
        <div class="form-group">
         <label>
          <input type="radio" name="status" class="status" value="e"> Enable 
         </label>
         <label>
          <input type="radio" name="status" value="d" class="status" checked> Disable 
         </label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary _regis">Submit</button>
        <button type="reset" class="btn btn-primary _res">Reset</button>
       </form>
      </div>
     </div>
    </div>
    <div class="col-sm-3 msg-tmp">
    </div>
    <div class="col-sm-4"></div>
   </div>      
  </div>
 </section>

<?php get_footer(); ?>