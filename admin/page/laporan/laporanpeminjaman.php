							<div class="row">
	<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Pilih Tipe Laporan
			</div>
			<div class="panel-body">
				<form target="_blank" method="get" action="<?php echo $base_url.'admin/control.php'; ?>">
					<input type="hidden" name="pos" value="laporanpeminjaman">
					<div class="form-group">
						<select class="form-control" name="tipe">
							<option value="dipinjam">Cetak Status Dipinjam</option>
							<option value="kembali">Cetak Status Kembali</option>
							<option value="semua">Cetak Semua Peminjaman</option>
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
					
					<button class="btn btn-primary">Cetak</button>
				</form>
			</div>
		</div>
	</div>
</div>


							