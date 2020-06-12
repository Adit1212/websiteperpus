<?php
session_start();
include 'config/koneksi.php';
include 'home/root.php';
$go= new root();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMA N 1 MINGGIR</title>
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
          <img src="template/img/logosma.png" width="40px" height="40px">
        </div>
          <a class="navbar-brand" href="#">&nbsp;SMA N 1 MINGGIR</a>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo $base_url.'home.php?page=home'; ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo $base_url.'home.php?page=buku'; ?>"><i class="fa fa-book"></i> Buku</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-asterisk"></i> Kategori <span class="caret"></span></a>

              <ul class="dropdown-menu">
              <?php //kategori
$tkp=mysqli_query($con,"SELECT * from kategori order by kategori asc ");
while($rtkp=mysqli_fetch_array($tkp)){ ?>
    <li><a href="home.php?page=caribuku&key=<?php echo $rtkp['id_kategori']; ?>"><?php echo $rtkp['kategori']; ?></a></li>
    <?php }
?>
                </ul>
            </li>
            
            <li><a href="<?php echo $base_url.'home.php?page=kontak'; ?>"><i class="fa fa-phone"></i> Kontak</a></li>
            <?php if(isset($_SESSION['islogin']) and $_SESSION['islogin']=='isanggota'){ ?>
              <li><a href="<?php echo $base_url.'home.php?page=peminjamansaya'; ?>"><i class="fa fa-calendar-check-o"></i> Peminjaman</a></li>
              <li><a href="<?php echo $base_url.'home.php?page=pengembaliansaya'; ?>"><i class="fa fa-check-square"></i> Pengembalian</a></li>
              <li><a href="<?php echo $base_url.'home.php?page=bookingsaya'; ?>"><i class="fa fa-calendar"></i> Booking</a></li>
            <?php } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#caribuku"><i class="fa fa-search"></i> Cari Buku</a></li>
            <?php
            if(isset($_SESSION['islogin']) and $_SESSION['islogin']=='isanggota'){
              $anggota= $go->getoneanggota($con,$_SESSION['id_anggota']); $dang= mysqli_fetch_array($anggota);
            ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $dang['nama_anggota']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $base_url.'home.php?page=akunsaya'; ?>">Akun Saya</a></li>
                  <li><a href="<?php echo $base_url.'home/control.php?pos=keluar'; ?>">Keluar</a></li>
                </ul>
              </li>
            <?php 
            }
            else{
            ?>
              <li><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
        <?php 
        if(isset($_GET['page'])){
          if($_GET['page']=='home'){
            include 'home/page/index.php';
          }
          else if($_GET['page']=='buku'){
            include 'home/page/buku/data.php';
          }
          else if($_GET['page']=='caribuku'){
            include 'home/page/buku/caribuku.php';
          }
          else if($_GET['page']=='kontak'){
            include 'home/page/kontak/data.php';
             }
          else if($_GET['page']=='bookingbuku'){
            if(empty($_SESSION['islogin']) and $_SESSION['islogin']!='isanggota'){
              header('location:'.$base_url.'login.php');
            }
            include 'home/page/booking/bookingbuku.php';
          }
          else if($_GET['page']=='bookingsaya'){
            if(empty($_SESSION['islogin']) and $_SESSION['islogin']!='isanggota'){
              header('location:'.$base_url.'login.php');
            }
            include 'home/page/booking/bookingsaya.php';
          }
          else if($_GET['page']=='peminjamansaya'){
            if(empty($_SESSION['islogin']) and $_SESSION['islogin']!='isanggota'){
              header('location:'.$base_url.'login.php');
            }
            include 'home/page/peminjaman/peminjamansaya.php';
          }
          else if($_GET['page']=='pengembaliansaya'){
            if(empty($_SESSION['islogin']) and $_SESSION['islogin']!='isanggota'){
              header('location:'.$base_url.'login.php');
            }
            include 'home/page/pengembalian/pengembaliansaya.php';
          }
          else if($_GET['page']=='akunsaya'){
            if(empty($_SESSION['islogin']) and $_SESSION['islogin']!='isanggota'){
              header('location:'.$base_url.'login.php');
            }
            include 'home/page/setting/akunsaya.php';
          }
        }
        else{
          header('location:bukutamu.php');
        } 
        ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="caribuku">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Cari Buku Disini</h4>
            </div>
            <form method="get" action="<?php echo $base_url.'home.php'; ?>">
            <input type="hidden" name="page" value="caribuku">
            <div class="modal-body">
                <div class="form-group">
                    <label>Cari Dari Nama Buku</label>
                    <input type="text" name="key" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Cari...</button>
                <a href="#" class="btn btn-default btn-sm" data-dismiss="modal">Batal</a>
            </div>
            </form>
        </div><!-- // .c-modal__content -->
      </div>
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