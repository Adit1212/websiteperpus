<div class="row">
	<div class="col-lg-6 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Setting Aplikasi
			</div>
			<form method="post" action="<?php echo $base_url.'admin/control.php?pos=settingaplikasi'; ?>">
			<div class="panel-body">
				<div class="form-group">
					<label>Batas Ambil Booking Buku (Hari)</label>
					<input type="number" name="batasambil_setting" class="form-control" value="<?php echo $setapp['batasambil_setting']; ?>">
				</div>
				<div class="form-group">
					<label>Lama Peminjaman (Hari)</label>
					<input type="number" name="lamapinjam_setting" class="form-control" value="<?php echo $setapp['lamapinjam_setting']; ?>">
				</div>
				<div class="form-group">
					<label>Denda Telat Per Hari (Rp)</label>
					<input type="number" name="denda_setting" class="form-control" value="<?php echo $setapp['denda_setting']; ?>">
				</div>
				<div class="form-group">
					<label>Email Aplikasi</label>
					<input type="text" name="email_setting" class="form-control" value="<?php echo $setapp['email_setting']; ?>">
				</div>
				<div class="form-group">
					<label>Atas Nama Email</label>
					<input type="text" name="atasnama_setting" class="form-control" value="<?php echo $setapp['atasnama_setting']; ?>">
				</div>
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary">Simpan Perubahan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='setting'){ ?>
<script>
	iziToast.show({timeout:5000,color:'green',title: 'Berhasil Disimpan',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php $_SESSION['msg']= ''; ?>