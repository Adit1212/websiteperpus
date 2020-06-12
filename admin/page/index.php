<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">
				<h4><i class="fa fa-users"></i> DATA ANGGOTA</h4>
			</div>
			<div class="panel-body text-center">
				<b style="font-size: 30px;"><?php $anggota= $go->dataanggota($con); echo mysqli_num_rows($anggota); ?></b>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-success">
			<div class="panel-heading text-center">
				<h4><i class="fa fa-book"></i> DATA BUKU</h4>
			</div>
			<div class="panel-body text-center">
				<b style="font-size: 30px;"><?php $buku= $go->databuku($con); echo mysqli_num_rows($buku); ?></b>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-warning">
			<div class="panel-heading text-center">
				<h4><i class="fa fa-calendar-check-o"></i> DATA PEMINJAMAN</h4>
			</div>
			<div class="panel-body text-center">
				<b style="font-size: 30px;"><?php $dipinjam= $go->datapeminjamankembali($con); echo mysqli_num_rows($dipinjam); ?></b>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-danger">
			<div class="panel-heading text-center">
				<h4><i class="fa fa-check-square"></i> DATA PENGEMBALIAN</h4>
			</div>
			<div class="panel-body text-center">
				<b style="font-size: 30px;"><?php $kembali= $go->datapeminjamankembali($con); echo mysqli_num_rows($kembali); ?></b>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading text-center">
				<h4><i class="fa fa-calendar"></i> DATA BOOKING</h4>
			</div>
			<div class="panel-body text-center">
				<b style="font-size: 30px;"><?php $booking= $go->databooking($con); echo mysqli_num_rows($booking); ?></b>
			</div>
		</div>
	</div>
	
</div>
<!-- 
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Buku Yang Sering Dipinjam
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<th width="5%">No</th>
						<th>ID</th>
						<th>Buku</th>
						<th>Jumlah Dipinjam</th>
					</thead>
					<tbody>
						<?php 
						$bukuserpin= $go->bukuseringdipinjam($con,10);
						$no= 1;
						while($dbuserpin= mysqli_fetch_array($bukuserpin)){
						$buku= $go->getonebuku($con,$dbuserpin['id_buku_peminjaman']);
						$dbuk= mysqli_fetch_array($buku); ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td>#<?php echo $dbuk['id_buku']; ?></td>
							<td><?php echo $dbuk['nama_buku']; ?></td>
							<td><?php echo $dbuserpin['jumpembuku']; ?></td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Anggota Yang Sering Meminjam
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<th width="5%">No</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Meminjam</th>
					</thead>
					<tbody>
						<?php 
						$angsepin= $go->anggotaseringminjam($con,10);
						$no= 1;
						while($dangsepin= mysqli_fetch_array($angsepin)){
						$anggota= $go->getoneanggota($con,$dangsepin['id_anggota_peminjaman']);
						$dang= mysqli_fetch_array($anggota); ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td>#<?php echo $dang['nis_anggota']; ?></td>
							<td><?php echo $dang['nama_anggota']; ?></td>
							<td><?php echo $dang['nama_kelas']; ?></td>
							<td><?php echo $dangsepin['jumminjam']; ?></td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
 -->