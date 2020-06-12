<?php 
include '../config/koneksi.php';
include 'root.php';
$go= new root();
if(isset($_GET['pos'])){
	//login
	if($_GET['pos']=='login'){
		$cek= $go->loginanggota($con);
			if(mysqli_num_rows($cek) > 0){
				$data= mysqli_fetch_array($cek);
				session_start();
				$_SESSION['id_anggota']= $data['id_anggota'];
				$_SESSION['nis_anggota']= $data['nis_anggota'];
				$_SESSION['islogin']= 'isanggota';
				// echo 'anggota';
				header('location:'.$base_url.'home.php?page=home');
			}
			else{
				echo "<script>alert('Username / Password Anda Salah!');
				window.location.href = 'https://sman1minggir.000webhostapp.com/login.php'</script>";
				//header('location:'.$base_url.'login.php');
			}
	}
	else if($_GET['pos']=='keluar'){
		session_start();
		session_destroy();
		header('location:'.$base_url.'login.php');
	}
	//booking
	else if($_GET['pos']=='tambahbooking'){
		session_start();
		$anggota= $go->getoneanggota($con,$_SESSION['id_anggota']); $dang= mysqli_fetch_array($anggota);
		$buku= $go->getonebuku($con,$_POST['id_buku_booking']); $dbuk= mysqli_fetch_array($buku);
		$admin= $go->getoneadmin($con,$_POST['id_admin']);
		$id_booking= random(4);
		$tgl_booking= date('Y-m-d H:i:s');
		$batamb= $setapp['batasambil_setting'];
		$batasambil_booking= date('Y-m-d H:i:s', strtotime('+'.$batamb.' days', strtotime($tgl_booking)));

		//kirim email dulu
		$subjek= 'Booking Buku | '.date('H:i:s');
		$kepada= $dang['email_anggota'];
		$dari= $setapp['email_setting'];
		$atasnama= $setapp['atasnama_setting'];
		$isi= 'Booking buku berhasil dikirim dengan detail sebagai berikut : <br>ID Booking : #'.$id_booking.'<br>Tanggal Booking : '.dmy($tgl_booking).'<br>Batas Ambil Buku : '.dmy($batasambil_booking).'<br>Nama Buku : '.$dbuk['nama_buku'].'<br>Penulis : '.$dbuk['id_penulis'].'<br>Penerbit : '.$dbuk['id_penerbit'].' Tahun '.$dbuk['tahun_buku'].'<br>Jumlah Buku : '.$_POST['jumlah_booking'].'<br>Catatan : Booking otomatis hangus apabila telah melwati batas pengambilan';
		$url= 'http://apisendemail.rinookta.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
		file_get_contents($url,true);
		$go->tambahbooking($con,$id_booking,$tgl_booking,$batasambil_booking,$admin);
		echo 'sukses';
	}
	else if($_GET['pos']=='batalbooking'){
		$go->batalbooking($con,$_GET['booking']);
		session_start();
		$_SESSION['msg']= 'batal';
		echo 'sukses';
	}
	//daftar
	
else if($_GET['pos']=='daftar'){
		//kirim email dulu
		$cekdulu= "SELECT * from anggota where nis_anggota='$_POST[nis_anggota]'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
		$prosescek= mysqli_query($con,$cekdulu);
		if (mysqli_num_rows($prosescek)>0) {
			echo "gagal";
		} else {
			$token= randomkar(30);
			$subjek= 'Pendaftaran Anggota Berhasil | '.date('H:i:s');
			$kepada= $_POST['email_anggota'];
			$dari= $setapp['email_setting'];
			$atasnama= $setapp['atasnama_setting'];
			$isi= 'Selamat anda telah menjadi anggota perpustakaan kami. untuk booking atau meminjam buku <br> Anda harus melakukan verifikasi akun sebelum bisa login ke aplikasi, klik disini untuk <a target="_blank" href="'.$base_url.'verifikasi.php?mytoken='.$token.'">VERIFIKASI AKUN SAYA</a> <br>Setelah ferifikasi, silahkan login dengan akun<br>username : <b>'.$_POST['username_anggota'].'</b> - Password : <b>'.$_POST['password_anggota'].'</b>';
			$url= 'http://apisendemail.rinookta.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
			file_get_contents($url,true);
			$go->tambahanggota($con,$token);
			echo 'sukses';
		}
		

	}
	else if($_GET['pos']=='buku_tamu'){
		$go->buku_tamu($con,random(9));
		session_start();
		$_SESSION['msg']= 'simpan';
		header('location:'.$base_url.'admin/home.php?page=home');
	}
	//akunsaya
	else if($_GET['pos']=='settingprofile'){
		session_start();
		$go->settingprofile($con,$_SESSION['id_anggota']);
		$_SESSION['msg']= 'setting';
		header('location:'.$base_url.'home.php?page=akunsaya');
	}
}	
else{
	header('location:'.$droutes);
}
?>