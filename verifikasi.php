<?php 
include "config/koneksi.php";
$cek= mysqli_query($con,"SELECT * FROM anggota where token_anggota='$_GET[mytoken]' ");
if(mysqli_num_rows($cek) > 0){
	$data= mysqli_fetch_array($cek);
	mysqli_query($con,"UPDATE anggota set status_anggota='aktif' where id_anggota='$data[id_anggota]' ");
	echo '<script type="text/javascript">alert("Akun berhasil diverifikasi, akun anda sekarang aktif"); window.location.href="'.$base_url.'";</script>';
}
else{
	echo '<script type="text/javascript">alert("Data tidak ditemukan"); window.location.href="'.$base_url.'";</script>';
}
?>
