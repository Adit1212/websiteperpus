<div class="row">
	<div class="col-lg-12">
		<h4>Cari Buku Dari <b><?php echo urldecode($_GET['key']); ?></b></h4>
	</div>
</div>
<div class="row">
	<?php $buku= $go->caribuku($con,$_GET['key']); while($data= mysqli_fetch_array($buku)){
	$cekdipinjam= $go->cekdipinjam($con,$data['id_buku']); $cekdp= mysqli_fetch_array($cekdipinjam);
	$cekdibooking= $go->cekdibooking($con,$data['id_buku']); $cekdbo= mysqli_fetch_array($cekdibooking);
	$sisa= $data['stok_buku']-$cekdp['jumdipinjam']-$cekdbo['jumdibooking'];
	?>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<!-- Kode Buku #<?php echo $data['kode_buku']; ?> -->
			</div>
			<div class="panel-body">
				<p class="text-center"><img src="<?php echo $base_url.$data['foto_buku']; ?>" class="img-thumbnail" style="width: 80%; height: 200px;"></p>
			</div>
			<div class="panel-footer">
				<p class="text-center">
					Stok <?php echo $sisa; ?> 
					<?php if($sisa > 0){ ?>
						| <a href="<?php echo $base_url.'home.php?page=bookingbuku&buku='.$data['id_buku']; ?>">Booking Buku</a> 
					<?php } ?>
					| <a href="javascript:void(0)" onclick="detail('<?php echo $data['id_buku']; ?>')">Detail</a></p>
			</div>
		</div>
	</div>
	<?php } ?>
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