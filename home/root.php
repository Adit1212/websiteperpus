<?php class root{
	//home
	function bukuseringdipinjam($con,$limit){
		return mysqli_query($con,"SELECT id_buku_peminjaman,count(id_buku_peminjaman) as jumpembuku from peminjaman group by id_buku_peminjaman order by jumpembuku desc limit $limit ");
	}
	function anggotaseringminjam($con,$limit){
		return mysqli_query($con,"SELECT peminjaman.id_anggota_peminjaman,COUNT(peminjaman.id_anggota_peminjaman) AS jumminjam, anggota.nama_anggota
			FROM peminjaman, anggota
			WHERE peminjaman.id_anggota_peminjaman=anggota.id_anggota 
			GROUP BY id_anggota_peminjaman ORDER BY jumminjam DESC limit $limit ");
	}
	function bukuterkini($con,$limit){
		return mysqli_query($con,"SELECT id_buku_peminjaman,count(id_buku_peminjaman) as jumpembuku from peminjaman group by id_buku_peminjaman order by tgl_peminjaman desc limit $limit ");
	}
	//login
	function loginadmin($con){
		return mysqli_query($con,"SELECT * FROM admin where username_admin='$_POST[username]' and password_admin='$_POST[password]' ");
	}
	function loginanggota($con){
		return mysqli_query($con,"SELECT * FROM anggota where username_anggota='$_POST[username]' and password_anggota='$_POST[password]' and status_anggota='aktif' ");
	}
	//buku
	function databuku($con){
		return mysqli_query($con,"SELECT * FROM buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku order by nama_buku asc ");
	}
	function getonebuku($con,$id_buku){
		return mysqli_query($con,"SELECT buku.*, kategori.kategori, rakbuku.nama_rakbuku FROM buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku 
			left join kategori on buku.id_kategori=kategori.id_kategori left join penulis on buku.id_penulis=penulis.id_penulis left join penerbit on buku.id_penerbit=penerbit.id_penerbit
			where id_buku='$id_buku' ");
	}
	function getoneadmin($con,$id_admin){
		return mysqli_query($con,"SELECT * FROM admin WHERE id_admin = '1427'");
	}
	function cekdipinjam($con,$id_buku){
		return mysqli_query($con,"SELECT sum(jumlah_peminjaman) as jumdipinjam from peminjaman where id_buku_peminjaman='$id_buku' and status_peminjaman='dipinjam' ");
	}
	function cekdibooking($con,$id_buku){
		return mysqli_query($con,"SELECT sum(jumlah_booking) as jumdibooking from booking where id_buku_booking='$id_buku' and status_booking='pending' ");
	}
	function caribuku($con,$key){
		return mysqli_query($con,"SELECT * FROM buku where id_kategori like '%$key%' or nama_buku like '%$key%' order by nama_buku asc limit 12 ");
	}
	function katbuku($con,$key){
		return mysqli_query($con,"SELECT * FROM buku where id_kategori like '%$key%' order by nama_buku asc limit 12 ");
	}
	//anggota
	function getoneanggota($con,$id_anggota){
		return mysqli_query($con,"SELECT * FROM anggota left join kelas on anggota.id_kelas_anggota=kelas.id_kelas where id_anggota='$id_anggota' ");
	}
	function tambahanggota($con,$token){
		mysqli_query($con,"INSERT into anggota set id_kelas_anggota='$_POST[kelas]',nis_anggota='$_POST[nis_anggota]',nama_anggota='$_POST[nama_anggota]',email_anggota='$_POST[email_anggota]',username_anggota='$_POST[username_anggota]',password_anggota='$_POST[password_anggota]',status_anggota='pending',token_anggota='$token' ");
	}
	function buku_tamu($con){
		$tanggal=date('d F Y');
		mysqli_query($con,"INSERT into buku_tamu set id_pengunjung='$_POST[id_pengunjung]',nama='$_POST[nama]',nik_nis='$_POST[nis]',tanggal='$_POST[tanggal]',keperluan='$_POST[keperluan]'");
	}
	//booking
	function tambahbooking($con,$id_booking,$tgl_booking,$batasambil_booking){
		mysqli_query($con,"INSERT into booking set id_booking='$id_booking',id_anggota_booking='$_POST[id_anggota_booking]',id_buku_booking='$_POST[id_buku_booking]',jumlah_booking='$_POST[jumlah_booking]',tgl_booking='$tgl_booking',batasambil_booking='$batasambil_booking',status_booking='pending' ");
	}
	function databookingsaya($con,$id_anggota){
		return mysqli_query($con,"SELECT * FROM booking left join buku on booking.id_buku_booking=buku.id_buku left join rakbuku on buku.id_rakbuku_buku=rakbuku.id_rakbuku left join admin on booking.id_admin=admin.id_admin where id_anggota_booking='$id_anggota' order by tgl_booking desc ");
	}
	function batalbooking($con,$id_booking){
		mysqli_query($con,"DELETE from booking where id_booking='$id_booking' ");
	}
	//peminjaman
	function datapeminjamansaya($con,$id_anggota){
		return mysqli_query($con,"SELECT * FROM peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku left join admin on admin.id_admin=peminjaman.id_admin where id_anggota_peminjaman='$id_anggota' order by tgl_peminjaman desc ");
	}
	//kelas
	function datakelas($con){
		return mysqli_query($con,"SELECT * FROM kelas order by nama_kelas asc ");
	}
	//akunsaya
	function settingprofile($con,$id_anggota){
		mysqli_query($con,"UPDATE anggota set nis_anggota='$_POST[nis_anggota]',nama_anggota='$_POST[nama_anggota]',email_anggota='$_POST[email_anggota]' where id_anggota='$id_anggota' ");
	}
	//pengembalian
	function datapengembaliansaya($con,$id_anggota){
		return mysqli_query($con,"SELECT * FROM peminjaman left join anggota on peminjaman.id_anggota_peminjaman=anggota.id_anggota left join buku on peminjaman.id_buku_peminjaman=buku.id_buku left join admin on peminjaman.id_admin=admin.id_admin where id_anggota_peminjaman='$id_anggota' and status_peminjaman='kembali' order by tgldikembalikan_peminjaman desc ");
	}
}
?>