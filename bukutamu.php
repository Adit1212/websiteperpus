<?php
include 'config/koneksi.php';
include 'admin/root.php';
$go= new root();
?>
<!-- Modal -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMA N 1 MINGGIR</title>
    <link rel="icon" href="<?php echo $base_url; ?>template/img/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base_url; ?>template/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $base_url; ?>template/js/jquery-3.1.0.min.js"></script>
    
    <!-- Izi Alert-->
    <link rel="stylesheet" href="<?php echo $base_url; ?>template/plugins/izi/dist/css/iziToast.min.css">
    <script type="text/javascript" src="<?php echo $base_url; ?>template/plugins/izi/dist/js/iziToast.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>template/css/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
            body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
      }

      .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .form-signin-heading,
      .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
    </style>
  </head>

  <body style="/*background:url(<?php echo $base_url; ?>template/img/sma.jpeg)
    no-repeat center center fixed; -size: cover;*/
    background-color: white;
    -webkit-background-size: cover; 
    -moz-background-size: cover; -o-background-size: cover;">

    <div class="container">
            <form class="form-signin" method="post" action="<?php echo $base_url.'admin/control.php?pos=tambahbuku2'; ?>">
            <div class="panel panel-default">
          <div class="panel-heading">
            <center><img src="template/img/logosma.png" width="200px" height="200px"></center>
            <h4 class="text-center"> BUKU TAMU</h4>
          </div>
          <div class="panel-body">
                
            <div class="form-group">
              <input type="text" name="nama" class="form-control" placeholder="nama" autocomplete="off" required="">
            </div>
            <div class="form-group" id="only-number">
              <input type="text" name="nik_nis" class="form-control" id="number" placeholder="NIS/NIK" autocomplete="off" required="">
              <script>
    $(function() {
      $('#only-number').on('keydown', '#number', function(e){
          -1!==$
          .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
          .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
          || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
          && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
      });
    })
</script>
            </div>
            <div class="form-group">
                <select name="keperluan" required="" class="form-control">
                  <option value="Berkunjung">Berkunjung</option>
                  <option value="Meminjam Buku">Meminjam Buku</option>
                </select> 
            </div>

            <div class="form-group">
              <input type="hidden" name="tanggal" readonly="" class="form-control" placeholder="nama" value="<?php echo date('Y-m-d')?>">
            </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Simpan</button>
               
            </div>
            </form>
        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->