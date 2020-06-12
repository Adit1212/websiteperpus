<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Buku <span class="pull-right"><a href="javascript:void(0)" onclick="tambah()" class="btn btn-primary btn-xs">Tambah Buku</a></span>
			</div>
			<div class="panel-body table-responsive">
	         <table class="table table-bordered table-hover example">
	           	<thead>
		            <th width="5%">No</th>
		     		<th>Nama Buku</th>
		            <th>Rak Buku</th>
		            <th>Kode Klasifikasi</th>
		            <th>Penulis</th>
		            <th>Penerbit</th>
		            <th>Stok</th>
		            <th>Sisa</th>
		            <th width="15%">Aksi</th>
	           	</thead>
					<tbody>
						<?php $sql= $go->databuku($con);
						$no= 1; 
						while($data= mysqli_fetch_array($sql)){
						$cekdipinjam= $go->cekdipinjam($con,$data['id_buku']); $cekdp= mysqli_fetch_array($cekdipinjam);
               	$cekdibooking= $go->cekdibooking($con,$data['id_buku']); $cekdbo= mysqli_fetch_array($cekdibooking);
               	$sisa= $data['stok_buku']-$cekdp['jumdipinjam']-$cekdbo['jumdibooking'];
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nama_buku']; ?></td>
							<td><?php echo $data['nama_rakbuku']; ?></td>
							<td><?php echo $data['klasifikasi_buku']; ?></td>
							<td><?php echo $data['id_penulis']; ?></td>
							<td><?php echo $data['id_penerbit']; ?></td>
							<td><?php echo $data['stok_buku']; ?></td>
							<td><?php echo $sisa; ?></td>
							<td>
								<div class="btn-group">
					           	<button type="button" class="btn btn-info btn-xs"><i class="fa fa-cog"></i></button>
					           	<button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
					           	  <span class="caret"></span>
					           	  <span class="sr-only">Toggle Dropdown</span>
					           	</button>
					           	<ul class="dropdown-menu" role="menu">
					           	  	<li><a href="javascript:void(0)" onclick="foto('<?php echo $data['id_buku']; ?>')">Foto Buku</a></li>
					           	  	<li><a href="javascript:void(0)" onclick="file('<?php echo $data['id_buku']; ?>')">File Buku</a></li>
					           	</ul>
					         </div>
								<a href="javascript:void(0)" onclick="edit('<?php echo $data['id_buku']; ?>')" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
								<a href="javascript:void(0)" onclick="hapus('<?php echo $data['id_buku']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="tambah"></div>
<div id="edit"></div>
<div id="foto"></div>
<div id="file"></div>
<script>
	function	file(id){
		$.ajax({
			type : "GET",
			url : "<?php echo $base_url.'admin/page/buku/filebuku.php?id_buku='; ?>"+id,
			cache : false,
			
			success : function(html){
				$("#file").html(html).show();
				$('#modfile').modal('show');
			}
		});
	}
	function	foto(id){
		$.ajax({
			type : "GET",
			url : "<?php echo $base_url.'admin/page/buku/fotobuku.php?id_buku='; ?>"+id,
			cache : false,
			
			success : function(html){
				$("#foto").html(html).show();
				$('#modfoto').modal('show');
			}
		});
	}
	function	tambah(){
		$.ajax({
			type : "GET",
			url : "<?php echo $base_url.'admin/page/buku/tambah.php'; ?>",
			cache : false,
			
			success : function(html){
				$("#tambah").html(html).show();
				$('#modtambah').modal('show');
			}
		});
	}
	function	edit(id){
		$.ajax({
			type : "GET",
			url : "<?php echo $base_url.'admin/page/buku/edit.php?id_buku='; ?>"+id,
			cache : false,
			
			success : function(html){
				$("#edit").html(html).show();
				$('#modedit').modal('show');
			}
		});
	}
	function hapus(id){
		swal({
		  title: "Menghapus buku ini?",
		  text: "Jika anda menghapus data file,data booking,data peminjaman dari buku ini akan terhapus. Tekan ya jika anda setuju",
		  type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
		})
		.then(function () {
        	$.ajax({
				type : "GET",
				url : "<?php echo $base_url.'admin/control.php?pos=hapusbuku&buku='; ?>"+id,
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
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='simpan'){ ?>
<script>
	iziToast.show({timeout:5000,color:'green',title: 'Berhasil Disimpan',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='edit'){ ?>
<script>
	iziToast.show({timeout:5000,color:'blue',title: 'Berhasil Diedit',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='foto'){ ?>
<script>
	iziToast.show({timeout:5000,color:'blue',title: 'Foto Berhasil Diubah',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='file'){ ?>
<script>
	iziToast.show({timeout:5000,color:'blue',title: 'File Berhasil Diubah',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='hapus'){ ?>
<script>
	iziToast.show({timeout:5000,color:'red',title: 'Berhasil Dihapus',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php $_SESSION['msg']= ''; ?>
