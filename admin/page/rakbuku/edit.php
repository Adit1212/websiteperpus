<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$rakbuku= $go->getonerakbuku($con,$_GET['id_rakbuku']);
$data= mysqli_fetch_array($rakbuku);
?>
<!-- Modal -->
<div class="modal fade" id="modedit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit Rak Buku</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=editrakbuku'; ?>">
            <input type="hidden" name="id_rakbuku" value="<?php echo $data['id_rakbuku']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Rak Buku</label>
                    <input type="text" name="nama_rakbuku" class="form-control" value="<?php echo $data['nama_rakbuku']; ?>">
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