<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Pilih Tipe Laporan
			</div>
			<div class="panel-body">
				<form target="_blank" method="get" action="<?php echo $base_url.'admin/control.php'; ?>">
					<input type="hidden" name="pos" value="laporanbuku">
					<div class="form-group">
						<select class="form-control" name="tipe">
							<option value="semua">Cetak Semua Buku</option>
							<option value="gaklaris">Cetak Buku Tidak Diminati</option>
							<option value="seringdipinjam">Cetak Buku Sering Dipinjam</option>
							<option value="sedangdipinjam">Cetak Buku Sedang Dipinjam</option>
							<option value="sudahkembali">Cetak Buku Sudah Kembali</option>
						</select>
					</div>
					<p>Dari</p>
					<div class="form-group">
						<input type="date" name="from" class="form-control" placeholder="Dari">
					</div>
					<p>Sampai</p>
					<div class="form-group">
						<input type="date" name="end" class="form-control" placeholder="Sampai">
					</div>
					<!-- <p>Maksimal Peminjaman (<i>hanya untuk laporan buku tidak diminati</i>)</p>
					 --><div class="form-group">
						<input type="hidden" name="maksimal" class="form-control" placeholder="Maksimal" value="0">
					</div>
					<!-- <div class="form-group">
						<input  type="number" name="jumlahdata" class="form-control" placeholder="Jumlah Data">
					</div> -->
					<button class="btn btn-primary">Cetak</button>
				</form>
			</div>
		</div>
	</div>
</div>