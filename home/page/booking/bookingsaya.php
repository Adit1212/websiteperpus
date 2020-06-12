<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Booking Saya
			</div>
			<div class="panel-body table-responsive">
	         <table class="table table-bordered table-hover example">
	           	<thead>
	           		<th width="5%">No</th>
		            <th>Kode Booking</th>
		            <th>Nama Buku</th>
		            <th>rak buku</th>
		            <th>Penulis</th>
		            <th>Penerbit</th>
		            <th>Jumlah</th>
		            <th>Petugas</th>
		            <th>Tanggal Booking</th>
		            <th>Batas Ambil</th>
		            <th>Status</th>
		            <th width="10%">Aksi</th>
	           	</thead>
					<tbody>
						<?php $sql= $go->databookingsaya($con,$_SESSION['id_anggota']);
						$no= 1; while($data= mysqli_fetch_array($sql)){ ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['id_booking']; ?></td>
							<td><?php echo $data['nama_buku']; ?></td>
							<td><?php echo $data['nama_rakbuku']; ?></td>
							<td><?php echo $data['id_penulis']; ?></td>
							<td><?php echo $data['id_penerbit']; ?></td>
							<td><?php echo $data['jumlah_booking']; ?></td>
							<td><?php echo $data['nama_admin']; ?></td>
							<td><?php echo dmywaktu($data['tgl_booking']); ?></td>
							<td><?php echo dmywaktu($data['batasambil_booking']); ?></td>
							<td><?php echo statusbook($data['status_booking']); ?></td>
							<td>
								<?php if($data['status_booking']!='sukses'){ ?>
								<a href="javascript:void(0)" onclick="batal('<?php echo $data['id_booking']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Batal</a>
								<?php } else { echo '-'; } ?>
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
	function batal(id){
		swal({
		  title: "Membatalkan booking buku ini?",
		  text: "Tekan Ya Untuk Setuju dan Tekan Batal Jika Tidak Setuju",
		  type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
		})
		.then(function () {
        	$.ajax({
				type : "GET",
				url : "<?php echo $base_url.'home/control.php?pos=batalbooking&booking='; ?>"+id,
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
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='batal'){ ?>
<script>
	iziToast.show({timeout:5000,color:'red',title: 'Booking Dibatalkan',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>