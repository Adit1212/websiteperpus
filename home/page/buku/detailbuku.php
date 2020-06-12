<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$buku= $go->getonebuku($con,$_GET['buku']);
$data= mysqli_fetch_array($buku);
$cekdipinjam= $go->cekdipinjam($con,$data['id_buku']); $cekdp= mysqli_fetch_array($cekdipinjam);
$cekdibooking= $go->cekdibooking($con,$data['id_buku']); $cekdbo= mysqli_fetch_array($cekdibooking);
$sisa= $data['stok_buku']-$cekdp['jumdipinjam']-$cekdbo['jumdibooking'];
?>
<!-- Modal -->
<div class="modal fade" id="moddetail">
 	<div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h4 class="text-center">Detail Buku</h4>
         </div>
         <div class="modal-body">
         	<p class="text-center"><?php echo $data['nama_buku']; ?></p>
            <p class="text-center"><img src="<?php echo $base_url.$data['foto_buku']; ?>" class="img-thumbnail" style="width: 180px; height: 200px;"></p>
            <table class="table">
            	<!-- <tr>
						<td>Kode Buku</td>
						<td><?php echo $data['id_buku']; ?></td>
					</tr> -->
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
						<td>Nama Buku</td>
						<td><?php echo $data['nama_buku']; ?></td>
					</tr>
					<tr>
						<td>Penulis</td>
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
						<td><?php echo $data['stok_buku']; ?></td>
					</tr>
					<tr>
						<td>Dipinjam</td>
						<td><?php echo $cekdp['jumdipinjam']; ?></td>
					</tr>
					<tr>
						<td>Sisa</td>
						<td><?php echo $sisa; ?></td>
					</tr>
				</table>
				<a target="_blank" href="<?php echo $base_url.$data['file_buku']; ?>" class="btn btn-success">Baca PDF Buku</a>
				<?php if($sisa > 0){ ?>
					<a href="<?php echo $base_url.'home.php?page=bookingbuku&buku='.$data['id_buku']; ?>" class="btn btn-primary">Booking Buku</a>
				<?php } ?>
         </div>
      </div>
   </div>
</div>
