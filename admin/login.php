<?php include '../config/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ADMIN SMA N 1 MINGGIR</title>
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

  <body style="background:url(<?php echo $base_url; ?>template/img/)
    no-repeat center center fixed; background-size: cover;
    -webkit-background-size: cover; 
    -moz-background-size: cover; -o-background-size: cover;">

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo $base_url.'admin/control.php?pos=login'; ?>">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 class="text-center">LOGIN ADMIN PERPUSTAKAAN</h5>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" id="btlogin">Login <i class="fa fa-sign-in"></i></button>
            </div>
          </div>
          <div class="panel-footer">
            <p class="text-center"><a href="<?php echo $base_url.'home.php?page=home'; ?>">Halaman Utama</a></p>
          </div>
        </div>
      </form>

    </div> <!-- /container -->
    
    <script type="text/javascript">
      $('#formlogin').submit(function(e){
        $.ajax({
          type : "post",
          url : "",
          data : $('#formlogin').serialize(),
          cache : false,
          beforeSend : function(){
            $('#btlogin').html('Sedang Diproses...').show();
          },
          success : function(response){
            $('#btlogin').html('Login <i class="fa fa-sign-in"></i>').show();
            if(response=="admin"){
              iziToast.show({timeout:3000,color:'green',title: 'Anda Dialihkan Ke Dashboard Admin...',position: 'topRight',pauseOnHover: true,transitionIn: false});
              setTimeout('window.location.href = "<?php echo $base_url.'admin'; ?>";',3000);
            }
            else{
              iziToast.show({timeout:3000,color:'red',title: 'Username Atau Password Salah',position: 'topRight',pauseOnHover: true,transitionIn: false});
            }
          }
        })
        return false;
      });
    </script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $base_url; ?>template/js/bootstrap.min.js"></script>
  </body>
</html>
