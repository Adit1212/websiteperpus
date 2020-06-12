<?php
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
    <!-- Sweet Alert css -->
    <link href="<?php echo $base_url; ?>template/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
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

  <body style="background:url(<?php echo $base_url; ?>template/img/)
    no-repeat center center fixed; background-size: cover;
    -webkit-background-size: cover; 
    -moz-background-size: cover; -o-background-size: cover;">

    <div class="container">

      <form class="form-signin" id="formdaftar">
        <div class="panel panel-default">
          <div class="panel-heading">
            <center><img src="template/img/logosma.png" width="200px" height="200px"></center>
            <h5 class="text-center">DAFTAR ANGGOTA</h5>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <select class="form-control" name="kelas" required="">
                <option value="">Status Anggota</option>
                <?php $kelas= $go->datakelas($con); while($dkel= mysqli_fetch_array($kelas)){
                  echo '<option value="'.$dkel['id_kelas'].'">'.$dkel['nama_kelas'].'</option>';
                } ?>
              </select>
            </div>
            <div class="form-group" id="only-number">
              <input type="text" name="nis_anggota" class="form-control" id="number" placeholder="NIS/NIK" required="">
            </div>
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
            <div class="form-group">
              <input type="text" class="form-control" name="nama_anggota" onkeypress="return (event.charCode > 64 && 
  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" 
  placeholder="nama anggota">
            </div>
            <div class="form-group">
              <input type="text" name="email_anggota" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
              <input type="text" name="username_anggota" class="form-control" placeholder="Username" required="">
            </div>
            <div class="form-group">
              <input type="password" name="password_anggota" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" id="btdaftar">Daftar Sekarang <i class="fa fa-refresh"></i></button>
            </div>
            <p>Sudah punya akun? login <a href="<?php echo $base_url.'login.php'; ?>">disini</a></p>
          </div>
          <div class="panel-footer">
            <p class="text-center"><a href="<?php echo $base_url.'home.php?page=home'; ?>">Halaman Utama</a></p>
          </div>
        </div>
      </form>

    </div> <!-- /container -->

    <script type="text/javascript">
      $('#formdaftar').submit(function(e){
        $.ajax({
          type : "post",
          url : "<?php echo $base_url.'home/control.php?pos=daftar'; ?>",
          data : $('#formdaftar').serialize(),
          cache : false,
          beforeSend : function(){
            $('#btdaftar').html('Sedang Diproses...').show();
          },
          success : function(response){
            $('#btdaftar').html('Daftar Sekarang <i class="fa fa-refresh"></i>').show();
            swal({
              title: "Berhasil Mendaftar",
              text: "Cek inbox atau spam email anda untuk melihat detail pendaftaran dan memferivikasi",
              type: "success",
                showCancelButton: false,
                confirmButtonText: 'Login Sekarang',
                cancelButtonText: 'Batal',
            })
            .then(function () {
                  window.location.href="<?php echo $base_url.'login.php'; ?>";
              },
            function (dismiss) {
              if(dismiss === 'cancel') {
                
              }
            })

          }        
        })
        return false;
      });
    </script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $base_url; ?>template/js/bootstrap.min.js"></script>
    <!-- Sweet Alert Js  -->
    <script src="<?php echo $base_url; ?>template/plugins/sweet-alert/sweetalert2.min.js"></script>
  </body>
</html>
