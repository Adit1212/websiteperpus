<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$buku= $go->getonebuku($con,$_GET['id_buku']);
$data= mysqli_fetch_array($buku);
?>
<!-- Modal -->
<div class="modal fade" id="modfoto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Foto Buku</h4>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?php echo $base_url.'admin/control.php?pos=editfoto'; ?>">
            <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
            <input type="hidden" name="foto_lama" value="<?php echo $data['foto_buku']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Foto Buku</label>
                    <input type="file" name="foto_buku" class="form-control">
                </div>
                <hr>
                <p class="text-center"><?php echo $data['nama_buku']; ?></p>
                <p class="text-center"><img src="<?php echo $base_url.$data['foto_buku']; ?>" class="img-thumbnail" style="width: 180px; height: 200px;"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Simpan</button>
                <a href="#" class="btn btn-default btn-sm" data-dismiss="modal">Batal</a>
            </div>
            </form>
        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->