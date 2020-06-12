<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Booking
			</div>
			<div class="panel-body table-responsive">
	         <table class="table table-bordered table-hover example">
	           	<thead>
		            <th width="5%">No</th>
		             <th>Kode Booking</th>
		            <th>Nama Anggota</th>
		            <th>Nama Buku</th>
		             <th>Kode rak buku</th>
		            <th>Penulis</th>
		            <th>Petugas</th>
		            <th>Penerbit</th>
		            <th>Jumlah</th>
		            <th>Tanggal</th>
		            <th>Batas Ambil</th>
		            <th>Status</th>
		            <th width="10%">Aksi</th>
	           	</thead>
					<tbody>
						<?php $sql= $go->databooking($con);
						$no= 1; while($data= mysqli_fetch_array($sql)){ ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['id_booking']; ?></td>
							<td><?php echo $data['nama_anggota']; ?></td>
							<td><?php echo $data['nama_buku']; ?></td>
							<td><?php echo $data['nama_rakbuku']; ?></td>
							<td><?php echo $data['id_penulis']; ?></td>
							<td><?php echo $data['nama_admin']; ?></td>
							<td><?php echo $data['id_penerbit']; ?></td>
							<td><?php echo $data['jumlah_booking']; ?></td>
							<td><?php echo dmywaktu($data['tgl_booking']); ?></td>
							<td><?php echo dmywaktu($data['batasambil_booking']); ?></td>
							<td><?php echo statusbook($data['status_booking']); ?></td>
							<td>
								<div class="btn-group">
					           	<button type="button" class="btn btn-info btn-xs"><i class="fa fa-cog"></i></button>
					           	<button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
					           	  <span class="caret"></span>
					           	  <span class="sr-only">Toggle Dropdown</span>
					           	</button>
					           	<ul class="dropdown-menu" role="menu">
					           		<?php if($data['status_booking']!='sukses'){ ?>
					           	  	<li><a href="javascript:void(0)" onclick="ambil('<?php echo $data['id_booking']; ?>')">Sudah Diambil</a></li>
					           	  	<?php } ?>
					           	  	<li><a href="javascript:void(0)" onclick="hapus('<?php echo $data['id_booking']; ?>')">Hapus</a></li>
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
	function ambil(id){
		swal({
		  title: "Booking sudah diambil?",
		  text: "Tekan Ya Untuk Setuju dan Tekan Batal Jika Tidak Setuju",
		  type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
		})
		.then(function () {
        	$.ajax({
				type : "GET",
				url : "<?php echo $base_url.'admin/control.php?pos=ambilbooking&booking='; ?>"+id,
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
		  title: "Menghapus booking ini?",
		  text: "Tekan Ya Untuk Setuju dan Tekan Batal Jika Tidak Setuju",
		  type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
		})
		.then(function () {
        	$.ajax({
				type : "GET",
				url : "<?php echo $base_url.'admin/control.php?pos=hapusbooking&booking='; ?>"+id,
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
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='ambil'){ ?>
<script>
	iziToast.show({timeout:5000,color:'green',title: 'Booking Buku Diambil',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='hapus'){ ?>
<script>
	iziToast.show({timeout:5000,color:'red',title: 'Berhasil Dihapus',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php $_SESSION['msg']= ''; ?>