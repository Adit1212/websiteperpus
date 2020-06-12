<?php
include '../config/koneksi.php';
include '../admin/root.php';
$go= new root();
$tglsek= date('Y-m-d');
$booking= $go->databookingpending($con);
while($data= mysqli_fetch_array($booking)){
	//cek lebih dari batas ambil
	if($tglsek > ymd($data['batasambil_booking'])){
		echo 'Tgl Ambil '.ymd($data['batasambil_booking']).'<br>';
		echo 'Tgl Saat Ini '.$tglsek.'<br>';
		echo 'Hangus<br>';
		//kirim email dulu
      $subjek= 'Peringatan Booking';
      $kepada= $data['email_anggota'];
      $dari= $setapp['email_setting'];
      $atasnama= $setapp['atasnama_setting'];
      $isi= 'Peringatan booking anda telah melewati tanggal batas ambil dengan detail sebagai berikut : <br>ID Booking : #'.$data['id_booking'].'<br>Tanggal Booking : '.dmy($data['tgl_booking']).'<br>Batas Pengambilan Buku : '.dmy($data['batasambil_booking']).'<br>Nama Buku : '.$data['nama_buku'].'<br>Penulis : '.$data['id_penulis'].'<br>Penerbit : '.$data['id_penerbit'].' Tahun '.$data['tahun_buku'].'<br>Jumlah Buku : '.$data['jumlah_booking'].'<br>Catatan : Booking anda sudah dihapus';
      $url= 'http://apisendemail.rinookta.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
      file_get_contents($url,true);
      //hapus booking
      $go->hapusbooking($con,$data['id_booking']);
	}
}
?>