<?php 
require_once 'app/database/db_oci.php';
require_once 'Sampel.model.php';
$sampel = new Sampel($link);   
$datZona = [
   '1' => [
      'kd_1' => '140',
      'kd_2' => '100',
      'kd_3' => '080',
      'kd_4' => '090'
   ],
   '2' => [
      'kd_1' => '030',
      'kd_2' => '020',
      'kd_3' => '010',
      'kd_4' => '050'
   ],
   '3' => [
      'kd_1' => '110',
      'kd_2' => '060'
   ],
   '4' => [
      'kd_1' => '040',
      'kd_2' => '130',
      'kd_3' => '150',
      'kd_4' => '070'
   ]
];
$currentPage = 1;
if (isset($_GET['page'])) 
{
    $currentPage = $_GET['page'];
}
$totalRows = $sampel->_getCountRowsWhere($datZona['1']);
$rowPerPage = 10;
$totalPages = $sampel->_getTotalPages($totalRows, $rowPerPage);
$startRow = $sampel->_getPageToRow($currentPage, $rowPerPage);
$rows = $sampel->_getDataSample($startRow, $rowPerPage, $datZona['1']);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing Page</title> 
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">  
    <link rel="stylesheet" href="./assets/plugin/data-table/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./assets/plugin/font-awesome/css/font-awesome.min.css">
    <style>
       ._wrap {
          margin-top: 70px;
       }  
       .panel {
          border-radius: 0;
       }
       .panel > .panel-heading {
          border-radius: 0;  
       }
       .table {
          margin-top: 8px;  
       }
       .table-striped thead tr {
          border-top: 1px solid #ccc;          
       }
       .table-striped tbody tr:last-child {
          border-bottom: 1px solid #ccc;        
       }
        table.table > thead > tr > th {
          font-size: 82%;
          text-transform: uppercase;
          text-align: center;
        }
        table.table > tbody > tr > td {
          font-size: 68%;
          text-transform: uppercase;
          text-align: center;
        }
        .pagination {
          margin: 0;    
        }
        .btn {
          border-radius: 0;  
        }
        .form-control {
          border-radius: 0;  
        }
    </style>
  </head>  
 <body>
    
    <div class="container-fluid _wrap">
     
      <div class="row">
       
       <div class="col-lg-12">
         <div class="panel panel-primary">
          <div class="panel-heading">
           Testing data table   
          </div>
          <div class="panel-body">
           <form action="" class="form-inline">
            <div class="pull-right">
             <div class="input-group">
              <input type="seacrh" name="search" class="form-control" placeholder="Mauskkan No. Pelayanan">
              <span class="input-group-btn">
               <button type="submit" name="cari" class="btn btn-default"><i class="fa fa-search"></i></button>    
              </span>  
             </div>   
            </div>   
           </form><br><br>
           <table class="table table-condensed table-striped table-hover" cellspacing="0">
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
               <th>Ket.</th>
               <th>NIP Penerima</th>
              </tr>  
            </thead>
            <tbody class="_output">
             <?php 
                if ($rows == null) {
                    echo "Data tidak temukan!";
                } else {
                    foreach ($rows as $row) 
                    {
                         if ($row['STATUS_KOLEKTIF'] == 0) {
                             $statkol = "INDIVIDU";
                         } 
                         if ($row['STATUS_KOLEKTIF'] == 1) {
                             $statkol = "MASSAL/KOLEKTIF";
                         }
                         if ($row['KD_JNS_PELAYANAN'] == '01') {
                             $txt_permohonan = 'pendaftaran data baru';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '02') {
                             $txt_permohonan = 'mutasi objek/subjek';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '03') {
                             $txt_permohonan = 'pembetulan sppt/skp/stp';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '04') {
                             $txt_permohonan = 'pembatalan sppt/skp';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '05') {
                             $txt_permohonan = 'salinan sppt/skp';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '06') {
                             $txt_permohonan = 'keberatan penunjukan wajib pajak';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '07') {
                             $txt_permohonan = 'keberatan atas pajak terhutang';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '08') {
                             $txt_permohonan = 'pengurangan atas besarnya pajak terhutang';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '09') {
                             $txt_permohonan = 'restitusi dan kompensasi';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '10') {
                             $txt_permohonan = 'pengurangan denda administrasi';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '11') {
                             $txt_permohonan = 'penentuan kembali tanggal jatuh tempo';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '12') {
                             $txt_permohonan = 'penundaan tanggal jatuh tempo';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '13') {
                             $txt_permohonan = 'pemberian informasi pbb';
                          } elseif ($row['KD_JNS_PELAYANAN'] == '14') {
                             $txt_permohonan = 'pembetulan sk keberatan';
                          }
                          if ($row['STATUS_SELESAI'] == 1) {
                              $status = 'Terproses';
                          } 
                          if ($row['STATUS_SELESAI'] == 0) {
                              $status = 'Tanpa Keterangan';
                          }
                         echo '<tr>
                                <td>'.$row['RNUM'].'</td>
                                <td>'.$row['TGL_TERIMA_DOKUMEN_WP'].'</td>
                                <td>'.$statkol.'</td>
                                <td>'.$row['THN_PELAYANAN'].'.'.$row['BUNDEL_PELAYANAN'].'.'.$row['NO_URUT_PELAYANAN'].'</td>
                                <td>'.$txt_permohonan.'</td>
                                <td>'.$row['KD_PROPINSI_PEMOHON'].'.'.$row['KD_DATI2_PEMOHON'].'.'.$row['KD_KECAMATAN_PEMOHON'].'.'.$row['KD_KELURAHAN_PEMOHON'].'.'.$row['KD_BLOK_PEMOHON'].'-'.$row['NO_URUT_PEMOHON'].'.'.$row['KD_JNS_OP_PEMOHON'].'</td>
                                <td>'.$row['NAMA_PEMOHON'].'</td>
                                <td>'.$row['ALAMAT_PEMOHON'].'</td>
                                <td><a href="#popup" id="dokumen" class="btn btn-sm btn-primary" data-id="'.$row['THN_PELAYANAN'].'.'.$row['BUNDEL_PELAYANAN'].'.'.$row['NO_URUT_PELAYANAN'].'"><i class="fa fa-file-text-o"></i></a></td>
                                <td></td>
                                <td>'.$row['TGL_PERKIRAAN_SELESAI'].'</td>
                                <td>'.$status.'</td>
                                <td>'.$row['KETERANGAN_PST'].'</td>
                                <td>'.$row['NIP_PENERIMA'].'</td>
                               </tr>';
                    }
                }  
              ?>   
            </tbody>   
           </table>
            <nav>
             <div class="pull-left">
              <span class="text-muted">Menampilkan <?php echo $startRow; ?> s/d <?php echo $startRow + $rowPerPage - 1; ?> dari <?php echo $totalRows; ?> Data</span>   
             </div> 
             <ul class="pagination pull-right">    
                <?php 
                   $sampel->_getPagingEl("", $totalPages, $currentPage); 
                ?>   
             </ul>
            </nav>  
          </div>   
         </div>   
       </div>  

      </div>

    </div>

  <script>
    window.addEventListener('load', (e) => {
        
       // put something here

    });     
  </script>
 </body>
</html>