<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$penerbit= $go->getonepenerbit($con,$_GET['id_penerbit']);
$data= mysqli_fetch_array($penerbit);
?>
<!-- Modal -->
<div class="modal fade" id="modedit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit penerbit</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=editpenerbit'; ?>">
            <input type="hidden" name="id_penerbit" value="<?php echo $data['id_penerbit']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama penerbit</label>
                    <input type="text" name="nama_penerbit" class="form-control" value="<?php echo $data['nama_penerbit']; ?>">
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