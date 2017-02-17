<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Cek NOP Terbesar'
];
get_header($data);
get_sidenav();
?>

 <section class="main-content">
  <div class="title-content">
   <i class="fa fa-sort-numeric-asc fa-fw"></i> <span>Cek NOP Terbesar</span>   
  </div>   
  <div class="container">
   <div class="row">
    <div class="col-xs-6 col-sm-4">
     <div class="panel panel-primary">
      <div class="panel-heading">
        Masukkan Nomor Objek Pajak  
      </div> 
      <div class="panel-body">
       <form method="post">
        <div class="form-group">
         <div class="row">
          <div class="col-xs-2-9">
            <input type="text" name="kd_prov" maxlength="2" class="form-control input-sm" placeholder="Prov">   
           </div>
           <div class="col-xs-2-9">
            <input type="text" name="kd_dati2" maxlength="2" class="form-control input-sm" placeholder="Dati2" disabled>   
           </div>
           <div class="col-xs-2-9">
            <input type="text" name="kd_kec" maxlength="3" class="form-control input-sm" placeholder="Kec" disabled>   
           </div>
           <div class="col-xs-2-9">
            <input type="text" name="kd_kel" maxlength="3" class="form-control input-sm" placeholder="Kel" disabled>   
           </div>
           <div class="col-xs-2-9">
            <input type="text" name="kd_blok" maxlength="3" class="form-control input-sm" placeholder="Blok" disabled>   
           </div>
           <div class="col-xs-3">
            <input type="text" name="no_urut" maxlength="4" class="form-control input-sm" placeholder="No. Urut" disabled readonly>   
           </div>   
         </div>      
        </div>  
        <legend style="margin-bottom: 8px"></legend> 
        <button type="reset" class="btn btn-primary">Reset</button>
       </form> 
      </div>  
     </div>   
    </div>
    <div class="col-xs-6 col-sm-4"></div>   
    <div class="col-xs-6 col-sm-4"></div>
   </div>   
  </div>
 </section>
  
  <script>
    const inputEl  = document.querySelectorAll('input[type="text"]');
    const noUrutEl = document.querySelector('input[name="no_urut"]'); 
    const btnReset = document.querySelector('button[type="reset"]');

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

    noUrutEl.addEventListener('focus', getNewNop);

    function getNewNop (evt) {
        var elem = evt.target;
        var prov = inputEl[0].value;
        var dati2 = inputEl[1].value;
        var kec = inputEl[2].value;
        var kel = inputEl[3].value;
        var blok = inputEl[4].value;
        
        evt.target.style.backgroundColor = "#C5CAE9";
        evt.target.style.fontWeight = "bold";

        var xhr = new XMLHttpRequest();
        var data = `prov=${prov}&dati2=${dati2}&kec=${kec}&kel=${kel}&blok=${blok}`;
        var url = "../app/lib-ajax/_getMaxNop.php?" + data;
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                evt.target.value = xhr.responseText;
            }
        }
        xhr.send();
    }

    btnReset.addEventListener('click', _clearEl); 

    function _clearEl () {
       Array.from(inputEl).forEach(i => {
           i.setAttribute('disabled', '');
       }); 
       inputEl[0].removeAttribute('disabled');
       inputEl[5].style.backgroundColor = "";
       inputEl[5].style.fontWeight = "";
       inputEl[0].focus();
    }
  </script> 

<?php get_footer(); ?>