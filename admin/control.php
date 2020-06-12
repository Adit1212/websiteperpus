<?php 
include '../config/koneksi.php';
include 'root.php';
$go= new root();
if(isset($_GET['pos'])){
	//anggota
  if($_GET['pos']=='login'){
    $cek= $go->loginadmin($con);
    if(mysqli_num_rows($cek) > 0){
      $data= mysqli_fetch_array($cek);
      session_start();
      $_SESSION['id_admin']= $data['id_admin'];
      $_SESSION['nama_admin']= $data['nama_admin'];
      $_SESSION['islogin']= 'isadmin';
      // echo 'admin';
      header('location:'.$base_url.'admin');
    }
    else{
      echo "<script>alert('Username / Password Anda Salah!');
        window.location.href = 'https://sman1minggir.000webhostapp.com/admin/login.php'</script>";
        //header('location:'.$base_url.'login.php');
    }
  }
  else if($_GET['pos']=='keluar'){
    session_start();
    session_destroy();
    header('location:'.$base_url.'admin/login.php');
  }
	else if($_GET['pos']=='tambahanggota'){
		$go->tambahanggota($con);
		session_start();
		$_SESSION['msg']= 'simpan';
		header('location:'.$base_url.'admin/home.php?page=anggota');
	}
	else if($_GET['pos']=='editanggota'){
		$go->editanggota($con,$_POST['id_anggota']);
		session_start();
		$_SESSION['msg']= 'edit';
		header('location:'.$base_url.'admin/home.php?page=anggota');
	}
	else if($_GET['pos']=='autoanggota'){
		if(isset($_GET['term'])) {
        	$result = $go->autoanggota($con,$_GET['term']);
        	if(count($result) > 0) {
            foreach($result as $row){
               $arr_result[] = array(
                  'label'=> 'NIS '.$row['nis_anggota'].' - '.$row['nama_anggota'],
                  'id_anggota'=> $row['id_anggota'],
                  'nis_anggota'=> $row['nis_anggota'],
                  'nama_anggota'=> $row['nama_anggota'],
                  'nama_kelas'=> $row['nama_kelas'],
                  'email_anggota'=> $row['email_anggota'],
            	);
            }
            echo json_encode($arr_result);
        	}
    	}
	}
	//kelas
	else if($_GET['pos']=='tambahkelas'){
		$go->tambahkelas($con);
		session_start();
		$_SESSION['msg']= 'simpan';
		header('location:'.$base_url.'admin/home.php?page=kelas');
	}
	else if($_GET['pos']=='editkelas'){
		$go->editkelas($con,$_POST['id_kelas']);
		session_start();
		$_SESSION['msg']= 'edit';
		header('location:'.$base_url.'admin/home.php?page=kelas');
	}
	//rakbuku
	else if($_GET['pos']=='tambahrakbuku'){
		$go->tambahrakbuku($con);
		session_start();
		$_SESSION['msg']= 'simpan';
		header('location:'.$base_url.'admin/home.php?page=rakbuku');
	}
	else if($_GET['pos']=='editrakbuku'){
		$go->editrakbuku($con,$_POST['id_rakbuku']);
		session_start();
		$_SESSION['msg']= 'edit';
		header('location:'.$base_url.'admin/home.php?page=rakbuku');
	}
  //kategori
  else if($_GET['pos']=='tambahkategori'){
    $go->tambahkategori($con);
    session_start();
    $_SESSION['msg']= 'simpan';
    header('location:'.$base_url.'admin/home.php?page=kategori');
  }
  else if($_GET['pos']=='editkategori'){
    $go->editkategori($con,$_POST['id_kategori']);
    session_start();
    $_SESSION['msg']= 'edit';
    header('location:'.$base_url.'admin/home.php?page=kategori');
  }
   //penulis
  else if($_GET['pos']=='tambahpenulis'){
    $go->tambahpenulis($con);
    session_start();
    $_SESSION['msg']= 'simpan';
    header('location:'.$base_url.'admin/home.php?page=penulis');
  }
  else if($_GET['pos']=='editpenulis'){
    $go->editpenulis($con,$_POST['id_penulis']);
    session_start();
    $_SESSION['msg']= 'edit';
    header('location:'.$base_url.'admin/home.php?page=penulis');
  }
   //penerbit
  else if($_GET['pos']=='tambahpenerbit'){
    $go->tambahpenerbit($con);
    session_start();
    $_SESSION['msg']= 'simpan';
    header('location:'.$base_url.'admin/home.php?page=penerbit');
  }
  else if($_GET['pos']=='editpenerbit'){
    $go->editpenerbit($con,$_POST['id_penerbit']);
    session_start();
    $_SESSION['msg']= 'edit';
    header('location:'.$base_url.'admin/home.php?page=penerbit');
  }
	//buku
	else if($_GET['pos']=='tambahbuku'){
		$go->tambahbuku($con,random(9));
		session_start();
		$_SESSION['msg']= 'simpan';
		header('location:'.$base_url.'admin/home.php?page=buku');
	}
  else if($_GET['pos']=='tambahbuku2'){
    $go->tambahbuku2($con,random(9));
    session_start();
    $_SESSION['msg']= 'simpan';
    header('location:'.$base_url.'home.php?page=home');
  }
	else if($_GET['pos']=='editbuku'){
		$go->editbuku($con,$_POST['id_buku']);
		session_start();
		$_SESSION['msg']= 'edit';
		header('location:'.$base_url.'admin/home.php?page=buku');
	}
  else if($_GET['pos']=='buku_tamu'){
    $go->buku_tamu($con,random(9));
    session_start();
    $_SESSION['msg']= 'simpan';
    header('location:'.$base_url.'admin/home.php?page=home');
  }
	else if($_GET['pos']=='editfoto'){
		$temp = explode(".", $_FILES['foto_buku']['name']);
		$new_name = time().'.'.end($temp);
	 	$tmp_name= $_FILES['foto_buku']['tmp_name'];
    	$type= $_FILES['foto_buku']['type'];
    	$loc= '../upload/fotobuku/'.$new_name;
    	move_uploaded_file($tmp_name,$loc);
    	$path= 'upload/fotobuku/'.$new_name;
    	$go->editfotobuku($con,$_POST['id_buku'],$path);
    	//hapus foto
    	unlink('../'.$_POST['foto_lama']);
    	session_start();
		$_SESSION['msg']= 'foto';
		header('location:'.$base_url.'admin/home.php?page=buku');
   }
   else if($_GET['pos']=='editfile'){
		$temp = explode(".", $_FILES['file_buku']['name']);
		$new_name = time().'.'.end($temp);
	 	$tmp_name= $_FILES['file_buku']['tmp_name'];
    	$type= $_FILES['file_buku']['type'];
    	$loc= '../upload/filebuku/'.$new_name;
    	move_uploaded_file($tmp_name,$loc);
    	$path= 'upload/filebuku/'.$new_name;
    	$go->editfilebuku($con,$_POST['id_buku'],$path);
    	//hapus file
    	unlink('../'.$_POST['file_lama']);
    	session_start();
		$_SESSION['msg']= 'file';
		header('location:'.$base_url.'admin/home.php?page=buku');
   }
   else if($_GET['pos']=='autobuku'){
		if(isset($_GET['term'])) {
        	$result = $go->autobuku($con,$_GET['term']);
        	if(count($result) > 0) {
            foreach($result as $row){
               $cekdipinjam= $go->cekdipinjam($con,$row['id_buku']); $cekdp= mysqli_fetch_array($cekdipinjam);
               $cekdibooking= $go->cekdibooking($con,$row['id_buku']); $cekdbo= mysqli_fetch_array($cekdibooking);
               $sisa= $row['stok_buku']-$cekdp['jumdipinjam']-$cekdbo['jumdibooking'];
               $arr_result[] = array(
                  'label'=> 'ID '.$row['id_buku'].' - '.$row['nama_buku'],
                  'id_buku'=> $row['id_buku'],
                  'nama_buku'=> $row['nama_buku'],
                  'stok_buku'=> $row['stok_buku'],
                  'sisa_stok'=> $sisa,
            	);
            }
            echo json_encode($arr_result);
        	}
    	}
	}
   //booking
   else if($_GET['pos']=='ambilbooking'){
      $id_peminjaman= random(4);
   	$go->ambilbooking($con,$_GET['booking']);
   	$booking= $go->getonebooking($con,$_GET['booking']);
   	$dbook= mysqli_fetch_array($booking);
   	$tgl_peminjaman= date('Y-m-d H:i:s');
		$lampin= $setapp['lamapinjam_setting'];
		$tglkembali_peminjaman= date('Y-m-d H:i:s', strtotime('+'.$lampin.' days', strtotime($tgl_peminjaman)));

      //kirim email dulu
      $subjek= 'Peminjaman Buku | '.date('H:i:s');
      $kepada= $dbook['email_anggota'];
      $dari= $setapp['email_setting'];
      $atasnama= $setapp['atasnama_setting'];
      $isi= 'Peminjaman buku berhasil diproses dengan detail sebagai berikut : <br>ID Peminjaman : #'.$id_peminjaman.'<br>Tanggal Peminjaman : '.dmy($tgl_peminjaman).'<br>Batas Pengembalian Buku : '.dmy($tglkembali_peminjaman).'<br>Nama Buku : '.$dbook['nama_buku'].'<br>Penulis : '.$dbook['id_penulis'].'<br>Penerbit : '.$dbook['id_penerbit'].' Tahun '.$dbook['tahun_buku'].'<br>Jumlah Buku : '.$dbook['jumlah_booking'].'<br>Catatan : Apabila anda melewati batas pengembalian buku,maka akan dikenakan denda untuk perharinya';
      $url= 'http://apisendemail.rinookta.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
      file_get_contents($url,true);

   	$go->tambahpeminjaman($con,$id_peminjaman,$dbook['id_anggota_booking'],$dbook['id_buku_booking'],$dbook['jumlah_booking'],$tgl_peminjaman,$tglkembali_peminjaman);
   	session_start();
		$_SESSION['msg']= 'ambil';
		echo 'sukses';
   }
   //peminjaman
   else if($_GET['pos']=='kembalipeminjaman'){
      $tgldikembalikan_peminjaman= date('Y-m-d H:i:s');
      $peminjaman= $go->getonepeminjaman($con,$_GET['peminjaman']);
      $data= mysqli_fetch_array($peminjaman);
      ///telat
      $tglsek= date('Y-m-d');
      $selisih= selisih(ymd($data['tglkembali_peminjaman']),$tglsek);
      if($selisih < 0){
        $telat= 0;
        $denda= 0;
      }
      else{
        $telat= $selisih;
        $denda= $telat*$setapp['denda_setting'];
      }

      //kirim email dulu
      $subjek= 'Pengembalian Buku | '.date('H:i:s');
      $kepada= $data['email_anggota'];
      $dari= $setapp['email_setting'];
      $atasnama= $setapp['atasnama_setting'];
      $isi= 'Pengembalain buku berhasil diproses dengan detail sebagai berikut : <br>ID Peminjaman : #'.$data['id_peminjaman'].'<br>Tanggal Peminjaman : '.dmy($data['tgl_peminjaman']).'<br>Batas Pengembalian Buku : '.dmy($data['tglkembali_peminjaman']).'<br>Nama Buku : '.$data['nama_buku'].'<br>Tanggal Pengembalian : '.dmy($tgldikembalikan_peminjaman).'<br>Telat : '.$telat.' Hari <br>Denda : Rp. '.rp($denda).'';
      $url= 'http://apisendemail.rinookta.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
      file_get_contents($url,true);

   	$go->kembalipeminjaman($con,$_GET['peminjaman'],$tgldikembalikan_peminjaman,$telat,$denda);
   	session_start();
		$_SESSION['msg']= 'kembali';
   	echo 'sukses';
   }
   else if($_GET['pos']=='tambahpeminjaman'){
      $anggota= $go->getoneanggota($con,$_POST['id_anggota']); $dang= mysqli_fetch_array($anggota);
      $buku= $go->getonebuku($con,$_POST['id_buku']); $dbuk= mysqli_fetch_array($buku);
      $id_peminjaman= random(9);
   	$tgl_peminjaman= date('Y-m-d H:i:s');
		$lampin= $setapp['lamapinjam_setting'];
		$tglkembali_peminjaman= date('Y-m-d H:i:s', strtotime('+'.$lampin.' days', strtotime($tgl_peminjaman)));

      //kirim email dulu
      $subjek= 'Peminjaman Buku | '.date('H:i:s');
      $kepada= $dang['email_anggota'];
      $dari= $setapp['email_setting'];
      $atasnama= $setapp['atasnama_setting'];
      $isi= 'Peminjaman buku berhasil diproses dengan detail sebagai berikut : <br>ID Peminjaman : #'.$id_peminjaman.'<br>Tanggal Peminjaman : '.dmy($tgl_peminjaman).'<br>Batas Pengembalian Buku : '.dmy($tglkembali_peminjaman).'<br>Nama Buku : '.$dbuk['nama_buku'].'<br>Penulis : '.$dbuk['id_penulis'].'<br>Penerbit : '.$dbuk['id_penerbit'].' Tahun '.$dbuk['tahun_buku'].'<br>Jumlah Buku : '.$_POST['jumlah_peminjaman'].'<br>Catatan : Apabila anda melewati batas pengembalian buku,maka akan dikenakan denda untuk perharinya';
      $url= 'http://apisendemail.rinookta.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
      file_get_contents($url,true);

   	$go->tambahpeminjaman($con,$id_peminjaman,$_POST['id_anggota'],$_POST['id_buku'],$_POST['jumlah_peminjaman'],$tgl_peminjaman,$tglkembali_peminjaman);
		echo 'sukses';
   }
   //setting
   else if($_GET['pos']=='settingaplikasi'){
   	$go->settingaplikasi($con);
   	session_start();
		$_SESSION['msg']= 'setting';
		header('location:'.$base_url.'admin/home.php?page=setting');
   }
   //laporan peminjaman
   else if($_GET['pos']=='laporanpeminjaman'){
		include '../config/dompdf/dompdf_config.inc.php';
   	if($_GET['tipe']=='semua'){
   		 $judul= 'Laporan Peminjaman';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Peminjaman</H3> </br>';
      $dari= $_GET['from'];
      $sampai= $_GET['end'];
      $sql= $go->lappeminjaman($con,$_GET['from'],$_GET['end']);
   		include 'page/laporan/cetaklaporanpeminjaman.php';
   		$dompdf = new DOMPDF();
			$dompdf->set_paper('A4','Landscape');
			$dompdf->load_html($content);
			$dompdf->render();
			$dompdf->stream('Semua Peminjaman.pdf',array("Attachment"=>0));
   	}
   	else if($_GET['tipe']=='dipinjam'){
   		 $judul= 'Laporan Peminjaman Status Dipinjam';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan peminjaman Status Dipinjam</H3> </br>';
      $dari= $_GET['from'];
      $sampai= $_GET['end'];
   		$sql= $go->lappeminjamanpinjam($con,$_GET['from'],$_GET['end']);
   		include 'page/laporan/cetaklaporanpeminjaman.php';
   		$dompdf = new DOMPDF();
			$dompdf->set_paper('A4','Landscape');
			$dompdf->load_html($content);
			$dompdf->render();
			$dompdf->stream('Status Dipinjam Peminjaman.pdf',array("Attachment"=>0));
   	}
   	else if($_GET['tipe']=='kembali'){
   		 $judul= 'Laporan peminjaman Status Kembali';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Peminjaman Status Kembali</H3> </br>';
      $dari= $_GET['from'];
      $sampai= $_GET['end'];
   		$sql= $go->lappeminjamankembali($con,$_GET['from'],$_GET['end']);
   		include 'page/laporan/cetaklaporanpeminjaman.php';
   		$dompdf = new DOMPDF();
			$dompdf->set_paper('A4','Landscape');
			$dompdf->load_html($content);
			$dompdf->render();
			$dompdf->stream('Status Kembali Peminjaman.pdf',array("Attachment"=>0));
   	}
   }
   //laporan buku tamu
   else if($_GET['pos']=='laporanbukutamu'){
    include '../config/dompdf/dompdf_config.inc.php';
    if($_GET['tipe']=='semua'){
      $judul= 'Laporan Buku Tamu';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Buku Tamu</H3> </br>';
      $dari= $_GET['from'];
      $sampai= $_GET['end'];
      $sql= $go->lapbukutamu($con,$_GET['from'],$_GET['end']);
      include 'page/laporan/cetaklapbukutamu.php';
      // echo $content;
      $dompdf = new DOMPDF();
      $dompdf->set_paper('A4','Landscape');
      $dompdf->load_html($content);
      $dompdf->render();
      $dompdf->stream('Semua Bukutamu.pdf',array("Attachment"=>0));
    }
    }
   //laporan denda
   else if($_GET['pos']=='laporandenda'){
    include '../config/dompdf/dompdf_config.inc.php';
    if($_GET['tipe']=='semua'){
      $judul= 'Laporan denda';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Denda</H3> </br>';
      $dari= $_GET['from'];
      $sampai= $_GET['end'];
      $sql= $go->lapdenda($con,$_GET['from'],$_GET['end']);
      include 'page/laporan/cetaklaporandenda.php';
      // echo $content;
      $dompdf = new DOMPDF();
      $dompdf->set_paper('A4','Landscape');
      $dompdf->load_html($content);
      $dompdf->render();
      $dompdf->stream('cetaklaporandenda.pdf',array("Attachment"=>0));
    }
   }
   //laporan booking
   else if($_GET['pos']=='laporanbooking'){
		include '../config/dompdf/dompdf_config.inc.php';
   	if($_GET['tipe']=='semua'){
   	 $judul= 'Laporan Booking';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Booking</H3> </br>';;
      $dari= $_GET['from'];
      $sampai= $_GET['end'];
   		$sql= $go->lapbooking($con,$_GET['from'],$_GET['end']);
   		include 'page/laporan/cetaklaporanbooking.php';
   		$dompdf = new DOMPDF();
			$dompdf->set_paper('A4','Landscape');
			$dompdf->load_html($content);
			$dompdf->render();
			$dompdf->stream('Semua Booking.pdf',array("Attachment"=>0));
   	}
   	else if($_GET['tipe']=='sukses'){
   		 $judul= 'Laporan Booking Status Sukses';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Booking Status Sukses</H3> </br>';
      $dari= $_GET['from'];
      $sampai= $_GET['end'];
   		$sql= $go->lapbooking1($con,$_GET['from'],$_GET['end']);
   		include 'page/laporan/cetaklaporanbooking.php';
   		$dompdf = new DOMPDF();
			$dompdf->set_paper('A4','Landscape');
			$dompdf->load_html($content);
			$dompdf->render();
			$dompdf->stream('Status Sukses Booking.pdf',array("Attachment"=>0));
   	}
   	else if($_GET['tipe']=='pending'){
   		 $judul= 'Laporan Booking Status Pending';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Booking Status Pending</H3> </br>';
      $dari= $_GET['from'];
      $sampai= $_GET['end'];
   		$sql= $go->lapbooking2($con,$_GET['from'],$_GET['end']);
   		include 'page/laporan/cetaklaporanbooking.php';
   		$dompdf = new DOMPDF();
			$dompdf->set_paper('A4','Landscape');
			$dompdf->load_html($content);
			$dompdf->render();
			$dompdf->stream('Status Kembali Booking.pdf',array("Attachment"=>0));
   	}
   }
   //laporan anggota
   else if($_GET['pos']=='laporananggota'){
		include '../config/dompdf/dompdf_config.inc.php';
   	if($_GET['tipe']=='semua'){
   		 $judul= 'Laporan Semua Anggota';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Semua Anggota</H3> </br>';
          $dari= $_GET['from'];
        $sampai= $_GET['end'];
   		$sql= $go->dataanggota($con);
   		include 'page/laporan/cetaklaporananggota.php';
   		$dompdf = new DOMPDF();
			$dompdf->set_paper('A4','Landscape');
			$dompdf->load_html($content);
			$dompdf->render();
			$dompdf->stream('Semua Anggota.pdf',array("Attachment"=>0));
        }
      else if($_GET['tipe']=='seringpinjam'){
         $judul= 'Laporan Anggota Sering Meminjam';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Buku Anggota Sering Meminjam</H3> </br>';
         $sql= $go->anggotasering($con);
         include 'page/laporan/tambahan/anggotasering.php';
         $dompdf = new DOMPDF();
         $dompdf->set_paper('A4','Landscape');
         $dompdf->load_html($content);
         $dompdf->render();
         $dompdf->stream('Anggota Sering Pinjam.pdf',array("Attachment"=>0));
      }
   }
   //laporan buku
   else if($_GET['pos']=='laporanbuku'){
		include '../config/dompdf/dompdf_config.inc.php';
   	if($_GET['tipe']=='semua'){
   		$judul= 'Laporan Semua Buku';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Semua Buku</H3> </br>';
          $dari= $_GET['from'];
        $sampai= $_GET['end'];
   		$sql= $go->databuku($con);
   		include 'page/laporan/cetaklaporanbuku.php';
   		$dompdf = new DOMPDF();
			$dompdf->set_paper('A4','Landscape');
			$dompdf->load_html($content);
			$dompdf->render();
			$dompdf->stream('Semua Buku.pdf',array("Attachment"=>0));
   	}
      else if($_GET['tipe']=='seringdipinjam'){
        $judul= 'Laporan Buku Sering Dipinjam';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Buku Sering Dipinjam</H3> </br>';
         $dari= $_GET['from'];
        $sampai= $_GET['end'];
         $sql= $go->bukuseringdipinjam($con,$_GET['from'],$_GET['end']);
         include 'page/laporan/tambahan/bukuseringdipinjam.php';
         // echo $content;
         $dompdf = new DOMPDF();
         $dompdf->set_paper('A4','Landscape');
         $dompdf->load_html($content);
         $dompdf->render();
         $dompdf->stream('Buku Sering Dipinjam.pdf',array("Attachment"=>0));
      }
      else if($_GET['tipe']=='sedangdipinjam'){
         $judul= 'Laporan Buku Sedang Dipinjam';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Buku Sedang Dipinjam</H3> </br>';
         $sql= $go->bukusedangdipinjam($con,$_GET['from'],$_GET['end']);
         include 'page/laporan/tambahan/bukusedangdipinjam.php';
         // echo $content;
         $dompdf = new DOMPDF();
         $dompdf->set_paper('A4','Landscape');
         $dompdf->load_html($content);
         $dompdf->render();
         $dompdf->stream('Buku Sedang Dipinjam.pdf',array("Attachment"=>0));
      }
      else if($_GET['tipe']=='sudahkembali'){
         $judul= 'Laporan Buku Sudah Kembali';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Buku Sudah Kembali</H3> </br>';
         $sql= $go->bukusudahkembali($con,$_GET['from'],$_GET['end']);
         include 'page/laporan/tambahan/bukusudahkembali.php';
         // echo $content;
         $dompdf = new DOMPDF();
         $dompdf->set_paper('A4','Landscape');
         $dompdf->load_html($content);
         $dompdf->render();
         $dompdf->stream('Buku Sudah Kembali.pdf',array("Attachment"=>0));
      }
      else if($_GET['tipe']=='gaklaris'){
        $judul= 'Laporan Buku Tidak Diminati';
          $dari= $_GET['from'];
      $sampai= $_GET['end'];
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Buku Tidak Diminati</H3> </br>';
         $sql= $go->bukutidaklaris($con,$_GET['maksimal']);
         include 'page/laporan/tambahan/bukutidaklaris.php';
         // echo $content;
         $dompdf = new DOMPDF();
         $dompdf->set_paper('A4','Landscape');
         $dompdf->load_html($content);
         $dompdf->render();
         $dompdf->stream('Buku Sering Dipinjam.pdf',array("Attachment"=>0));
      }
   }
   //laporan pengembalian
   else if($_GET['pos']=='laporanpengembalian'){
      include '../config/dompdf/dompdf_config.inc.php';
      if($_GET['tipe']=='semua'){
         $judul= 'Laporan Pengembalian';
         $judul2= '<H2>SMA NEGERI 1 MINGGIR</H2> <p>alamat: Pakeran, Sendangmulyo, Minggir, Sleman Yogyakarta 5562</p> <p>Telepon: (0274)2820124</p> <br> <H3>Laporan Pengembalian</H3> </br>';
          $dari= $_GET['from'];
        $sampai= $_GET['end'];
         $dari= $_GET['from'];
         $sampai= $_GET['end'];
      
         $sql= $go->lappeminjamankembali($con,$_GET['from'],$_GET['end']);
         include 'page/laporan/tambahan/pengembalian.php';
         // echo $content;
         $dompdf = new DOMPDF();
         $dompdf->set_paper('A4','Landscape');
         $dompdf->load_html($content);
         $dompdf->render();
         $dompdf->stream('Buku Semua Pengembalian.pdf',array("Attachment"=>0));
      }
   }
	//keluar
	else if($_GET['pos']=='keluar'){
		session_start();
		session_destroy();
		header('location:'.$base_url.'login.php');
	}
  //semua hapus disini
   else if($_GET['pos']=='hapusrakbuku'){
      $go->hapusrakbuku($con,$_GET['rakbuku']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
   else if($_GET['pos']=='hapuskategori'){
      $go->hapuskategori($con,$_GET['kategori']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
    else if($_GET['pos']=='hapuspenulis'){
      $go->hapuspenulis($con,$_GET['nama_penulis']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
    else if($_GET['pos']=='hapuspenerbit'){
      $go->hapuspenerbit($con,$_GET['nama_penerbit']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
   else if($_GET['pos']=='hapuskelas'){
      $go->hapuskelas($con,$_GET['kelas']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
   else if($_GET['pos']=='hapusbooking'){
      $go->hapusbooking($con,$_GET['booking']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
   else if($_GET['pos']=='hapuspeminjaman'){
      $go->hapuspeminjaman($con,$_GET['peminjaman']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
   else if($_GET['pos']=='hapusbuku'){
      $buku= $go->getonebuku($con,$_GET['buku']);
      $data= mysqli_fetch_array($buku);
      //hapus file
      unlink('../'.$data['foto_buku']);
      unlink('../'.$data['file_buku']);
      $go->hapusbookingbuku($con,$_GET['buku']);
      $go->hapuspeminjamanbuku($con,$_GET['buku']);
      $go->hapusbuku($con,$_GET['buku']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
   else if($_GET['pos']=='hapusanggota'){
      $anggota= $go->getoneanggota($con,$_GET['anggota']);
      $data= mysqli_fetch_array($anggota);
      //hapus file
      $go->hapusbookinganggota($con,$_GET['anggota']);
      $go->hapuspeminjamananggota($con,$_GET['anggota']);
      $go->hapusanggota($con,$_GET['anggota']);
      session_start();
      $_SESSION['msg']= 'hapus';
      echo 'sukses';
   }
}
else{
	header('location:'.$base_url);
}
?>