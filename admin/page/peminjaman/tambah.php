<div class="row">
	<form id="formpeminjaman">
	<div class="col-lg-4 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Pilih Anggota
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Cari Anggota Dengan NIS / Nama</label>
					<input type="text" id="anggota" class="form-control">
				</div>
				<input type="hidden" name="id_anggota">
				<div class="form-group">
					<label>NIS Anggota</label>
					<input type="text" name="nis_anggota" id="nis_anggota" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Nama Anggota</label>
					<input type="text" name="nama_anggota" id="nama_anggota" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Kelas</label>
					<input type="text" name="nama_kelas" id="nama_kelas" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email_anggota" id="email_anggota" class="form-control" readonly="">
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Pilih Buku
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Cari Buku Dengan ID / Nama Buku</label>
					<input type="text" id="buku" class="form-control">
				</div>
				<div class="form-group">
					<label>ID Buku</label>
					<input type="text" name="id_buku" id="id_buku" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Nama Buku</label>
					<input type="text" name="nama_buku" id="nama_buku" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Stok Buku</label>
					<input type="text" name="stok_buku" id="stok_buku" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label>Sisa Stok</label>
					<input type="text" name="sisa_stok" id="sisa_stok" class="form-control" readonly="">
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Form Peminjaman
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Jumlah Pinjam</label>
					<select class="form-control" name="jumlah_peminjaman" id="jumlah_peminjaman" required="">
						<option>1</option>
						<option>2</option>
					</select>
				</div>
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary" id="btpeminjaman">Proses Peminjaman</button>
			</div>
		</div>
	</div>
	</form>
</div>
<script type="text/javascript">
	$(function(){
		$('#anggota').autocomplete({
         source: "<?php echo $base_url.'admin/control.php?pos=autoanggota'; ?>",
      
         select: function (event, ui) {
            $('[name="id_anggota"]').val(ui.item.id_anggota); 
            $('[name="nis_anggota"]').val(ui.item.nis_anggota); 
            $('[name="nama_anggota"]').val(ui.item.nama_anggota); 
            $('[name="nama_kelas"]').val(ui.item.nama_kelas); 
            $('[name="email_anggota"]').val(ui.item.email_anggota); 
         }
      });
	});
	$(function(){
		$('#buku').autocomplete({
         source: "<?php echo $base_url.'admin/control.php?pos=autobuku'; ?>",
      
         select: function (event, ui) {
            $('[name="id_buku"]').val(ui.item.id_buku); 
            $('[name="nama_buku"]').val(ui.item.nama_buku); 
            $('[name="stok_buku"]').val(ui.item.stok_buku); 
            $('[name="sisa_stok"]').val(ui.item.sisa_stok); 
         }
      });
	});
	$('#formpeminjaman').submit(function(e){
		$.ajax({
			type : "post",
			url : "<?php echo $base_url.'admin/control.php?pos=tambahpeminjaman'; ?>",
			data : $('#formpeminjaman').serialize(),
			cache : false,
			beforeSend : function(){
				$('#btpeminjaman').html('Sedang Diproses...').show();
			},
			success : function(response){
				$('#btpeminjaman').html('Proses Peminjaman').show();
				swal({
				  title: "Berhasil menambah peminjaman buku",
				  type: "success",
		        showCancelButton: false,
		        confirmButtonText: 'Lihat Data',
		        cancelButtonText: 'Batal',
				})
				.then(function () {
		        	window.location.href="<?php echo $base_url.'admin/home.php?page=peminjaman'; ?>";
		      },
		      function (dismiss) {
		        if(dismiss === 'cancel') {
		          
		        }
		      })
			}
		});
		return false;
	})
</script>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='setting'){ ?>
<script>
	iziToast.show({timeout:5000,color:'green',title: 'Berhasil Disimpan',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php $_SESSION['msg']= ''; ?>