<?php include '../../../config/koneksi.php'; ?>
<!-- Modal -->
<div class="modal fade" id="modtambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Tambah penerbit</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=tambahpenerbit'; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama penerbit</label>
                    <input type="text" name="nama_penerbit" class="form-control">
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