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
                <h4 class="text-center">Tambah Buku</h4>
            </div>
            <form method="post" action="<?php echo $base_url.'admin/control.php?pos=tambahbuku'; ?>">
            <div class="modal-body">
               
                <div class="form-group">
                    <label>Rak Buku</label>
                    <select name="id_rakbuku_buku" class="form-control">
                        <option value=""></option>
                        <?php $rakbuku= $go->datarakbuku($con);
                        while($drak= mysqli_fetch_array($rakbuku)){
                            echo '<option value="'.$drak['id_rakbuku'].'">'.$drak['nama_rakbuku'].'</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Buku</label>
                    <input type="text" name="nama_buku" class="form-control">
                    </div>
                <div class="form-group">
                    <label>Kode Klasifikasi</label>
                    <input type="text" name="klasifikasi_buku" class="form-control">
                </div>
                <div class="form-group">
                    <label>Penerbit Buku</label>
                    <select name="nama_penerbit" class="form-control">
                        <option value=""></option>
                        <?php $katpenerbit= $go->katpenerbit($con);
                        while($drak= mysqli_fetch_array($katpenerbit)){
                            echo '<option value="'.$drak['nama_penerbit'].'">'.$drak['nama_penerbit'].'</option>';
                        } ?>
                    </select>
                 <div class="form-group">
                    <label>Penulis Buku</label>
                    <select name="nama_penulis" class="form-control">
                        <option value=""></option>
                        <?php $katpenulis= $go->katpenulis($con);
                        while($drak= mysqli_fetch_array($katpenulis)){
                            echo '<option value="'.$drak['nama_penulis'].'">'.$drak['nama_penulis'].'</option>';
                        } ?>
                          </select>
                <div class="form-group">
                    <label>Tahun Buku</label>
                    <input type="text" name="tahun_buku" class="form-control">
                </div>
                <div class="form-group">
                    <label>Stok Buku</label>
                    <input type="number" name="stok_buku" class="form-control">
                </div>
                <div class="form-group">
                    <label>Kategori Buku</label>
                    <select name="kategori" class="form-control">
                        <option value=""></option>
                        <?php $katbuku= $go->katbuku($con);
                        while($drak= mysqli_fetch_array($katbuku)){
                            echo '<option value="'.$drak['id_kategori'].'">'.$drak['kategori'].'</option>';
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