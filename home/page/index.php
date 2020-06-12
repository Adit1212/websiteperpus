<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Buku Terkini
			</div>
			<div class="panel-body table-responsive">
				<div class="row">
					<?php 
					$bukuterkini= $go->bukuterkini($con,4);
					$no= 1;
					while($dbuterkini= mysqli_fetch_array($bukuterkini)){
					$buku= $go->getonebuku($con,$dbuterkini['id_buku_peminjaman']);
					$dbuk= mysqli_fetch_array($buku);
					$cekdipinjam= $go->cekdipinjam($con,$dbuk['id_buku']); $cekdp= mysqli_fetch_array($cekdipinjam);
					$cekdibooking= $go->cekdibooking($con,$dbuk['id_buku']); $cekdbo= mysqli_fetch_array($cekdibooking);
					$sisa= $dbuk['stok_buku']-$cekdp['jumdipinjam']-$cekdbo['jumdibooking'];
					?>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-danger">
							<div class="panel-heading text-center">
								<!-- Kode Buku #<?php echo $dbuk['kode_buku']; ?> -->
							</div>
							<div class="panel-body">
								<p class="text-center"><img src="<?php echo $base_url.$dbuk['foto_buku']; ?>" class="img-thumbnail" style="width: 80%; height: 200px;"></p>
							</div>
							<div class="panel-footer">
								<p class="text-center">
									Stok <?php echo $sisa; ?>
									<?php if($sisa > 0){ ?>
										| <a href="<?php echo $base_url.'home.php?page=bookingbuku&buku='.$dbuk['id_buku']; ?>">Booking Buku</a> 
									<?php } ?>
									| <a href="javascript:void(0)" onclick="detail('<?php echo $dbuk['id_buku']; ?>')">Detail</a></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Buku Yang Sering Dipinjam
			</div>
			<div class="panel-body table-responsive">
				<div class="row">
					<?php 
					$bukuserpin= $go->bukuseringdipinjam($con,8);
					$no= 1;
					while($dbuserpin= mysqli_fetch_array($bukuserpin)){
					$buku= $go->getonebuku($con,$dbuserpin['id_buku_peminjaman']);
					$dbuk= mysqli_fetch_array($buku);
					$cekdipinjam= $go->cekdipinjam($con,$dbuk['id_buku']); $cekdp= mysqli_fetch_array($cekdipinjam);
					$cekdibooking= $go->cekdibooking($con,$dbuk['id_buku']); $cekdbo= mysqli_fetch_array($cekdibooking);
					$sisa= $dbuk['stok_buku']-$cekdp['jumdipinjam']-$cekdbo['jumdibooking'];
					?>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">
								<!-- Kode Buku #<?php echo $dbuk['kode_buku']; ?> -->
							</div>
							<div class="panel-body">
								<p class="text-center"><img src="<?php echo $base_url.$dbuk['foto_buku']; ?>" class="img-thumbnail" style="width: 80%; height: 200px;"></p>
							</div>
							<div class="panel-footer">
								<p class="text-center">
									Dipinjam <?php echo $dbuserpin['jumpembuku']; ?>x 
									<?php if($sisa > 0){ ?>
										| <a href="<?php echo $base_url.'home.php?page=bookingbuku&buku='.$dbuk['id_buku']; ?>">Booking Buku</a> 
									<?php } ?>
									| <a href="javascript:void(0)" onclick="detail('<?php echo $dbuk['id_buku']; ?>')">Detail</a></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="detail"></div>
<script type="text/javascript">
	function detail(id){
		$.ajax({
			type : "GET",
			url : "<?php echo $base_url.'home/page/buku/detailbuku.php?buku='; ?>"+id,
			cache : false,
			
			success : function(html){
				$("#detail").html(html).show();
				$('#moddetail').modal('show');
			}
		})
	}
</script>