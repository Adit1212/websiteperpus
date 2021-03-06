<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$buku= $go->getonebuku($con,$_GET['id_buku']);
$data= mysqli_fetch_array($buku);
?>
<!-- Modal -->
<div class="modal fade" id="modfile">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">File Buku</h4>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?php echo $base_url.'admin/control.php?pos=editfile'; ?>">
            <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
            <input type="hidden" name="file_lama" value="<?php echo $data['file_buku']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>File PDF Buku</label>
                    <input type="file" name="file_buku" class="form-control">
                </div>
                <hr>
                <p class="text-center"><?php echo $data['nama_buku']; ?></p>
                <p class="text-center"><a target="_blank" href="<?php echo $base_url.$data['file_buku']; ?>" class="btn btn-success">Lihat PDF Buku</a></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Simpan</button>
                <a href="#" class="btn btn-default btn-sm" data-dismiss="modal">Batal</a>
            </div>
            </form>
        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->