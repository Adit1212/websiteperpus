<?php
include '../config/koneksi.php';
include '../admin/root.php';
$go= new root();
$tglsek= date('Y-m-d');
$peminjaman= $go->datapeminjamandipinjam($con);
while($data= mysqli_fetch_array($peminjaman)){
	///ambil h-1
	$selisih= selisih($tglsek,ymd($data['tglkembali_peminjaman']));
	if($selisih == 1){
		echo $selisih.'<br>';
		echo 'Tgl Kembali '.ymd($data['tglkembali_peminjaman']).'<br>';
		echo 'Tgl Saat Ini '.$tglsek.'<br>';
		//kirim email dulu
      $subjek= 'Peringatan H-1 Pengembalian';
      $kepada= $data['email_anggota'];
      $dari= $setapp['email_setting'];
      $atasnama= $setapp['atasnama_setting'];
      $isi= 'Peringatan batas pengembalian buku kurang dari 1 hari lagi dengan detail sebagai berikut : <br>ID Peminjaman : #'.$data['id_peminjaman'].'<br>Tanggal Peminjaman : '.dmy($data['tgl_peminjaman']).'<br>Batas Pengembalian Buku : '.dmy($data['tglkembali_peminjaman']).'<br>Nama Buku : '.$data['nama_buku'].'<br>Penulis : '.$data['id_penulis'].'<br>Penerbit : '.$data['id_penerbit'].' Tahun '.$data['tahun_buku'].'<br>Jumlah Buku : '.$data['jumlah_peminjaman'].'<br>Catatan : Apabila anda melewati batas pengembalian buku,maka akan dikenakan denda untuk perharinya';
      $url= 'http://apisendemail.rinookta.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
      file_get_contents($url,true);
	}
}
?>