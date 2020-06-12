<div class="row">
	<div class="col-lg-6 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Setting Akun Saya
			</div>
			<form method="post" action="<?php echo $base_url.'home/control.php?pos=settingprofile'; ?>">
			<div class="panel-body">
				<div class="form-group">
					<label>NIS</label>
					<input type="text" name="nis_anggota" class="form-control" value="<?php echo $dang['nis_anggota']; ?>">
				</div>
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama_anggota" class="form-control" value="<?php echo $dang['nama_anggota']; ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email_anggota" class="form-control" value="<?php echo $dang['email_anggota']; ?>">
				</div>
				<p>*pastikan email anda valid dan dapat menerima inbox</p>

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