<?php
include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
?>
<!-- Modal -->
<div class="modal fade" id="modtambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Tambah Anggota</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=tambahanggota'; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>NIS/NIP Anggota</label>
                    <input type="text" name="nis_anggota" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama_anggota" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email Anggota</label>
                    <input type="text" name="email_anggota" class="form-control">
                </div>
                <div class="form-group">
                    <label>Username Anggota</label>
                    <input type="text" name="username_anggota" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password Anggota</label>
                    <input type="text" name="password_anggota" class="form-control">
                </div>
                <div class="form-group">
                    <label>Status Peminjam</label>
                    <select name="id_kelas_anggota" class="form-control">
                        <option value=""></option>
                        <?php $kelas= $go->datakelas($con);
                        while($dkel= mysqli_fetch_array($kelas)){
                            echo '<option value="'.$dkel['id_kelas'].'">'.$dkel['nama_kelas'].'</option>';
                        } ?>
                    </select>
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