<?php 
require_once '../app/init.php';
$data = [
   'title' => 'Data Berkas Permohonan'
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
$zona = $_GET['zona'];
$currentPage = 1;
if (isset($_GET['page'])) 
{
    $currentPage = $_GET['page'];
}
$totalRows = $Paginate->_getCountRowsWhere($datZona[$zona]);
$rowPerPage = 10;
$totalPages = $Paginate->_getTotalPages($totalRows, $rowPerPage);
$startRow = $Paginate->_getPageToRow($currentPage, $rowPerPage);
$rows = $Getdata->_dataBerkasMasukByZona($startRow, $rowPerPage, $datZona[$zona]);
get_header($data);
get_sidenav();
?>

  <section class="main-content">
   <div class="title-content">
    <i class="fa fa-list-alt fa-fw"></i> <span>Data Berkas Permohonan</span>   
   </div> 
   <div class="container">
    <div class="btn-group pull-right" role="group" aria-label="table-action">
     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button>
     <ul class="dropdown-menu">
      <li><a href="javascript:void(0)"><i class="fa fa-print fa-fw"></i> Print</a></li>   
     </ul>   
    </div>
    <div class="row">
     <div class="col-sm-12">
      
     </div>   
    </div>   
   </div>  
  </section>

<?php get_footer(); ?>