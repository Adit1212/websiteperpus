<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Pengembalian Saya
			</div>
			<div class="panel-body table-responsive">
	         <table class="table table-bordered table-hover example">
	           	<thead>
	           		<th width="5%">No</th>
				      <th>Nama Buku</th>
				      <th>Kode klasifikasi</th>
		              <th>Penulis</th>
		              <th>Penerbit</th>
				      <th>Jumlah</th>
				       <th>Petugas</th>
				      <th>Tanggal Pengembalian</th>
				      <th>Telat</th>
				      <th>Denda</th>
				      <th>Status</th>
	           	</thead>
					<tbody>
						<?php $sql= $go->datapengembaliansaya($con,$_SESSION['id_anggota']);
						$no= 1; while($data= mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nama_buku']; ?></td>
							<td><?php echo $data['klasifikasi_buku']; ?></td>
							<td><?php echo $data['id_penulis']; ?></td>
							<td><?php echo $data['id_penerbit']; ?></td>
							<td><?php echo $data['jumlah_peminjaman']; ?></td>
							<td><?php echo $data['nama_admin']; ?></td>
							<td><?php echo dmy($data['tgldikembalikan_peminjaman']); ?></td>
							<td><?php echo $data['telat_peminjaman']; ?> Hari</td>
							<td><?php echo rp($data['denda_peminjaman']); ?></td>
							<td><?php echo statusbook($data['status_peminjaman']); ?></td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>