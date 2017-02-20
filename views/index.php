<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Dashboard'
];
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
$totalBerkas = number_format(count($Getdata->_getAllDataBerkasMasuk()), 0, "", ".");
$totalBerkasProses = number_format(count($Getdata->_getDataBerkasByStatus("1")), 0, "", ".");
$totalBerkasTanpaKet = number_format(count($Getdata->_getDataBerkasByStatus("0")), 0, "", ".");
$zona4 = $Getdata->_dataBerkasMasukByTglSelesai($datZona['4'], date('Y'));
$zona = [
    '1' => [
     'jan' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/01/'.date('Y'), '31/01/'.date('Y'), date('Y'))),
     'feb' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/02/'.date('Y'), '28/02/'.date('Y'), date('Y'))),
     'mar' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/03/'.date('Y'), '31/03/'.date('Y'), date('Y'))),
     'apr' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/04/'.date('Y'), '30/04/'.date('Y'), date('Y'))),
     'mei' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/05/'.date('Y'), '31/05/'.date('Y'), date('Y'))),
     'jun' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/06/'.date('Y'), '30/06/'.date('Y'), date('Y'))),
     'jul' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/07/'.date('Y'), '31/07/'.date('Y'), date('Y'))),
     'agt' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/08/'.date('Y'), '31/08/'.date('Y'), date('Y'))),
     'spt' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/09/'.date('Y'), '30/09/'.date('Y'), date('Y'))),
     'okt' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/10/'.date('Y'), '31/10/'.date('Y'), date('Y'))),
     'nov' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/11/'.date('Y'), '30/11/'.date('Y'), date('Y'))),
     'des' => count($Getdata->_getDataBerkasByBulan($datZona['1'], '01/12/'.date('Y'), '31/12/'.date('Y'), date('Y')))
    ],
    '2' => [
     'jan' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/01/'.date('Y'), '31/01/'.date('Y'), date('Y'))),
     'feb' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/02/'.date('Y'), '28/02/'.date('Y'), date('Y'))),
     'mar' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/03/'.date('Y'), '31/03/'.date('Y'), date('Y'))),
     'apr' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/04/'.date('Y'), '30/04/'.date('Y'), date('Y'))),
     'mei' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/05/'.date('Y'), '31/05/'.date('Y'), date('Y'))),
     'jun' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/06/'.date('Y'), '30/06/'.date('Y'), date('Y'))),
     'jul' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/07/'.date('Y'), '31/07/'.date('Y'), date('Y'))),
     'agt' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/08/'.date('Y'), '31/08/'.date('Y'), date('Y'))),
     'spt' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/09/'.date('Y'), '30/09/'.date('Y'), date('Y'))),
     'okt' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/10/'.date('Y'), '31/10/'.date('Y'), date('Y'))),
     'nov' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/11/'.date('Y'), '30/11/'.date('Y'), date('Y'))),
     'des' => count($Getdata->_getDataBerkasByBulan($datZona['2'], '01/12/'.date('Y'), '31/12/'.date('Y'), date('Y')))
    ],
    '3' => [
     'jan' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/01/'.date('Y'), '31/01/'.date('Y'), date('Y'))),
     'feb' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/02/'.date('Y'), '28/02/'.date('Y'), date('Y'))),
     'mar' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/03/'.date('Y'), '31/03/'.date('Y'), date('Y'))),
     'apr' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/04/'.date('Y'), '30/04/'.date('Y'), date('Y'))),
     'mei' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/05/'.date('Y'), '31/05/'.date('Y'), date('Y'))),
     'jun' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/06/'.date('Y'), '30/06/'.date('Y'), date('Y'))),
     'jul' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/07/'.date('Y'), '31/07/'.date('Y'), date('Y'))),
     'agt' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/08/'.date('Y'), '31/08/'.date('Y'), date('Y'))),
     'spt' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/09/'.date('Y'), '30/09/'.date('Y'), date('Y'))),
     'okt' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/10/'.date('Y'), '31/10/'.date('Y'), date('Y'))),
     'nov' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/11/'.date('Y'), '30/11/'.date('Y'), date('Y'))),
     'des' => count($Getdata->_getDataBerkasByBulan($datZona['3'], '01/12/'.date('Y'), '31/12/'.date('Y'), date('Y')))
    ],
    '4' => [
     'jan' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/01/'.date('Y'), '31/01/'.date('Y'), date('Y'))),
     'feb' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/02/'.date('Y'), '28/02/'.date('Y'), date('Y'))),
     'mar' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/03/'.date('Y'), '31/03/'.date('Y'), date('Y'))),
     'apr' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/04/'.date('Y'), '30/04/'.date('Y'), date('Y'))),
     'mei' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/05/'.date('Y'), '31/05/'.date('Y'), date('Y'))),
     'jun' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/06/'.date('Y'), '30/06/'.date('Y'), date('Y'))),
     'jul' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/07/'.date('Y'), '31/07/'.date('Y'), date('Y'))),
     'agt' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/08/'.date('Y'), '31/08/'.date('Y'), date('Y'))),
     'spt' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/09/'.date('Y'), '30/09/'.date('Y'), date('Y'))),
     'okt' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/10/'.date('Y'), '31/10/'.date('Y'), date('Y'))),
     'nov' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/11/'.date('Y'), '30/11/'.date('Y'), date('Y'))),
     'des' => count($Getdata->_getDataBerkasByBulan($datZona['4'], '01/12/'.date('Y'), '31/12/'.date('Y'), date('Y')))
    ]
]; 
get_header($data);
get_sidenav();
?>
    <section class="main-content">
     <div class="title-content">
      <i class="fa fa-home fa-fw"></i> <span>Dashboard</span> 
     </div>   
     <div class="container">
      <div class="row">
       <div class="col-sm-2-4">
        <div class="panel panel-primary">
         <div class="panel-heading">
          <div class="inner cf">
           <span class="fa fa-files-o fa-5x"></span> 
           <div class="pull-right">
            <span>Total berkas</span>
            <span><?php echo $totalBerkas; ?></span>
           </div>
          </div>
         </div>
         <div class="panel-footer text-center">
          <a href="javascript:void(0)">Lihat semua data</a> 
         </div> 
        </div>
       </div> 
       <div class="col-sm-2-4">
        <div class="panel panel-success">
         <div class="panel-heading">
          <div class="inner cf">
           <span class="fa fa-check-circle-o fa-5x"></span> 
           <div class="pull-right">
            <span>Berkas Terproses</span>
            <span><?php echo $totalBerkasProses; ?></span>
           </div>
          </div>
         </div>
         <div class="panel-footer text-center">
           <a href="javascript:void(0)">Lihat semua data</a> 
         </div> 
        </div>
       </div>   
       <div class="col-sm-2-4">
        <div class="panel panel-warning">
         <div class="panel-heading">
          <div class="inner cf">
           <span class="fa fa-clock-o fa-5x"></span> 
           <div class="pull-right">
            <span>Berkas Tinjau</span>
            <span>0</span>
           </div>
          </div>
         </div>
         <div class="panel-footer text-center">
           <a href="javascript:void(0)">Lihat semua data</a> 
         </div> 
        </div>
       </div> 
       <div class="col-sm-2-4">
        <div class="panel panel-danger">
         <div class="panel-heading">
          <div class="inner cf">
           <span class="fa fa-times-circle-o fa-5x"></span> 
           <div class="pull-right">
            <span>Berkas Pending</span>
            <span>0</span>
           </div>
          </div>
         </div>
         <div class="panel-footer text-center">
          <a href="javascript:void(0)">Lihat semua data</a>  
         </div> 
        </div>
       </div> 
        <div class="col-sm-2-4">
        <div class="panel panel-default">
         <div class="panel-heading">
          <div class="inner cf">
           <span class="fa fa-file fa-5x"></span> 
           <div class="pull-right">
            <span>Tanpa Status</span>
            <span><?php echo $totalBerkasTanpaKet; ?></span>
           </div>
          </div>
         </div>
         <div class="panel-footer text-center">
          <a href="javascript:void(0)">Lihat semua data</a>  
         </div> 
        </div>
       </div> 
      </div> <!-- row  -->
      <div class="row">
       <div class="col-md-12">
        <div class="panel panel-primary">
         <div class="panel-heading">
          Grafik berkas masuk perbulan tahun 2017
         </div>
         <div class="panel-body">
          <div id="container" style="height: 270px;">   
         </div> 
        </div>
       </div> 
      </div> 
     </div>
      <div class="row">
       <div class="col-md-12">
        <div class="panel panel-warning">
         <div class="panel-heading">
          Berkas yang mendekati waktu perkiraan selesai Zona 1
         </div>
         <div class="panel-body">
          <table id="table-1" class="table table-striped table-hover table-bordered nowrap" cellspacing="0" width="100%">
           <thead>
             <tr>
               <th>No.Surat</th>
               <th>Tgl Masuk</th>
               <th>Jenis Kol.</th>
               <th>No. Pelayanan</th>
               <th>Jenis Pelayanan</th>
               <th>NOP</th>
               <th>Nama Pemohon</th>
               <th>Letak OP</th>
               <th>Tgl Perkiraan Selesai</th>
               <th>Status</th>
               <th>Ket.</th>
               <th>NIP Penerima</th>
             </tr>
           </thead> 
           <tbody>
            <?php 
                foreach($zona4 as $row) {
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
                            <td>'.$row['NO_SRT_PERMOHONAN'].'</td>
                            <td>'.$row['TGL_TERIMA_DOKUMEN_WP'].'</td>
                            <td>'.$statkol.'</td>
                            <td>'.$row['THN_PELAYANAN'].'.'.$row['BUNDEL_PELAYANAN'].'.'.$row['NO_URUT_PELAYANAN'].'</td>
                            <td>'.$txt_permohonan.'</td>
                            <td>'.$row['KD_PROPINSI_PEMOHON'].'.'.$row['KD_DATI2_PEMOHON'].'.'.$row['KD_KECAMATAN_PEMOHON'].'.'.$row['KD_KELURAHAN_PEMOHON'].'.'.$row['KD_BLOK_PEMOHON'].'-'.$row['NO_URUT_PEMOHON'].'.'.$row['KD_JNS_OP_PEMOHON'].'</td>
                            <td>'.$row['NAMA_PEMOHON'].'</td>
                            <td>'.$row['ALAMAT_PEMOHON'].'</td>
                            <td>'.$row['TGL_PERKIRAAN_SELESAI'].'</td>
                            <td>'.$status.'</td>
                            <td>'.$row['KETERANGAN_PST'].'</td>
                            <td>'.$row['NIP_PENERIMA'].'</td>
                         </tr>'; 
                }
            ?>   
           </tbody>
          </table> 
         </div> 
        </div> 
       </div> 
      </div>
    </section> <!-- main content -->

 <script src="../assets/plugin/highchart/highcharts.js"></script>
 <script src="../assets/plugin/highchart/exporting.js"></script>
 <script>
  var chart = new Highcharts.Chart({
        chart: {
            type: 'line',
            renderTo: 'container'
        },
        title: {
            text: 'Data Berkas Masuk Per Bulan'
        },
        subtitle: {
            text: 'Kota Makassar'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mer',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Ags',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ],
            crosshair: true
        },
         yAxis: {
            min: 0,
            title: {
                text: 'Tahun 2017'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Zona 1',
            data: [<?php echo join($zona['1'], ','); ?>]

        }, {
            name: 'Zona 2',
            data: [<?php echo join($zona['2'], ','); ?>]

        }, {
            name: 'Zona 3',
            data: [<?php echo join($zona['3'], ','); ?>]

        }, {
            name: 'Zona 4',
            data: [<?php echo join($zona['4'], ','); ?>]

        }]
   });
 </script>

<?php get_footer(); ?>