<?php
include '../config/koneksi.php';
session_start();
if(empty($_SESSION['islogin']) or $_SESSION['islogin']!='isadmin'){
  header('location:'.$base_url.'admin/login.php');
}
include 'root.php';
$go= new root();
$admin= $go->getoneadmin($con,$_SESSION['id_admin']); $dad= mysqli_fetch_array($admin);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="icon" href="<?php echo $base_url; ?>template/img/favicon.ico">

    <!-- Bootstrap -->
    <link href="<?php echo $base_url; ?>template/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $base_url; ?>template/js/jquery-3.1.0.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>template/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>template/css/font-awesome/css/font-awesome.min.css">
    <!-- Sweet Alert css -->
    <link href="<?php echo $base_url; ?>template/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- Izi Alert-->
    <link rel="stylesheet" href="<?php echo $base_url; ?>template/plugins/izi/dist/css/iziToast.min.css">
    <script type="text/javascript" src="<?php echo $base_url; ?>template/plugins/izi/dist/js/iziToast.min.js"></script>
    <!-- jqueryui -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>template/plugins/jqueryui/jquery-ui.css">
    <script src="<?php echo $base_url; ?>template/plugins/jqueryui/jquery-ui.js" type="text/javascript"></script>
  </head>
  <body>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin PERPUS</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo $base_url.'admin/home.php'; ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo $base_url.'admin/home.php?page=anggota'; ?>"><i class="fa fa-users"></i> Anggota</a></li>
            <li><a href="<?php echo $base_url.'admin/home.php?page=buku'; ?>"><i class="fa fa-book"></i> Buku</a></li>
            <li><a href="<?php echo $base_url.'admin/home.php?page=peminjaman'; ?>"><i class="fa fa-calendar-check-o"></i> Peminjaman</a></li>
            <li><a href="<?php echo $base_url.'admin/home.php?page=pengembalian'; ?>"><i class="fa fa-check-square"></i> Pengembalian</a></li>
            <li><a href="<?php echo $base_url.'admin/home.php?page=booking'; ?>"><i class="fa fa-calendar"></i> Booking</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-asterisk"></i> Master <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base_url.'admin/home.php?page=kelas'; ?>">Kelas</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=rakbuku'; ?>">Rak Buku</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=kategori'; ?>">kategori</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=penulis'; ?>">Penulis</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=penerbit'; ?>">Penerbit</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-pdf-o"></i> Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base_url.'admin/home.php?page=laporananggota'; ?>">Laporan Anggota</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=laporanbuku'; ?>">Laporan Buku</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=laporanpeminjaman'; ?>">Laporan Peminjaman</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=laporanbooking'; ?>">Laporan Booking</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=laporanpengembalian'; ?>">Laporan Pengembalian</a></li>
                <li><a href="<?php echo $base_url.'admin/home.php?page=laporanbukutamu'; ?>">Laporan Buku Tamu</a></li>
                 <li><a href="<?php echo $base_url.'admin/home.php?page=laporandenda'; ?>">Laporan Denda</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $dad['nama_admin']; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base_url.'admin/home.php?page=setting'; ?>">Setting</a></li>
                <li><a href="<?php echo $base_url.'admin/control.php?pos=keluar'; ?>">Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
        <?php 
        if(isset($_GET['page'])){
          if($_GET['page']=='anggota'){
            include 'page/anggota/data.php';
          }
          else if($_GET['page']=='kelas'){
            include 'page/kelas/data.php';
          }
          else if($_GET['page']=='rakbuku'){
            include 'page/rakbuku/data.php';
          }
          else if($_GET['page']=='kategori'){
            include 'page/kategori/data.php';
          }
            else if($_GET['page']=='penulis'){
            include 'page/penulis/data.php';
          }
           else if($_GET['page']=='penerbit'){
            include 'page/penerbit/data.php';
          }
          else if($_GET['page']=='buku'){
            include 'page/buku/data.php';
          }
          else if($_GET['page']=='booking'){
            include 'page/booking/data.php';
          }
          else if($_GET['page']=='setting'){
            include 'page/setting/data.php';
          }
          else if($_GET['page']=='peminjaman'){
            include 'page/peminjaman/data.php';
          }
          else if($_GET['page']=='pengembalian'){
            include 'page/pengembalian/data.php';
          }
          else if($_GET['page']=='tambahpeminjaman'){
            include 'page/peminjaman/tambah.php';
          }
          else if($_GET['page']=='laporanpeminjaman'){
            include 'page/laporan/laporanpeminjaman.php';
          }
          else if($_GET['page']=='laporanbooking'){
            include 'page/laporan/laporanbooking.php';
          }
          else if($_GET['page']=='laporananggota'){
            include 'page/laporan/laporananggota.php';
          }
          else if($_GET['page']=='laporanbuku'){
            include 'page/laporan/laporanbuku.php';
          }
          else if($_GET['page']=='laporanbukutamu'){
            include 'page/laporan/laporanbukutamu.php';
          }
          else if($_GET['page']=='laporandenda'){
            include 'page/laporan/laporandenda.php';
          }
          else if($_GET['page']=='laporanpengembalian'){
            include 'page/laporan/laporanpengembalian.php';
          }
        }
        else{
          include 'page/index.php';
        } 
        ?>
    </div>
    <script type="text/javascript">
      $(function(){
        $('.example').DataTable();
      })
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $base_url; ?>template/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo $base_url; ?>template/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $base_url; ?>template/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo $base_url; ?>template/plugins/chart.js/Chart.js"></script>
    <!-- Sweet Alert Js  -->
    <script src="<?php echo $base_url; ?>template/plugins/sweet-alert/sweetalert2.min.js"></script>
  </body>
</html>