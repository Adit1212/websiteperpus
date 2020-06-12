<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Peminjaman Saya
			</div>
			<div class="panel-body table-responsive">
	         <table class="table table-bordered table-hover example">
	           	<thead>
	           		<th width="5%">No</th>
		    		<th>Nama Buku</th>
		    		<th>Kode klasifikasi</th>
		            <th>Penulis</th>
		            <th>Penerbit</th>
		             <th>Petugas</th>
		            <th>Jumlah</th>
		            <th>Tanggal Peminjaman</th>
		            <th>Tanggal Pengembalian</th>
		            
		            <th>Status</th>
	           	</thead>
					<tbody>
						<?php $sql= $go->datapeminjamansaya($con,$_SESSION['id_anggota']);
						$no= 1; while($data= mysqli_fetch_array($sql)){
						///telat
						$tglsek= date('Y-m-d');
						$selisih= selisih(ymd($data['tglkembali_peminjaman']),$tglsek);
						if($selisih < 0 or $data['status_peminjaman']=='kembali'){
							$telat= '-';
							$denda= '-';
						}
						else{
							$telat= $selisih.' Hari';
							$denda= $telat*$setapp['denda_setting'];
						}
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nama_buku']; ?></td>
							<td><?php echo $data['klasifikasi_buku']; ?></td>
							<td><?php echo $data['id_penulis']; ?></td>
							<td><?php echo $data['id_penerbit']; ?></td>
							<td><?php echo $data['nama_admin']; ?></td>
							<td><?php echo $data['jumlah_peminjaman']; ?></td>
							<td><?php echo dmy($data['tgl_peminjaman']); ?></td>
							<td><?php echo dmy($data['tglkembali_peminjaman']); ?></td>
							
							<td><?php echo statusbook($data['status_peminjaman']); ?></td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='kembali'){ ?>
<script>
	iziToast.show({timeout:5000,color:'green',title: 'Peminjaman Telah Dikembalikan',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php $_SESSION['msg']= ''; ?>