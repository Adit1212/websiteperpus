<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$penulis= $go->getonepenulis($con,$_GET['id_penulis']);
$data= mysqli_fetch_array($penulis);
?>
<!-- Modal -->
<div class="modal fade" id="modedit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit penulis</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=editpenulis'; ?>">
            <input type="hidden" name="id_penulis" value="<?php echo $data['id_penulis']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama penulis</label>
                    <input type="text" name="nama_penulis" class="form-control" value="<?php echo $data['nama_penulis']; ?>">
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