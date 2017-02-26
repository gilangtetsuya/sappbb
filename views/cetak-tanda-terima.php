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
        <form action="tanda-terima.php" method="get">
         <div class="form-group">
          <div class="row">
           <div class="col-xs-4">
            <input type="text" name="thn_p" maxlength="4" class="form-control input-sm thn" placeholder="Tahun">   
           </div>   
            <div class="col-xs-4">
            <input type="text" name="bundel_p" maxlength="4" class="form-control input-sm bundel" placeholder="Bundel" disabled>   
           </div>   
            <div class="col-xs-4">
            <input type="text" name="no_urut_p" maxlength="3" class="form-control input-sm urut" placeholder="Urut" disabled>   
           </div>   
          </div>   
         </div>
         <legend style="margin-bottom: 10px;"></legend>
         <button type="submit" class="btn btn-primary fterima">Cetak</button>    
        </form>   
       </div>   
      </div>        
     </div> 
     <div class="col-xs-6 col-md-5"></div> 
     <div class="col-xs-6 col-md-4"></div>   
    </div>   
   </div>
  </section>

  <script>
    const inputEl = document.querySelectorAll('input[type="text"]');
    
    Array.from(inputEl).forEach(i => {
        i.addEventListener('keyup', this.handleEvent.bind(this));
    });
    
    function handleEvent(evt) {
        const el = evt.target;
        if (el.value.length == el.getAttribute('maxlength')) {
            for (var i = 0; i < inputEl.length; i++) {
               if (inputEl[i].value.length == el.getAttribute('maxlength')) {
                  var next = inputEl[i + 1];
               }
            }
            next.removeAttribute('disabled');
            next.focus();
        }
    }
  </script>

<?php get_footer(); ?>