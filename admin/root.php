<?php
/**
 * 
 */
class root{
	//home admin
	function loginadmin($con){
		return mysqli_query($con,"SELECT * FROM admin where username_admin='$_POST[username]' and password_admin='$_POST[password]' ");
	}
	function bukuseringdipinjam($con,$from,$end){
		return mysqli_query($con,"SELECT id_buku_peminjaman,count(id_buku_peminjaman) as jumpembuku from peminjaman where tgl_peminjaman BETWEEN '$from' AND '$end' group by id_buku_peminjaman order by jumpembuku desc ");
	}
	function bukutidaklaris($con,$maksimal){
		// return mysqli_query($con,"SELECT id_buku_peminjaman,count(id_peminjaman) as jumpembuku from peminjaman group by id_buku_peminjaman having count(id_peminjaman)<=$maksimal order by jumpembuku desc ");
		return mysqli_query($con,"SELECT id_buku,COUNT(id_peminjaman) as jumpembuku from buku left join peminjaman on peminjaman.id_buku_peminjaman=buku.id_buku group by id_buku having count(id_peminjaman)<=$maksimal order by jumpembuku desc ");
	}
	function anggotasering($con){
		return mysqli_query($con,"SELECT id_anggota_peminjaman,COUNT(id_anggota_peminjaman) AS jumminjam, nama_anggota, nis_anggota, email_anggota FROM peminjaman,anggota 
			WHERE peminjaman.id_anggota_peminjaman=anggota.id_anggota
			GROUP BY id_anggota_peminjaman ORDER BY jumminjam DESC ");
	}
	function pendapatan($con){
		return mysqli_query($con,"SELECT sum(denda_peminjaman) as totdenda from peminjaman where status_peminjaman='kembali' ");
	}
	function bukusedangdipinjam($con,$from,$end){
		return mysqli_query($con,"SELECT * from peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku where status_peminjaman='dipinjam' and tgl_peminjaman BETWEEN '$from' AND '$end' order by tgl_peminjaman desc ");
	}
	function bukusudahkembali($con,$from,$end){
		return mysqli_query($con,"SELECT * from peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku where status_peminjaman='kembali' and tgl_peminjaman BETWEEN '$from' AND '$end' order by tgldikembalikan_peminjaman desc ");
	}
	//admin
	function getoneadmin($con,$id_admin){
		return mysqli_query($con,"SELECT * from admin where id_admin='$id_admin' ");
	}
	//anggota
	function tambahanggota($con){
		mysqli_query($con,"INSERT into anggota set id_kelas_anggota='$_POST[id_kelas_anggota]',nis_anggota='$_POST[nis_anggota]',nama_anggota='$_POST[nama_anggota]',email_anggota='$_POST[email_anggota]',username_anggota='$_POST[username_anggota]',password_anggota='$_POST[password_anggota]' ");
	}
	function editanggota($con,$id_anggota){
		mysqli_query($con,"UPDATE anggota set id_kelas_anggota='$_POST[id_kelas_anggota]',nis_anggota='$_POST[nis_anggota]',nama_anggota='$_POST[nama_anggota]',email_anggota='$_POST[email_anggota]',username_anggota='$_POST[username_anggota]',password_anggota='$_POST[password_anggota]' where id_anggota='$id_anggota' ");
	}
	function dataanggota($con){
		return mysqli_query($con,"SELECT * FROM anggota left join kelas on anggota.id_kelas_anggota=kelas.id_kelas order by nama_anggota asc ");
	}
	function getoneanggota($con,$id_anggota){
		return mysqli_query($con,"SELECT * FROM anggota left join kelas on anggota.id_kelas_anggota=kelas.id_kelas where id_anggota='$id_anggota' ");
	}
	function autoanggota($con,$key){
		return mysqli_query($con,"SELECT * FROM anggota left join kelas on anggota.id_kelas_anggota=kelas.id_kelas where nis_anggota like '%$key%' or nama_anggota like '%$key%' order by nama_anggota asc limit 10 ");
	}
	function getanggotadarikey($con,$key){
		return mysqli_query($con,"SELECT * FROM anggota left join kelas on anggota.id_kelas_anggota=kelas.id_kelas where nis_anggota='$key' ");
	}
	//kelas
	function tambahkelas($con){
		mysqli_query($con,"INSERT into kelas set nama_kelas='$_POST[nama_kelas]',keahlian_kelas='$_POST[keahlian_kelas]' ");
	}
	function editkelas($con,$id_kelas){
		mysqli_query($con,"UPDATE kelas set nama_kelas='$_POST[nama_kelas]',keahlian_kelas='$_POST[keahlian_kelas]' where id_kelas='$id_kelas' ");
	}
	function datakelas($con){
		return mysqli_query($con,"SELECT * FROM kelas order by nama_kelas asc ");
	}
	function getonekelas($con,$id_kelas){
		return mysqli_query($con,"SELECT * FROM kelas where id_kelas='$id_kelas' ");
	}
	//kategori
	function tambahkategori($con){
		mysqli_query($con,"INSERT into kategori set kategori='$_POST[kategori]' ");
	}
	function editkategori($con,$id_kategori){
		mysqli_query($con,"UPDATE kategori set kategori='$_POST[kategori]' where id_kategori='$id_kategori' ");
	}
	function datakategori($con){
		return mysqli_query($con,"SELECT * FROM kategori order by kategori asc ");
	}
	function getonekategori($con,$id_kategori){
		return mysqli_query($con,"SELECT * FROM kategori where id_kategori='$id_kategori' ");
	}
	//penulis
	function tambahpenulis($con){
		mysqli_query($con,"INSERT into penulis set nama_penulis='$_POST[nama_penulis]' ");
	}
	function editpenulis($con,$id_penulis){
		mysqli_query($con,"UPDATE penulis set nama_penulis='$_POST[nama_penulis]' where id_penulis='$id_penulis' ");
	}
	function datapenulis($con){
		return mysqli_query($con,"SELECT * FROM penulis order by nama_penulis asc ");
	}
	function getonepenulis($con,$id_penulis){
		return mysqli_query($con,"SELECT * FROM penulis where id_penulis='$id_penulis' ");
	}
	//penerbit
	function tambahpenerbit($con){
		mysqli_query($con,"INSERT into penerbit set nama_penerbit='$_POST[nama_penerbit]' ");
	}
	function editpenerbit($con,$id_penerbit){
		mysqli_query($con,"UPDATE penerbit set nama_penerbit='$_POST[nama_penerbit]' where id_penerbit='$id_penerbit' ");
	}
	function datapenerbit($con){
		return mysqli_query($con,"SELECT * FROM penerbit order by nama_penerbit asc ");
	}
	function getonepenerbit($con,$id_penerbit){
		return mysqli_query($con,"SELECT * FROM penerbit where id_penerbit='$id_penerbit' ");
	}
	//rakbuku
	function tambahrakbuku($con){
		mysqli_query($con,"INSERT into rakbuku set nama_rakbuku='$_POST[nama_rakbuku]' ");
	}
	function editrakbuku($con,$id_rakbuku){
		mysqli_query($con,"UPDATE rakbuku set nama_rakbuku='$_POST[nama_rakbuku]' where id_rakbuku='$id_rakbuku' ");
	}
	function datarakbuku($con){
		return mysqli_query($con,"SELECT * FROM rakbuku order by nama_rakbuku asc ");
	}
	function katbuku($con){
		return mysqli_query($con,"SELECT * FROM kategori order by kategori asc ");
	}
		function katpenulis($con){
		return mysqli_query($con,"SELECT * FROM penulis order by nama_penulis asc ");
	}
	function katpenerbit($con){
		return mysqli_query($con,"SELECT * FROM penerbit order by nama_penerbit asc ");
	}
	function getonerakbuku($con,$id_rakbuku){
		return mysqli_query($con,"SELECT * FROM rakbuku where id_rakbuku='$id_rakbuku' ");
	}
	//buku
	function tambahbuku($con,$id_buku){
		mysqli_query($con,"INSERT into buku set id_buku='$id_buku',id_rakbuku_buku='$_POST[id_rakbuku_buku]',nama_buku='$_POST[nama_buku]',id_penulis='$_POST[nama_penulis]',id_penerbit='$_POST[nama_penerbit]',klasifikasi_buku='$_POST[klasifikasi_buku]',tahun_buku='$_POST[tahun_buku]',stok_buku='$_POST[stok_buku]',id_kategori='$_POST[kategori]' ");
	}
	function tambahbuku2($con,$id_buku){
		mysqli_query($con,"INSERT into buku_tamu2 set id_pengunjung='$_POST[id_pengunjung]',nama='$_POST[nama]',nik_nis='$_POST[nik_nis]',tanggal='$_POST[tanggal]',keperluan='$_POST[keperluan]' ");
	}
	function editbuku($con,$id_buku){
		mysqli_query($con,"UPDATE buku set id_rakbuku_buku='$_POST[id_rakbuku_buku]',nama_buku='$_POST[nama_buku]',id_penulis='$_POST[nama_penulis]',klasifikasi_buku='$_POST[klasifikasi_buku]',id_penerbit='$_POST[nama_penerbit]',tahun_buku='$_POST[tahun_buku]',stok_buku='$_POST[stok_buku]',id_kategori='$_POST[kategori]' where id_buku='$id_buku' ");
	}
	function databuku($con){
		return mysqli_query($con,"SELECT * FROM buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku order by nama_buku asc ");
	}
	function getonebuku($con,$id_buku){
		return mysqli_query($con,"SELECT * FROM buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku where id_buku='$id_buku' ");
	}
	function editfotobuku($con,$id_buku,$path){
		mysqli_query($con,"UPDATE buku set foto_buku='$path' where id_buku='$id_buku' ");
	}
	function editfilebuku($con,$id_buku,$path){
		mysqli_query($con,"UPDATE buku set file_buku='$path' where id_buku='$id_buku' ");
	}
	function cekdipinjam($con,$id_buku){
		return mysqli_query($con,"SELECT sum(jumlah_peminjaman) as jumdipinjam from peminjaman where id_buku_peminjaman='$id_buku' and status_peminjaman='dipinjam' ");
	}
	function cekdibooking($con,$id_buku){
		return mysqli_query($con,"SELECT sum(jumlah_booking) as jumdibooking from booking where id_buku_booking='$id_buku' and status_booking='pending' ");
	}
	function autobuku($con,$key){
		return mysqli_query($con,"SELECT * FROM buku where id_buku like '%$key%' or nama_buku like '%$key%' order by nama_buku asc limit 10 ");
	}
	//booking
	function databooking($con){
		return mysqli_query($con,"SELECT * FROM booking left join anggota on booking.id_anggota_booking=anggota.id_anggota left join buku on booking.id_buku_booking=buku.id_buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku left join admin on booking.id_admin=admin.id_admin order by tgl_booking desc ");
	}
	function databookingsukses($con){
		return mysqli_query($con,"SELECT * FROM booking left join anggota on booking.id_anggota_booking=anggota.id_anggota left join buku on booking.id_buku_booking=buku.id_buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku where status_booking='sukses' order by tgl_booking desc ");
	}
	function databookingpending($con){
		return mysqli_query($con,"SELECT * FROM booking left join anggota on booking.id_anggota_booking=anggota.id_anggota left join buku on booking.id_buku_booking=buku.id_buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku where status_booking='pending' order by tgl_booking desc ");
	}
	function ambilbooking($con,$id_booking){
		mysqli_query($con,"UPDATE booking set status_booking='sukses' where id_booking='$id_booking' ");
	}
	function getonebooking($con,$id_booking){
		return mysqli_query($con,"SELECT * FROM booking left join anggota on booking.id_anggota_booking=anggota.id_anggota left join buku on booking.id_buku_booking=buku.id_buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku where id_booking='$id_booking' ");
	}
	//peminjaman
	function tambahpeminjaman($con,$id_peminjaman,$id_anggota_peminjaman,$id_buku_peminjaman,$jumlah_peminjaman,$tgl_peminjaman,$tglkembali_peminjaman){
		mysqli_query($con,"INSERT INTO peminjaman set id_peminjaman='$id_peminjaman',id_anggota_peminjaman='$id_anggota_peminjaman',id_buku_peminjaman='$id_buku_peminjaman',jumlah_peminjaman='$jumlah_peminjaman',tgl_peminjaman='$tgl_peminjaman',tglkembali_peminjaman='$tglkembali_peminjaman',status_peminjaman='dipinjam' ");
	}
	function datapeminjaman($con){
		return mysqli_query($con,"SELECT * FROM peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku order by tgl_peminjaman desc ");
	}
		function lappeminjaman($con,$from,$end){
		return mysqli_query($con,"SELECT * FROM peminjaman LEFT JOIN anggota ON peminjaman.id_anggota_peminjaman=anggota.id_anggota 
LEFT JOIN buku ON peminjaman.id_buku_peminjaman=buku.id_buku 
WHERE peminjaman.tgl_peminjaman BETWEEN '$from' AND '$end' 
ORDER BY tgl_peminjaman DESC");
	}
	function lappeminjamanpinjam($con,$from,$end){
		return mysqli_query($con,"SELECT * FROM peminjaman LEFT JOIN anggota ON peminjaman.id_anggota_peminjaman=anggota.id_anggota 
LEFT JOIN buku ON peminjaman.id_buku_peminjaman=buku.id_buku
where status_peminjaman='dipinjam' and 
 tgl_peminjaman BETWEEN '$from' AND '$end' 
ORDER BY tgl_peminjaman DESC");
	}
	function lappeminjamankembali($con,$from,$end){
		return mysqli_query($con,"SELECT * FROM peminjaman LEFT JOIN anggota ON peminjaman.id_anggota_peminjaman=anggota.id_anggota 
LEFT JOIN buku ON peminjaman.id_buku_peminjaman=buku.id_buku
where status_peminjaman='kembali' and 
 tgl_peminjaman BETWEEN '$from' AND '$end' 
ORDER BY tgl_peminjaman DESC");
	}
	function lapbukutamu($con,$from,$end){
		return mysqli_query($con,"SELECT * FROM buku_tamu2  WHERE tanggal BETWEEN '$from' AND '$end' 
order by tanggal desc ");
	}
	function lapdenda($con,$from,$end){
		return mysqli_query($con,"SELECT anggota.nama_anggota, anggota.nis_anggota, buku.nama_buku, peminjaman.tgl_peminjaman, peminjaman.tgldikembalikan_peminjaman, peminjaman.tglkembali_peminjaman, peminjaman.telat_peminjaman,peminjaman.denda_peminjaman FROM anggota, buku, peminjaman
WHERE anggota.id_anggota=peminjaman.id_anggota_peminjaman AND buku.id_buku=peminjaman.id_buku_peminjaman AND denda_peminjaman>0 AND tglkembali_peminjaman BETWEEN '$from' AND '$end' ");
	}
	function lapbooking($con,$from,$end){
		return mysqli_query($con,"SELECT * FROM booking left join anggota on booking.id_anggota_booking=anggota.id_anggota left join buku on booking.id_buku_booking=buku.id_buku  
WHERE tgl_booking BETWEEN '$from' AND '$end' 
order by tgl_booking desc ");
	}
	function lapbooking1($con,$from,$end){
		return mysqli_query($con,"SELECT * FROM booking left join anggota on booking.id_anggota_booking=anggota.id_anggota left join buku on booking.id_buku_booking=buku.id_buku
where booking.status_booking='sukses' and 
 tgl_booking BETWEEN '$from' AND '$end' 
ORDER BY tgl_booking DESC");
	}
	function lapbooking2($con,$from,$end){
		return mysqli_query($con,"SELECT * FROM booking left join anggota on booking.id_anggota_booking=anggota.id_anggota left join buku on booking.id_buku_booking=buku.id_buku
where booking.status_booking='pending' and 
 tgl_booking BETWEEN '$from' AND '$end' 
ORDER BY tgl_booking DESC");
	}
	function datapeminjamandipinjam($con){
		return mysqli_query($con,"SELECT * FROM peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku where status_peminjaman='dipinjam' order by tgl_peminjaman desc ");
	}
	function datapeminjamankembali($con){
		return mysqli_query($con,"SELECT * FROM peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku where status_peminjaman='kembali' order by tgldikembalikan_peminjaman desc ");
	}
	function kembalipeminjaman($con,$id_peminjaman,$tgldikembalikan_peminjaman,$telat,$denda){
		mysqli_query($con,"UPDATE peminjaman set tgldikembalikan_peminjaman='$tgldikembalikan_peminjaman',telat_peminjaman='$telat',denda_peminjaman='$denda',status_peminjaman='kembali' where id_peminjaman='$id_peminjaman' ");
	}
	function datapeminjamansaya($con,$id_anggota){
		return mysqli_query($con,"SELECT * FROM peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku where id_anggota_peminjaman='$id_anggota' and status_peminjaman='dipinjam' order by tgl_peminjaman desc ");
	}
	function getonepeminjaman($con,$id_peminjaman){
		return mysqli_query($con,"SELECT * FROM peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku where id_peminjaman='$id_peminjaman' ");
	}
	//setting
	function settingaplikasi($con){
		mysqli_query($con,"UPDATE setting set batasambil_setting='$_POST[batasambil_setting]',lamapinjam_setting='$_POST[lamapinjam_setting]',denda_setting='$_POST[denda_setting]',email_setting='$_POST[email_setting]',atasnama_setting='$_POST[atasnama_setting]' ");
	}
	//pengembalian
	function datapengembaliansaya($con,$id_anggota){
		return mysqli_query($con,"SELECT * FROM peminjaman left join anggota on peminjaman.id_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku where id_anggota_peminjaman='$id_anggota' and status_peminjaman='kembali' order by tgldikembalikan_peminjaman desc ");
	}
	//semua hapus disini
	function hapusrakbuku($con,$id_rakbuku){
		mysqli_query($con,"DELETE FROM rakbuku where id_rakbuku='$id_rakbuku' ");
	}
	function hapuskategori($con,$id_kategori){
		mysqli_query($con,"DELETE FROM kategori where id_kategori='$id_kategori' ");
	}
	function hapuspenulis($con,$id_penulis){
		mysqli_query($con,"DELETE FROM penulis where id_penulis='$id_penulis' ");
	}
	function hapuspenerbit($con,$id_penerbit){
		mysqli_query($con,"DELETE FROM penerbit where id_penerbit='$id_penerbit' ");
	}
	function hapuskelas($con,$id_kelas){
		mysqli_query($con,"DELETE FROM kelas where id_kelas='$id_kelas' ");
	}
	function hapusbooking($con,$id_booking){
		mysqli_query($con,"DELETE FROM booking where id_booking='$id_booking' ");
	}
	function hapuspeminjaman($con,$id_peminjaman){
		mysqli_query($con,"DELETE FROM peminjaman where id_peminjaman='$id_peminjaman' ");
	}
	function hapusbuku($con,$id_buku){
		mysqli_query($con,"DELETE FROM buku where id_buku='$id_buku' ");
	}
	function hapusbookingbuku($con,$id_buku){
		mysqli_query($con,"DELETE FROM booking where id_buku_booking='$id_buku' ");
	}
	function hapuspeminjamanbuku($con,$id_buku){
		mysqli_query($con,"DELETE FROM peminjaman where id_buku_peminjaman='$id_buku' ");
	}
	function hapusanggota($con,$id_anggota){
		mysqli_query($con,"DELETE FROM anggota where id_anggota='$id_anggota' ");
	}
	function hapusbookinganggota($con,$id_anggota){
		mysqli_query($con,"DELETE FROM booking where id_anggota_booking='$id_anggota' ");
	}
	function hapuspeminjamananggota($con,$id_anggota){
		mysqli_query($con,"DELETE FROM peminjaman where id_anggota_peminjaman='$id_anggota' ");
	}
}
?>