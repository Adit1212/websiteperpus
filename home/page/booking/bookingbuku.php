<?php
$buku= $go->getonebuku($con,$_GET['buku']);
$data= mysqli_fetch_array($buku);
$cekdipinjam= $go->cekdipinjam($con,$data['id_buku']); $cekdp= mysqli_fetch_array($cekdipinjam);
$cekdibooking= $go->cekdibooking($con,$data['id_buku']); $cekdbo= mysqli_fetch_array($cekdibooking);
$sisa= $data['stok_buku']-$cekdp['jumdipinjam']-$cekdbo['jumdibooking'];
?>
<input type="hidden" name="sisa" id="sisa" value="<?php echo $sisa; ?>">
<div class="row">
	<div class="col-lg-6 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Detail Booking Buku
			</div>
			<div class="panel-body">
				<p class="text-center"><img src="<?php echo $base_url.$data['foto_buku']; ?>" class="img-thumbnail" style="width: 180px; height: 200px;"></p>

				<table class="table">
					<tr>
						<td>Nama Buku</td>
						<td><?php echo $data['nama_buku']; ?></td>
					</tr>
					<tr>
						<td>Kategori Buku</td>
						<td><?php echo $data['kategori']; ?></td>
					</tr>
					<tr>
						<td>Kode Klasifikasi</td>
						<td><?php echo $data['klasifikasi_buku']; ?></td>
					</tr>
					<tr>
						<td>Rak Buku</td>
						<td><?php echo $data['nama_rakbuku']; ?></td>
					</tr>
					<tr>
						<td>Pengarang</td>
						<td><?php echo $data['id_penulis']; ?></td>
					</tr>
					<tr>
						<td>Penerbit</td>
						<td><?php echo $data['id_penerbit']; ?></td>
					</tr>
					<tr>
						<td>Tahun</td>
						<td><?php echo $data['tahun_buku']; ?></td>
					</tr>
					<tr>
						<td>Stok Buku</td>
						<td><?php echo $sisa; ?></td>
					</tr>
				</table>
				<a target="_blank" href="<?php echo $base_url.$data['file_buku']; ?>" class="btn btn-success">Baca PDF Buku</a>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Form Booking Buku
			</div>
			<form id="formbooking">
			<input type="hidden" name="id_anggota_booking" value="<?php echo $_SESSION['id_anggota']; ?>">
			<input type="hidden" name="id_buku_booking" value="<?php echo $data['id_buku']; ?>">
			<div class="panel-body">
				<div class="form-group">
					<label>Jumlah Buku</label>
					<select class="form-control" name="jumlah_booking" id="jumlah_booking" onchange="ceksisa()">
						<option>1</option>
						<option>2</option>
					</select>
				</div>
				
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary" id="btbooking">Booking Sekarang</button>
			</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#formbooking').submit(function(e){
		$.ajax({
			type : "post",
			url : "<?php echo $base_url.'home/control.php?pos=tambahbooking'; ?>",
			data : $('#formbooking').serialize(),
			cache : false,
			beforeSend : function(){
            $('#btbooking').html('Sedang Diproses...').show();
			},
			success : function(response){
            $('#btbooking').html('Booking Sekarang').show();
				swal({
				  title: "Berhasil booking buku",
				  text: "Anda telah membooking buku <?php echo $data['nama_buku']; ?>.Periksa inbox/spam email anda untuk informasi booking",
				  type: "success",
		        showCancelButton: false,
		        confirmButtonText: 'Lihat Booking',
		        cancelButtonText: 'Batal',
				})
				.then(function () {
		        	window.location.href="<?php echo $base_url.'home.php?page=bookingsaya'; ?>";
		      },
		      function (dismiss) {
		        if(dismiss === 'cancel') {
		          
		        }
		      })
			}
		})
		return false;
	})
	function ceksisa(){
		var sisa= $('#sisa').val();
		var jumlah_booking= $('#jumlah_booking').val();
		if(parseInt(jumlah_booking) > parseInt(sisa)){
         $('#btbooking').hide();
     		alert('Jumlah Booking Melebihi Sisa Buku');
		}
		else{
         $('#btbooking').show();
		}
	}
</script>