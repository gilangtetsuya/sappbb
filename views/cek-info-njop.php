<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Cek Info NJOP'
];
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
      <h2 class="title-print">Informasi NJOP PBB</h2>
      <h2 class="title-print">badan pendapatan kota makassar</h2>   
      <div class="panel panel-default">
       <div class="panel-heading">
         Detail informasi njop
       </div>
       <div class="panel-body">
        <div class="form-group">
         <div class="row">
          <div class="col-xs-2-3">
           <label for="kd_prov" style="margin-top: 5px;">NOP</label>     
          </div>  
          <div class="col-xs-2-4">
           <input type="text" name="kd_prov" maxlength="2"  class="form-control input-sm">   
          </div> 
          <div class="col-xs-2-4">
           <input type="text" name="kd_dati2" maxlength="2" class="form-control input-sm" disabled>   
          </div> 
          <div class="col-xs-2-4">
           <input type="text" name="kd_kec" maxlength="3" class="form-control input-sm" disabled>   
          </div> 
          <div class="col-xs-2-4">
           <input type="text" name="kd_kel" maxlength="3" class="form-control input-sm" disabled>   
          </div> 
          <div class="col-xs-2-4">
           <input type="text" name="kd_blok" maxlength="3" class="form-control input-sm" disabled>   
          </div>
          <div class="col-xs-2-5">
           <input type="text" name="no_urut" maxlength="4" class="form-control input-sm" disabled>   
          </div>   
          <div class="col-xs-2-4">
           <input type="text" name="kd_jns_op" maxlength="1" class="form-control input-sm" disabled>   
          </div>
          <div class="col-xs-2-3">
           <label for="thn_pajak" style="margin-top: 5px;">Tahun</label>   
          </div>
          <div class="col-xs-2-5">
           <input type="text" name="thn_pajak" maxlength="4" class="form-control input-sm" disabled>   
          </div>
          <div class="col-xs-2-4 pull-right">
            <button type="button" class="btn btn-sm btn-primary">Cek Info</button>
          </div>
         </div>    
        </div>    
       </div> 
       <table class="table table-hover table-bordered table-striped tnjop" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th style="text-align: right;">Title</th>
            <th>Nilai</th>
          </tr>
        </thead>   
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
         <button type="button" class="btn btn-sm btn-primary">Print</button>  
       </div>
      </div>    
      <div class="row el-print">
        <div class="col-xs-3 pull-right">
         <p class="text-muted" style="margin-bottom: 70px;margin-top: 10px;">Petugas pencetak</p>    
         <p class="text-muted">NIP:</p>
        </div>    
      <div>
     </div>     
    </div> 
  </div>   
 </section>

 <!--<script>
   const inputEl  = document.querySelectorAll('input[type="text"]');
   const outputEl = document.querySelectorAll('input[readonly]');
   const txtEl = document.querySelector('._txt-selisih');
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

    outputEl[0].addEventListener('focus', _getDataNjop);

    function _getDataNjop () {
       var prov  = inputEl[0].value;
       var dati2 = inputEl[1].value;
       var kec   = inputEl[2].value;
       var kel   = inputEl[3].value;
       var blok  = inputEl[4].value;
       var urut  = inputEl[5].value;
       var kode  = inputEl[6].value;
       var thn   = inputEl[7].value;

       var xhr  = new XMLHttpRequest();
       var data = `prov=${prov}&dati2=${dati2}&kec=${kec}&kel=${kel}&blok=${blok}&urut=${urut}&kode=${kode}&thn=${thn}`;
       var url  = "../app/lib-ajax/_getDataNjop.php?" + data;
       xhr.open("GET", url, true);
       xhr.onreadystatechange = function () {
          var poll = window.setInterval(function () {
             if (xhr.readyState == 4 && xhr.status == 200) {         
               window.clearInterval(poll);
                var res = JSON.parse(xhr.responseText);
                outputEl[0].value = res.letak_op;
                outputEl[1].value = res.nama_wp;
                outputEl[2].value = res.rw_op;
                outputEl[3].value = res.rt_op;
                outputEl[4].value = res.letak_wp;
                outputEl[5].value = res.l_bumi;
                outputEl[6].value = res.kls_bumi;
                outputEl[7].value = res.njop_bumi;
                outputEl[8].value = res.t_njop_bumi;
                outputEl[9].value = res.l_bng;
                outputEl[10].value = res.kls_bng;
                outputEl[11].value = res.njop_bng;
                outputEl[12].value = res.t_njop_bng;
                outputEl[13].value = res.l_bumi_op;
                outputEl[14].value = res.op_kls_bumi;
                outputEl[15].value = res.njop_bumi_op;
                outputEl[16].value = res.t_njop_bumi_op;
                outputEl[17].value = res.l_bng_op;
                outputEl[18].value = res.op_kls_bng;
                outputEl[19].value = res.njop_bng_op;
                outputEl[20].value = res.t_njop_bng_op;
                outputEl[21].value = res.t_njop_bumi;
                outputEl[22].value = res.t_njop_bng;
                outputEl[23].value = res.njop_pbb;
                outputEl[24].value = res.njoptkp;
                outputEl[25].value = res.pbb_terhutang;
                outputEl[26].value = res.faktor_pengurang;
                outputEl[27].value = res.pbb_bayar;
                outputEl[28].value = res.denda_bayar;
                outputEl[29].value = res.pbb_t_bayar;
                outputEl[30].value = res.selisih;
                outputEl[32].value = res.tgl_jatuh_tempo;
                outputEl[33].value = res.tgl_terbit;
                outputEl[34].value = res.tgl_cetak;
                outputEl[35].value = res.nip_pencetak;
                txtEl.innerHTML = res.txt_selisih;
            } else  {
                console.error("Error message: ", xhr.statusText);
            }
          }, 40);
       }  
       xhr.send();
    }

    btnReset.addEventListener('click', _clearEL);

    function _clearEL () {
       inputEl[1].setAttribute('disabled', '');
       inputEl[2].setAttribute('disabled', '');
       inputEl[3].setAttribute('disabled', '');
       inputEl[4].setAttribute('disabled', '');
       inputEl[5].setAttribute('disabled', '');
       inputEl[6].setAttribute('disabled', '');
       inputEl[7].setAttribute('disabled', '');
       outputEl[0].setAttribute('disabled', '');
       txtEl.innerHTML = "";
       inputEl[0].focus();
    }
 </script>-->

<?php get_footer(); ?>