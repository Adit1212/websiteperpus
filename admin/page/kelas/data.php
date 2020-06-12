<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Kelas <span class="pull-right"><a href="javascript:void(0)" onclick="tambah()" class="btn btn-primary btn-xs">Tambah Kelas</a></span>
			</div>
			<div class="panel-body table-responsive">
	         <table class="table table-bordered table-hover example">
	           	<thead>
		            <th width="5%">No</th>
		            <th>Nama Kelas</th>
		           
		            <th width="10%">Aksi</th>
	           	</thead>
					<tbody>
						<?php $sql= $go->datakelas($con);
						$no= 1; while($data= mysqli_fetch_array($sql)){ ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nama_kelas']; ?></td>
						
							<td>
								<a href="javascript:void(0)" onclick="edit('<?php echo $data['id_kelas']; ?>')" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
								<a href="javascript:void(0)" onclick="hapus('<?php echo $data['id_kelas']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
<script>
	function	tambah(){
		$.ajax({
			type : "GET",
			url : "<?php echo $base_url.'admin/page/kelas/tambah.php'; ?>",
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
			url : "<?php echo $base_url.'admin/page/kelas/edit.php?id_kelas='; ?>"+id,
			cache : false,
			
			success : function(html){
				$("#edit").html(html).show();
				$('#modedit').modal('show');
			}
		});
	}
	function hapus(id){
		swal({
		  title: "Menghapus kelas ini?",
		  text: "Tekan Ya Untuk Setuju dan Tekan Batal Jika Tidak Setuju",
		  type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
		})
		.then(function () {
        	$.ajax({
				type : "GET",
				url : "<?php echo $base_url.'admin/control.php?pos=hapuskelas&kelas='; ?>"+id,
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
<?php if(isset($_SESSION['msg']) and $_SESSION['msg']=='hapus'){ ?>
<script>
	iziToast.show({timeout:5000,color:'red',title: 'Berhasil Dihapus',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php $_SESSION['msg']= ''; ?>
