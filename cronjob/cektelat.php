<?php
include '../config/koneksi.php';
include '../admin/root.php';
$go= new root();
$tglsek= date('Y-m-d');
$peminjaman= $go->datapeminjamandipinjam($con);
while($data= mysqli_fetch_array($peminjaman)){
	//cek lebih dari batas ambil
	if($tglsek > ymd($data['tglkembali_peminjaman'])){
      $selisih= selisih(ymd($data['tglkembali_peminjaman']),$tglsek);
		echo 'Tgl Kembali '.ymd($data['tglkembali_peminjaman']).'<br>';
		echo 'Tgl Saat Ini '.$tglsek.'<br>';
		echo 'Selisih '.$selisih.'<br>';
      ///telat
      if($selisih < 0){
         $telat= 0;
         $denda= 0;
      }
      else{
         $telat= $selisih.' Hari';
         $denda= $telat*$setapp['denda_setting'];
      }
		//kirim email dulu
      $subjek= 'Peringatan Telat';
      $kepada= $data['email_anggota'];
      $dari= $setapp['email_setting'];
      $atasnama= $setapp['atasnama_setting'];
      $isi= 'Peringatan telat melakukan pengembalian buku dengan detail sebagai berikut : <br>ID Peminjaman : #'.$data['id_peminjaman'].'<br>Tanggal Peminjaman : '.dmy($data['tgl_peminjaman']).'<br>Batas Pengembalian Buku : '.dmy($data['tglkembali_peminjaman']).'<br>Nama Buku : '.$data['nama_buku'].'<br>Penulis : '.$data['id_penulis'].'<br>Penerbit : '.$data['id_penerbit'].' Tahun '.$data['tahun_buku'].'<br>Jumlah Buku : '.$data['jumlah_peminjaman'].'<br>Telat : '.$telat.'<br>Denda : '.$denda.'<br>Catatan : Segara kembalikan buku dan membayar denda';
      $url= 'http://apisendemail.rinookta.com/kirim/kirimemail?subjek='.urlencode($subjek).'&kepada='.urlencode($kepada).'&dari='.urlencode($dari).'&atasnama='.urlencode($atasnama).'&isi='.urlencode($isi);
      file_get_contents($url,true);
	}
}
?>