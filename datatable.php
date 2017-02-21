<!doctype html>
<html lang='en'>
 <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge, Chrome=1'>
    <meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1'>
    <title>Datatables</title>
    <link rel='stylesheet' href='./assets/bootstrap/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./assets/plugin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/plugin/data-table/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="./assets/plugin/responsive-datatable/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="./assets/plugin/responsive-datatable/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
      .container-fluid {
         margin-top: 20px; 
      }
      .panel {
         border-radius: 0; 
         border: none;
         box-shadow: 0 2px 4px rgba(0,0,0,0.3);
      }
      .panel > .panel-heading {
         border-radius: 0;  
      }
      .form-control {
         border-radius: 0; 
      }
      table.table > tfoot > tr > th {
         border-top: 3px solid #ddd;
      }
      .modal-content { 
         border-radius: 0;
      }
      @media screen and (max-width: 1550px) {
           table.table > thead,tfoot > tr > th {
              font-size: 80%; 
              text-align: center;
              text-transform: uppercase;
           }
           table.table > tbody > tr > td {
              font-size: 64%; 
              text-transform: uppercase;
           }  
      }
    </style>
 </head>
<body>
  
   <div class="container-fluid">
    <div class="row">
     <div class="col-sm-12">
      <div class="panel panel-primary">
       <div class="panel-heading">
         jQuery Datatables  
       </div>
       <div class="panel-body">
        <input type="hidden" class="thnBerkas" value="<?= $_GET['tahun'] ?>">
        <table class="table table-condensed table-striped table-hover table-bordered nowrap dataTables_1" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>No.</th>
                <th>Tgl Masuk</th>
                <th>Jenis Kol.</th>
                <th>No. Pelayanan</th>
                <th>Jenis Pelayanan</th>
                <th>NOP</th>
                <th>Nama Pemohon</th>
                <th>Letak OP</th>
                <th>Lampiran Dokumen</th>
                <th>NOP Baru</th>
                <th>Tgl Perkiraan (Selesai)</th>
                <th>Status</th>
                <th>Seksi Penerima Berkas</th>
                <th>Ket.</th>
                <th>NIP Penerima</th>    
            </tr>    
          </thead>   
          <tfoot>
             <tr>
                <th>No.</th>
                <th>Tgl Masuk</th>
                <th>Jenis Kol.</th>
                <th>No. Pelayanan</th>
                <th>Jenis Pelayanan</th>
                <th>NOP</th>
                <th>Nama Pemohon</th>
                <th>Letak OP</th>
                <th>Lampiran Dokumen</th>
                <th>NOP Baru</th>
                <th>Tgl Perkiraan (Selesai)</th>
                <th>Status</th>
                <th>Seksi Penerima Berkas</th>
                <th>Ket.</th>
                <th>NIP Penerima</th>    
            </tr>   
          </tfoot>
        </table>    
       </div>    
      </div>      
     </div>       
    </div>   
   </div>   

   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lampiran Dokumen</h4>
      </div>
      <div class="modal-body">
        <ol class="js-lampiran">
         
        </ol>
      </div>
     </div>
    </div> 
   </div>

  <script src='./assets/js/jquery.min.js'></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/plugin/data-table/js/jquery.dataTables.min.js"></script>
  <script src="./assets/plugin/data-table/js/dataTables.bootstrap.min.js"></script>
  <script src="./assets/plugin/responsive-datatable/dataTables.fixedHeader.min.js"></script>
  <script src="./assets/plugin/responsive-datatable/dataTables.responsive.min.js"></script>
  <script src="./assets/plugin/responsive-datatable/responsive.bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
        var thn = $('.thnBerkas').val();
        var table =  $('.dataTables_1').DataTable({
                        responsive: true,
                        "processing": true,
                        "serverside": true,
                        "ajax": `data.php?zona=2&tahun=${thn}`
                      });
        new $.fn.dataTable.FixedHeader( table );             
        
        $(document).on('click', '#dokumen', function () {
            var dataId = $(this).attr('data-id');
        });

    });
  </script>
 </body>
</html>