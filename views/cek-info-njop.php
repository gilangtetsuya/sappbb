<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Cek Info NJOP'
];
$users = $Users->_getDataUsersById($_SESSION['user_sap']);
get_header($data);
get_sidenav();
?>

 <section class="main-content">
  <div class="title-content">
   <i class="fa fa-info-circle fa-fw"></i> <span>Cek Info NJOP</span>   
  </div>
  <div class="container">
     <div class="row">   
     <div class="col-sm-12">
      <h2 class="title-print">
        <img src="../assets/img/logo.png" alt="">    
      </h2>   
      <h2 class="title-print">Informasi NJOP Pajak bumi dan bangunan</h2>
      <h2 class="title-print">badan pendapatan kota makassar</h2>   
      <div class="panel panel-default">
       <div class="panel-heading">
         Detail informasi NJOP
       </div>
       <div class="panel-body">
        <div class="form-group">
         <div class="row">
          <div class="col-xs-2-3">
           <label for="kd_prov" style="margin-top: 5px;">NOP</label>     
          </div>  
          <div class="col-xs-2-3">
           <input type="text" name="kd_prov" maxlength="2"  class="form-control input-sm">   
          </div> 
          <div class="col-xs-2-3">
           <input type="text" name="kd_dati2" maxlength="2" class="form-control input-sm" disabled>   
          </div> 
          <div class="col-xs-2-3">
           <input type="text" name="kd_kec" maxlength="3" class="form-control input-sm" disabled>   
          </div> 
          <div class="col-xs-2-3">
           <input type="text" name="kd_kel" maxlength="3" class="form-control input-sm" disabled>   
          </div> 
          <div class="col-xs-2-3">
           <input type="text" name="kd_blok" maxlength="3" class="form-control input-sm" disabled>   
          </div>
          <div class="col-xs-2-4">
           <input type="text" name="no_urut" maxlength="4" class="form-control input-sm" disabled>   
          </div>   
          <div class="col-xs-2-3">
           <input type="text" name="kd_jns_op" maxlength="1" class="form-control input-sm" disabled>   
          </div>
          <div class="col-xs-2-3">
           <label for="thn_pajak" style="margin-top: 5px;">Tahun</label>   
          </div>
          <div class="col-xs-2-4">
           <input type="text" name="thn_pajak" maxlength="4" class="form-control input-sm" disabled>   
          </div>
          <div class="col-xs-2-4 pull-right">
            <button type="button" class="btn btn-sm btn-primary result" onclick="_getDataNjop()"><i class="fa fa-info-circle"></i> Cek Info</button>
          </div>
         </div>    
        </div>    
       </div> 
       <table class="table table-hover table-condensed table-bordered table-striped tnjop" cellspacing="0" width="100%">   
        <tbody>
          <tr>
           <td>Nama Wajib Pajak :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
           <td>Alamat Wajib Pajak :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
           <td>Letak objek Pajak :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
           <td>Luas Bumi :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
           <td>Njop Bumi per m2 :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
           <td>Luas Bangunan :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
           <td>Njop Bangunan per m2 :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
           <td>Total Njop Bumi :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
           <td>Total Njop Bangunan :</td>
           <td width="50%"></td>   
          </tr>
          <tr>
            <td>NJOP Sebagai Dasar Pengenaan PBB :</td>
            <td width="50%"></td>   
          </tr>
        </tbody>
       </table> 
       <div class="panel-footer">
         <button type="button" class="btn btn-sm btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Cetak</button>  
         <button type="reset" class="btn btn-sm btn-primary" onclick="_clearEL()">Reset</button>
       </div>
      </div>    
      <div class="row el-print">
        <div class="col-xs-4 pull-right">
         <p class="text-muted" style="margin-bottom: 50px;margin-top: 50px;">Petugas pencetak</p>    
         <p class="text-muted">NIP: <?php echo $users['NIP']; ?></p>
        </div>    
      <div>
     </div>     
    </div> 
  </div>   
 </section>

 <script>
   const inputEl  = document.querySelectorAll('input[type="text"]');

    Array.from(inputEl).forEach(i => {
        i.addEventListener('keyup', handleEvent);
    });

    function handleEvent (evt) {
        const elem = evt.target;

        if (elem.value.length == elem.getAttribute('maxlength')) {
            for (var i = 0; i < inputEl.length; i++) {
                if (inputEl[i].value.length == elem.getAttribute('maxlength')) {
                    var next = inputEl[i + 1];
                }
            }
            next.removeAttribute('disabled');
            next.focus();
        }
    } 
 </script>

<?php get_footer(); ?>