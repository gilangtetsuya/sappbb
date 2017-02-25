<?php 
require '../app/database/db_oci.php';
require_once '../app/models/Users.model.php';
$users = new Users($link);
$row = $users->_getDataUsersById($_SESSION['user_sap']);
?>
<div class="js-sidenav sidenav__container">
 <aside class="sidenav">
 <a href="javascript:void(0)" class="navbar-brand">
  <img src="../assets/img/logo.png" alt="brand">
  <span>SAP PBB</span>
 </a>
 <nav>
  <ul class="sidenav-menu">
    <li class="info-level">
    <?php if ($row['U_LEVEL'] == 0): ?> 
     <span>Adminstrator</span>
    <?php elseif ($row['U_LEVEL'] == 1): ?> 
     <span>Zona 1</span>
    <?php elseif ($row['U_LEVEL'] == 2): ?>
     <span>Zona 2</span>
    <?php elseif ($row['U_LEVEL'] == 3): ?>
     <span>Zona 3</span>
    <?php elseif ($row['U_LEVEL'] == 4): ?>
     <span>Zona 4</span>
    <?php elseif ($row['U_LEVEL'] == 5): ?>
     <span>Pelayanan</span>
    <?php endif; ?>
    </li>
    <li><a href="index.php"><span class="fa fa-home fa-fw"></span> Dashboard</a></li>
    <li><a href="input-permohonan.php"><span class="fa fa-plus fa-fw"></span> Input Permohonan</a></li>
    <li>
     <a href="javascript:void(0)" id="menu-toggle"><span class="fa fa-list-alt fa-fw"></span> Data Berkas Permohonan <span class="caret"></span></a>
     <ul class="sidenav-sub-menu">
      <li>
        <a href="javascript:void(0)" id="menu-toggle">Zona 1</a>
        <ul class="sidenav-sub-menu-tree">
          <li><a href="data-berkas-permohonan.php?z=1&t=2013">2013</a></li>
          <li><a href="data-berkas-permohonan.php?z=1&t=2014">2014</a></li>
          <li><a href="data-berkas-permohonan.php?z=1&t=2015">2015</a></li>
          <li><a href="data-berkas-permohonan.php?z=1&t=2016">2016</a></li> 
          <li><a href="data-berkas-permohonan.php?z=1&t=2017">2017</a></li>
        </ul>  
      </li> 
      <li>
        <a href="javascript:void(0)" id="menu-toggle">Zona 2</a>
        <ul class="sidenav-sub-menu-tree">
          <li><a href="data-berkas-permohonan.php?z=2&t=2013">2013</a></li>
          <li><a href="data-berkas-permohonan.php?z=2&t=2014">2014</a></li>
          <li><a href="data-berkas-permohonan.php?z=2&t=2015">2015</a></li>
          <li><a href="data-berkas-permohonan.php?z=2&t=2016">2016</a></li> 
          <li><a href="data-berkas-permohonan.php?z=2&t=2017">2017</a></li>
        </ul>  
      </li>
      <li>
        <a href="javascript:void(0)" id="menu-toggle">Zona 3</a>
        <ul class="sidenav-sub-menu-tree">
          <li><a href="data-berkas-permohonan.php?z=3&t=2013">2013</a></li>
          <li><a href="data-berkas-permohonan.php?z=3&t=2014">2014</a></li>
          <li><a href="data-berkas-permohonan.php?z=3&t=2015">2015</a></li>
          <li><a href="data-berkas-permohonan.php?z=3&t=2016">2016</a></li> 
          <li><a href="data-berkas-permohonan.php?z=3&t=2017">2017</a></li>
        </ul> 
      </li>
      <li>
        <a href="javascript:void(0)" id="menu-toggle">Zona 4</a>
        <ul class="sidenav-sub-menu-tree">
          <li><a href="data-berkas-permohonan.php?z=4&t=2013">2013</a></li>
          <li><a href="data-berkas-permohonan.php?z=4&t=2014">2014</a></li>
          <li><a href="data-berkas-permohonan.php?z=4&t=2015">2015</a></li>
          <li><a href="data-berkas-permohonan.php?z=4&t=2016">2016</a></li> 
          <li><a href="data-berkas-permohonan.php?z=4&t=2017">2017</a></li>
        </ul> 
      </li>
     </ul>
    </li>
    <li><a href="cari-berkas-permohonan.php"><span class="fa fa-search fa-fw"></span> Cari Berkas Permohonan</a></li>
    <li><a href="cek-info-njop.php"><span class="fa fa-info-circle fa-fw"></span> Cek Info NJOP</a></li>
    <li><a href="cetak-tanda-terima.php"><span class="fa fa-print fa-fw"></span> Cetak Tanda Terima</a></li>
    <li><a href="cek-nop-terbesar.php"><span class="fa fa-sort-numeric-asc fa-fw"></span> Cek Nop Terbesar</a></li>
   <?php if ($row['U_LEVEL'] == 0): ?>
    <li>
     <a href="javascript:void(0)" id="menu-toggle"><span class="fa fa-users fa-fw"></span> Admin Menu <span class="caret"></span></a>
     <ul class="sidenav-sub-menu">
       <li><a href="tambah-pengguna.php">Tambah Pengguna</a></li>
       <li><a href="data-pengguna.php">Data Pengguna</a></li>
       <li><a href="javascript:void(0)">Data Log Pengguna</a></li> 
     </ul>
    </li>
    <?php endif; ?>
    <li><a href="javascript:void(0)"><span class="fa fa-info fa-fw"></span> About</a></li>
  </ul> 
 </nav>  
</aside> <!-- sidenav -->
</div>