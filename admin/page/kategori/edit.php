<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$kategori= $go->getonekategori($con,$_GET['id_kategori']);
$data= mysqli_fetch_array($kategori);
?>
<!-- Modal -->
<div class="modal fade" id="modedit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit Kategori</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=editkategori'; ?>">
            <input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="<?php echo $data['kategori']; ?>">
                </div>
               
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Simpan</button>
                <a href="#" class="btn btn-default btn-sm" data-dismiss="modal">Batal</a>
            </div>
            </form>
        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->