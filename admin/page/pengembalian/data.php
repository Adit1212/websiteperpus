<?php if(isset($_GET['key'])){
	$anggota= $go->getoneanggota($con,$_GET['key']);
	$dang= mysqli_fetch_array($anggota);
}?>

<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Cari Anggota Dengan NIS / Nama
			</div>
			<div class="panel-body">
				<form method="get" action="<?php echo $base_url.'admin/home.php'; ?>">
					<input type="hidden" name="page" value="pengembalian">
					<div class="form-group">
						<input type="text" id="anggota" class="form-control" placeholder="Cari Anggota Dari NIS">
					</div>
					<input type="hidden" name="key">
					<input type="hidden" name="nama">
					<button class="btn btn-primary">Cari...</button>
				</form>
			</div>
		</div>
	</div>
	<?php if(isset($_GET['key'])){ ?>
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				Detail Anggota
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<td>NIS</td>
						<td><?php echo $dang['nis_anggota']; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td><?php echo $dang['nama_anggota']; ?></td>
					</tr>
					<tr>
						<td>Status peminjam</td>
						<td><?php echo $dang['nama_kelas']; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $dang['email_anggota']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php if(isset($_GET['key'])){ ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Peminjaman & Pengembalian <b><?php echo $dang['nama_anggota']; ?></b>
			</div>
			<div class="panel-body table-responsive">
				<div class="nav-tabs">
					<ul class="nav nav-tabs">
	              <li class="active"><a href="#Peminjaman" data-toggle="tab">Peminjaman</a></li>
	              <li><a href="#Pengembalian" data-toggle="tab">Pengembalian</a></li>
	            </ul>
	            <div class="tab-content">
	            <br>
	              <!-- Font Awesome Icons -->
	              <div class="tab-pane active" id="Peminjaman">
	              	<table class="table table-bordered table-hover example">
			           	<thead>
				            <th width="5%">No</th>
				            <th>Nama Buku</th>
				            <th>Jumlah</th>
				            <th>Dipinjam</th>
				            <th>Kembali</th>
				            <th>Status</th>
				           
				            <th>Aksi</th>
			           	</thead>
							<tbody>
								<?php $sql= $go->datapeminjamansaya($con,$dang['id_anggota']);
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
							           		<?php if($data['status_peminjaman']!='kembali'){ ?>
							           	  	<li><a href="javascript:void(0)" onclick="kembali('<?php echo $data['id_peminjaman']; ?>')">Sudah Kembali</a></li>
							           	  	<?php } ?>
							           	  	<li><a href="javascript:void(0)" onclick="hapus('<?php echo $data['id_peminjaman']; ?>')">Hapus</a></li>
							           	</ul>
							         </div>
									</td>
								</tr>
								<?php $no++; } ?>
							</tbody>
						</table>
	              </div>
	              <div class="tab-pane" id="Pengembalian">
	              	<table class="table table-bordered table-hover example">
			           	<thead>
				            <th width="5%">No</th>
				            <th>Nama Buku</th>
				            <th>Kode Klasifikasi</th>
		                    <th>Penulis</th>
		                    <th>Penerbit</th>
				            <th>Jumlah Buku</th>
				            <th>Tanggal Kembali</th>
				            <th>Telat</th>
				            <th>Denda</th>
				            <th>Status</th>
				            <th>Aksi</th>

			           	</thead>
							<tbody>
								<?php $sql= $go->datapengembaliansaya($con,$dang['id_anggota']);
								$no= 1; while($data= mysqli_fetch_array($sql)){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data['nama_buku']; ?></td>
									<td><?php echo $data['klasifikasi_buku']; ?></td>
							        <td><?php echo $data['id_penulis']; ?></td>
							        <td><?php echo $data['id_penerbit']; ?></td>
									<td><?php echo $data['jumlah_peminjaman']; ?></td>
									<td><?php echo dmy($data['tgldikembalikan_peminjaman']); ?></td>
									<td><?php echo $data['telat_peminjaman']; ?> Hari</td>
									<td><?php echo rp($data['denda_peminjaman']); ?></td>
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
		</div>
	</div>
</div>
<?php } ?>
<script type="text/javascript">
	$(function(){
		$('#anggota').autocomplete({
         source: "<?php echo $base_url.'admin/control.php?pos=autoanggota'; ?>",
      
         select: function (event, ui) {
            $('[name="key"]').val(ui.item.id_anggota); 
            $('[name="nama"]').val(ui.item.nama_anggota); 
         }
      });
	});
</script>
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