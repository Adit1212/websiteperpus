<?php include '../../../config/koneksi.php';
include '../../root.php';
$go= new root();
$anggota= $go->getoneanggota($con,$_GET['id_anggota']);
$data= mysqli_fetch_array($anggota);
?>
<!-- Modal -->
<div class="modal fade" id="modedit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit Anggota</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=editanggota'; ?>">
            <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>NIS Anggota</label>
                    <input type="text" name="nis_anggota" class="form-control" value="<?php echo $data['nis_anggota']; ?>">
                </div>
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama_anggota" class="form-control" value="<?php echo $data['nama_anggota']; ?>">
                </div>
                <div class="form-group">
                    <label>Email Anggota</label>
                    <input type="text" name="email_anggota" class="form-control" value="<?php echo $data['email_anggota']; ?>">
                </div>
                <div class="form-group">
                    <label>Username Anggota</label>
                    <input type="text" name="username_anggota" class="form-control" value="<?php echo $data['username_anggota']; ?>">
                </div>
                <div class="form-group">
                    <label>Password Anggota</label>
                    <input type="text" name="password_anggota" class="form-control" value="<?php echo $data['password_anggota']; ?>">
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="id_kelas_anggota" class="form-control">
                        <option value="">*</option>
                        <?php $kelas= $go->datakelas($con);
                        while($dkel= mysqli_fetch_array($kelas)){
                            if($data['id_kelas_anggota']==$dkel['id_kelas']){ $selkel= 'selected'; }else { $selkel= ''; }
                            echo '<option '.$selkel.' value="'.$dkel['id_kelas'].'">'.$dkel['nama_kelas'].'</option>';
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