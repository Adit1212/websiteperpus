<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Peminjaman <span class="pull-right"><a href="<?php echo $base_url.'admin/home.php?page=tambahpeminjaman'; ?>" class="btn btn-primary btn-xs">Tambah Peminjaman</a></span>
			</div>
			<div class="panel-body table-responsive">
	         <table class="table table-bordered table-hover example">
	           	<thead>
		            <th width="5%">No</th>
		            <th>Nama Anggota</th>
		            <th>Nama Buku</th>
		            <th>Kode Klasifikasi</th>
		            <th>Penulis</th>
		            <th>Penerbit</th>
		            <th>Jumlah</th>
		            <th>Dipinjam</th>
		            <th>Kembali</th>
		            <th>Status</th>
		            <th width="10%">Aksi</th>
	           	</thead>
					<tbody>
						<?php $sql= $go->datapeminjaman($con);
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
							
							<td><?php echo $data['nama_anggota']; ?></td>
							<td><?php echo $data['nama_buku']; ?></td>
							<td><?php echo $data['klasifikasi_buku']; ?></td>
							<td><?php echo $data['id_penulis']; ?></td>
							<td><?php echo $data['id_penerbit']; ?></td>
							<td><?php echo $data['jumlah_peminjaman']; ?></td>
							<td><?php echo dmy($data['tgl_peminjaman']); ?></td>
							<td><?php echo dmy($data['tglkembali_peminjaman']); ?></td>
							
							<td><?php echo statusbook($data['status_peminjaman']); ?></td>
							<td>
								<div class="btn-group">
					           	<button type="button" class="btn btn-info btn-xs"><i class="fa fa-cog"></i></button>
					           	<button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
					           	  <span class="caret"></span>
					           	  <span class="sr-only">Toggle Dropdown</span>
					           	</button>
					           	<ul class="dropdown-menu" role="menu">
					           		<li><a href="javascript:void(0)" onclick="hapus('<?php echo $data['id_peminjaman']; ?>')">Hapus</a></li>
					           	</ul>
					         </div>
							</td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function kembali(id){
		swal({
		  title: "Peminjaman telah dikembalikan?",
		  text: "Tekan Ya Untuk Setuju dan Tekan Batal Jika Tidak Setuju",
		  type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
		})
		.then(function () {
        	$.ajax({
				type : "GET",
				url : "<?php echo $base_url.'admin/control.php?pos=kembalipeminjaman&peminjaman='; ?>"+id,
				cache : false,
				
				success : function(response){
					document.location.reload();
				}
			});
      },
      function (dismiss) {
        if(dismiss === 'cancel') {
          
        }
      })
	}
	function hapus(id){
		swal({
		  title: "Menghapus peminjaman ini?",
		  text: "Tekan Ya Untuk Setuju dan Tekan Batal Jika Tidak Setuju",
		  type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
		})
		.then(function () {
        	$.ajax({
				type : "GET",
				url : "<?php echo $base_url.'admin/control.php?pos=hapuspeminjaman&peminjaman='; ?>"+id,
				cache : false,
				
				success : function(response){
					document.location.reload();
				}
			});
      },
      function (dismiss) {
        if(dismiss === 'cancel') {
          
        }
      })
	}
</script>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='kembali'){ ?>
<script>
	iziToast.show({timeout:5000,color:'green',title: 'Peminjaman Telah Dikembalikan',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='hapus'){ ?>
<script>
	iziToast.show({timeout:5000,color:'red',title: 'Berhasil Dihapus',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php $_SESSION['msg']= ''; ?>