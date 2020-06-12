<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$kelas= $go->getonekelas($con,$_GET['id_kelas']);
$data= mysqli_fetch_array($kelas);
?>
<!-- Modal -->
<div class="modal fade" id="modedit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit Kelas</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=editkelas'; ?>">
            <input type="hidden" name="id_kelas" value="<?php echo $data['id_kelas']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" value="<?php echo $data['nama_kelas']; ?>">
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