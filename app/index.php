<!DOCTYPE html>
<html lang="en">
<?php
include ('../conf/config_apd.php');

// Kueri SQL untuk mendapatkan periode unik dari tabel tb_data_seragam
$query = "SELECT DISTINCT periode FROM tb_data_seragam";
$result = mysqli_query($koneksi, $query);

// Mengumpulkan daftar periode ke dalam array
$periodes = array();
while ($row = mysqli_fetch_assoc($result)) {
    $periodes[] = $row['periode'];
}

// Mengambil periode terakhir dari basis data
$latestPeriode = end($periodes);
?>
<?php 
session_start();
if(!$_SESSION['nama']){
  header('Location: ../index.php?session=expired');
}
include('header.php'); ?>
<?php include('../conf/config_apd.php'); ?>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include('preloader.php'); ?>

  <!-- Navbar -->
  <?php include('navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include('logo.php'); ?>

    <!-- Sidebar -->
    <?php include('sidebar.php'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('content_header.php'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
    if (isset($_GET['page'])){
      if ($_GET['page']=='dashboard'){
        include('dashboard.php');
      }
      else if($_GET['page']=='data-users'){
        include('data/data_users.php');
      }
      else if($_GET['page']=='data-pengiriman'){
        include('data/data_pengiriman.php');
      }
      else if($_GET['page']=='data-customer'){
        include('data/data_customer.php');
      }
      else if($_GET['page']=='data-apd'){
        include('data/data_apd.php');
      }
      else if($_GET['page']=='data-mp'){
        include('data/data_mp.php');
      }
      else if($_GET['page']=='data-area'){
        include('data/data_area.php');
      }
      else if($_GET['page']=='data-job'){
        include('data/data_job.php');
      }
      else if($_GET['page']=='data-ukuran'){
        include('data/data_ukuran.php');
      }
      else if($_GET['page']=='edit-data-users'){
        include('edit/edit_data_users.php');
      }
      else if($_GET['page']=='edit-data'){
        include('edit/edit_data.php');
      }
      else if($_GET['page']=='edit-data-customer'){
        include('edit/edit_data_customer.php');
      }
      else if($_GET['page']=='edit-data-apd'){
        include('edit/edit_data_apd.php');
      }
      else if($_GET['page']=='edit-data-mp'){
        include('edit/edit_data_mp.php');
      }
      else if($_GET['page']=='edit-data-area'){
        include('edit/edit_data_area.php');
      }
      else if($_GET['page']=='edit-data-job'){
        include('edit/edit_data_job.php');
      }
      else if($_GET['page']=='edit-data-ukuran'){
        include('edit/edit_data_ukuran.php');
      }
      else if($_GET['page']=='tambah-data'){
        include('tambah/tambah_data.php');
      }
      else{
        include('not_found.php');
      }
    }
    else{
      include('dashboard.php');
    }?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
