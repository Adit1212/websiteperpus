<?php 
include "config/koneksi.php";
$p=random(9);
$query = mysqli_query($con,"INSERT into buku_tamu2 set id_pengunjung='$p',nama='$_POST[nama]',nik_nis='$_POST[nik_nis]',tanggal='$_POST[tanggal]',keperluan='$_POST[keperluan]' ");
if ($query){
	echo "<script>alert('berhasil')</script>";
}else{
	echo "<script>alert('Gagal')</script>";	
}

?>